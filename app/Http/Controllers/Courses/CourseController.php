<?php

namespace App\Http\Controllers\Courses;

use App\Http\Requests\CourseRequest;
use App\Models\Courses\Entry;
use App\Models\Courses\EntryForm;
use App\Models\Courses\PersonalCertificate;
use App\Models\Courses\TrainingType;
use App\Services\BaseService;
use App\Services\CourseService;
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

        return view('course.create', [
            'lecturers' => $lecturers,
            'trainingTypes' => $trainingTypes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CourseRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $moduleId = CourseService::storeCourse($request);

        $message = 'Успешно създаден курс ' . ucfirst($request->name) . '!';
        return redirect()->route('module.show', $moduleId)->with('success', $message);
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
//        return view('user.course', ['courses' => $courses, 'course' => $course, 'modules' => $modules, 'certificate' => isset($certificate) ? $certificate : false]);
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
        $course = Course::with('lecturers')
            ->findOrFail($id);

        $lecturers = User::where('cl_role_id', '!=', 2)->get();
        $trainingTypes = TrainingType::all();

        return view('course.edit', [
            'course' => $course,
            'lecturers' => $lecturers,
            'trainingTypes' => $trainingTypes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\CourseRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $course = Course::with('modules')
            ->findOrFail($id);

        CourseService::updateCourse($id, $request);

        $message = 'Успешно направени промени!';
        return redirect()->route('module.show', $course->modules->first())->with('success', $message);
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

        $deleteCourse->delete();

        return redirect()->route('courses.index')->with('success', 'Успешно изтрит курс!');
    }
}
