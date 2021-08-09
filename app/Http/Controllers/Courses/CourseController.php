<?php

namespace App\Http\Controllers\Courses;

use App\Models\Courses\Entry;
use App\Models\Courses\EntryForm;
use App\Models\Courses\PersonalCertificate;
use App\Models\Courses\TrainingType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courses\Course;
use App\Models\Courses\CourseLecturer;
use App\Models\CourseModules\Module;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Image;
use File;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lecturers = User::where('cl_role_id', '!=', 2)->get();
        $trainingTypes = TrainingType::all();

        return view('course.create', ['lecturers' => $lecturers, 'trainingTypes' => $trainingTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['valid_visibility'] = \Config::get('courseVisibility');
        $data = $request->validate([
            'picture' => 'required|file|image|mimes:jpeg,png,gif,webp,ico,jpg|max:4000',
            'name' => 'required',
            'description' => 'sometimes',
            'starts' => 'required|date_format:Y-m-d',
            'ends' => 'required|date_format:Y-m-d|after:starts',
            'visibility' => 'required|in_array:valid_visibility.*',
            'lecturers' => 'required',
            'color' => 'sometimes',
            'training_type' => 'required',
            'applications_from' => 'required|date_format:Y-m-d',
            'applications_to' => 'required|date_format:Y-m-d|after:applications_from'
        ]);

        if ($data['applications_from'] < Carbon::now() || $data['applications_from'] == Carbon::now()) {
            $data['form_active'] = 1;
        }

        $switchActiveStatus = Course::where([
            ['training_type', $data['training_type']],
            ['applications_to', '<', Carbon::now()->subDays(1)]
        ])->whereNotNull('form_active')->update(['form_active' => null]);

        $coursePic = Input::file('picture');
        $image = Image::make($coursePic->getRealPath());
        $image->fit(800, 600, function ($constraint) {
            $constraint->upsize();
        });
        $name = time() . "_" . $coursePic->getClientOriginalName();
        $name = str_replace(' ', '', strtolower($name));
        $name = md5($name);

        $data['picture'] = $name;
        unset($data['lecturers']);
        $createCourse = Course::create($data);
        foreach ($request->lecturers as $lecturer_id) {
            $insLecturer = new CourseLecturer;
            $insLecturer->course_id = $createCourse->id;
            $insLecturer->user_id = $lecturer_id;
            $insLecturer->save();
        }

        $path = public_path() . '/images/course-' . $createCourse->id;
        if (!File::exists($path)) {
            $folder = mkdir($path, 0777, true);
        }
        if ($coursePic->getClientOriginalExtension() == 'gif') {
            copy($coursePic->getRealPath(), public_path() . '/images/course-' . $createCourse->id);
        } else {
            $image->save(public_path() . '/images/course-' . $createCourse->id . '/' . $name, 90);
        }

        $message = __('Успешно създаден курс ' . ucfirst($data['name']) . '!');
        return redirect()->route('myProfile')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function showUserCourse($user = 0, Course $course)
    {
        $modules = Course::getModules($course->id, $isLecturer = false);
        $courses = [];
        if (Auth::user()) {
            $certificate = PersonalCertificate::where('user_id', Auth::user()->id)->first();
            if ($certificate) {
                $certificate = true;
            }
            $courses = Auth::user()->studentGetCourse();
        }
        return view('user.course', ['courses' => $courses, 'course' => $course, 'modules' => $modules, 'certificate' => isset($certificate) ? $certificate : false]);
    }

    public function showLecturerCourse(Course $course)
    {
        $modules = Course::getModules($course->id, $isLecturer = true);

        return view('lecturer.course', ['course' => $course, 'modules' => $modules]);
    }

    public function addStudent(Request $request)
    {
        $entry = Entry::where('user_id',$request->user)->first();
        $entry->load('Form');
        $form = EntryForm::find($entry->Form->id);
        $form->course_id = $request->add_to_course;
        $form->save();

        return $form;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['valid_visibility'] = \Config::get('courseVisibility');
        $data = $request->validate([
            'picture2' => 'sometimes|file|image|mimes:jpeg,png,gif,webp,ico,jpg|max:4000',
            'name' => 'required',
            'description' => 'sometimes',
            'starts' => 'required|date_format:Y-m-d',
            'ends' => 'required|date_format:Y-m-d|after:starts',
            'visibility' => 'required|in_array:valid_visibility.*',
            'color' => 'sometimes',
            'applications_from' => 'required|date_format:Y-m-d',
            'applications_to' => 'required|date_format:Y-m-d|after:applications_from'
        ]);

        $course = Course::find($id);
        $data['form_active'] = null;
        if ($data['applications_from'] < Carbon::now() || $data['applications_from'] == Carbon::now()) {
            $data['form_active'] = 1;
        }

        $switchActiveStatus = Course::where([
            ['training_type', $course->training_type],
            ['applications_to', '<', Carbon::now()->subDays(1)]
        ])->whereNotNull('form_active')->update(['form_active' => null]);

        if (Input::file('picture2')) {
            $coursePic = Input::file('picture2');
            $image = Image::make($coursePic->getRealPath());
            $image->fit(800, 600, function ($constraint) {
                $constraint->upsize();
            });
            $name = time() . "_" . $coursePic->getClientOriginalName();
            $name = str_replace(' ', '', strtolower($name));
            $name = md5($name);

            if (file_exists(public_path() . '/images/course-' . $course->id . '/' . $course->picture)) {
                File::delete(public_path() . '/images/course-' . $course->id . '/' . $course->picture);
            }

            if ($coursePic->getClientOriginalExtension() == 'gif') {
                copy($coursePic->getRealPath(), public_path() . '/images/course-' . $course->id . '/' . $name);
            } else {
                $image->save(public_path() . '/images/course-' . $course->id . '/' . $name, 50);
            }
            $course->picture = $name;
        }

        $course->name = $request->name;
        $course->description = $request->description;
        $course->starts = $request->starts;
        $course->ends = $request->ends;
        $course->visibility = $request->visibility;
        $course->color = $request->color;
        $course->applications_from = $request->applications_from;
        $course->applications_to = $request->applications_to;
        $course->form_active = $data['form_active'];
        $course->save();

        $message = __('Успешно направени промени!');
        return redirect()->back()->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteCourse = Course::find($id);
        $courseDir = public_path() . '/images/course-' . $deleteCourse->id;
        $courseData = public_path() . '/data/course-' . $deleteCourse->id;
        File::deleteDirectory($courseDir);
        File::deleteDirectory($courseData);
        $deleteCourse->delete();

        $message = __('Успешно изтрит курс!');
        return redirect()->route('myProfile')->with('success', $message);
    }
}
