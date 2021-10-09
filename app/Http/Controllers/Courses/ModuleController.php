<?php

namespace App\Http\Controllers\Courses;

use App\Models\Courses\Entry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courses\Course;
use App\Models\CourseModules\Module;
use App\Models\CourseModules\ModulesStudent;
use App\Models\CourseModules\LectionComment;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Image;
use File;
use Validator;

class ModuleController extends Controller
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
    public function create(Request $request)
    {
        $course = Course::find($request->course);
        $users = User::whereHas('Role', function ($q) {
            $q->where('role', 'user');
        })->get();
        $users->load('Applications');
        $course_id = $request->course;
        $candidates = Entry::with('User','Form')->whereHas('Form', function ($q) use($course_id){
            $q->where('course_id',$course_id);
        })->get()->pluck('User')->flatten();

        $modules = Module::where('course_id', $course->id)->get();

        return view('course.module.create', ['users' => $users, 'candidates' => $candidates,'course' => $course,'modules' => $modules]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['valid_visibility'] = \Config::get('courseVisibility');
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'starts' => 'required|date_format:m/d/Y',
            'ends' => 'required|date_format:m/d/Y|after:starts',
            'visibility' => 'required|in_array:valid_visibility.*',
            'course_id' => 'required|numeric|exists:courses,id',
            'students' => 'sometimes|array',
        ]);

        $newModule = new Module;
        $newModule->course_id = $request->course_id;
        $newModule->name = $request->name;
        $newModule->description = $request->description;
        $newModule->starts = $this->dateParse($request->starts);
        $newModule->ends = $this->dateParse($request->ends);
        $newModule->visibility = $request->visibility;
        $newModule->save();

        if (isset($data['students'])) {
            foreach (array_unique($request->students) as $student) {
                $addStudent = new ModulesStudent;
                $addStudent->course_modules_id = $newModule->id;
                $addStudent->user_id = $student;
                $addStudent->save();
            }
        }

        $message = __('Успешно създаден Модул ' . ucfirst($data['name']) . '!');
        return redirect()->route('module.show', $newModule->id)->with('success', $message);
    }

    /* date parse */
    private function dateParse($date)
    {
        $parseDete = date_parse($date);

        return $parseDete['year'] . '-' . $parseDete['month'] . '-' . $parseDete['day'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        if (Auth::user()->isLecturer() && !$module->Course->Lecturers->where('user_id', Auth::id())->first()) {
            abort(404);
        }

        $lections = Module::getLections($module->id, true);
        $students = ModulesStudent::where('course_modules_id', $module->id)
            ->with('User')
            ->get();
        $module = $module->load('Course');
        $lections = $lections->load('Video');

        $courseId = $module->Course->id;
        $candidates = Entry::with('User', 'Form')
            ->whereHas('Form', function ($q) use ($courseId) {
                $q->where('course_id', $courseId);
            })->get()
            ->unique('user_id')
            ->pluck('User')
            ->flatten();

        $moduleStudents = $module->ModulesStudent()
            ->with('User')
            ->get();

        return view('course.module.left-lection', [
            'module' => $module,
            'lections' => $lections,
            'students' => $students,
            'allModules' => $module->Course->Modules,
            'candidates' => $candidates,
            'moduleStudents' => $moduleStudents,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['valid_visibility'] = \Config::get('courseVisibility');
        $data = $request->validate([
            'name' => 'required|sometimes',
            'description' => 'sometimes',
            'starts' => 'sometimes|date_format:m/d/Y',
            'ends' => 'sometimes|date_format:m/d/Y|after:starts',
            'visibility' => 'sometimes|in_array:valid_visibility.*',
            'course_id' => 'sometimes|numeric|exists:courses,id',
            'remove_students' => 'sometimes|array',
        ]);
        $module = Module::find($id);

        $module->course_id = $request->course_id;
        $module->name = $request->name;
        $module->description = $request->description;

        $module->starts = $this->dateParse($request->starts);
        $module->ends = $this->dateParse($request->ends);
        $module->visibility = $request->visibility;
        $module->save();

        if ($request->remove_students) {
            $removeModulesStudent = ModulesStudent::where('course_modules_id', $id)
                ->whereIn('user_id', $request->remove_students)
                ->delete();
        }

        $message = __('Успешно направени промени!');
        return back()->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id);
        $module->delete();

        $message = __('Успешно изтрит модул!');
        return redirect('myProfile')->with('success', $message);
    }

    public function addUser(Request $request)
    {
        $data = $request->validate([
            'mail' => 'required',
            'module_id' => 'required|numeric',
        ]);

        $emails = explode (",", $data['mail']);
        foreach($emails as $mail) {
            $user = User::where('email', $mail)->first();
            if (!is_null($user)) {
                $inserted[] = ModulesStudent::firstOrCreate(['course_modules_id' => $request->module_id, 'user_id' => $user->id]);
            }
        }
        if(isset($inserted) && count($inserted) > 0) {
            $message = __('Успешно добавен курсист!');
            return redirect()->back()->with('success', $message);
        }
        $message = __('Няма такъв потребител!');
        return redirect()->back()->with('error', $message);
    }

    public function removeUser(Request $request)
    {
        $student = ModulesStudent::where([
            ['course_modules_id', $request->module],
            ['user_id',$request->user],
        ])->delete();

        return response('success', 200);
    }
}
