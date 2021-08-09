<?php

namespace App\Http\Controllers\Admin;

use App\Models\CourseModules\ModulesStudent;
use App\Models\CourseModules\Module;
use App\Models\Courses\CourseLecturer;
use App\Models\Courses\PersonalCertificate;
use App\Services\ePayService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courses\Course;
use App\Models\Events\Event;
use App\Models\Courses\CerfticiationTemplate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use View;
use App\User;
use Image;
use File;
use Auth;

class AdminController extends Controller
{
    public function allCourses()
    {
        $courses = Course::where('ends', '>', Carbon::now()->format('Y-m-d H:m:s'))->orderBy('ends', 'DESC')->get();
        $pastCourses = Course::where('ends', '<', Carbon::now()->format('Y-m-d H:m:s'))->orderBy('ends', 'DESC')->get();
        return view('admin.courses', ['courses' => $courses, 'pastCourses' => $pastCourses]);
    }

    public function showAllEvents()
    {
        $events = Event::with('Teams', 'Teams.Members', 'Teams.Members.User', 'Teams.Members.User.Occupation', 'Teams.Members.Role', 'Teams.Members.Shirt', 'Teams.Category')->where('to', '>', Carbon::now()->format('Y-m-d H:m:s'))->get();
        $pastEvents = Event::with('Teams', 'Teams.Members', 'Teams.Category')->where('to', '<', Carbon::now()->format('Y-m-d H:m:s'))->get();
        return view('admin.events', ['events' => $events, 'pastEvents' => $pastEvents]);
    }

    public function createCertificate($course = null)
    {
        $users = User::get();
        if (!is_null($course)) {
            foreach ($users as $user) {
                $userId = $user->id;
                $isOnCourse = Course::with('Modules', 'Modules.ModulesStudent', 'Modules.ModulesStudent.User')->where('id', $course)->whereHas('Modules.ModulesStudent', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                })->first();
                if ($isOnCourse) {
                    $usersOn[] = $user;
                }
            }
        }
        if (isset($usersOn)) {
            $users = $usersOn;
        }

        $courses = Course::all();
        foreach ($users as $user) {
            $isCertificated = PersonalCertificate::where('user_id', $user->id)->first();
            $user->certificated = false;
            if ($isCertificated) {
                $user->certificated = true;
            }
        }

        return view('certifications.create', ['users' => $users, 'courses' => $courses]);
    }

    public function storeCertificate(Request $request)
    {
        $data = $request->validate([
            "user_id" => 'required',
            "course_id" => 'required',
            "number" => 'required|numeric',
            "color" => 'required',
            "title" => 'required',
            "sub_title" => 'required',
            "modules" => 'required',
            "username" => 'required',
            "lecturer" => 'sometimes',
            "date" => 'sometimes',
            "center_logo" => 'required|numeric|min:0|max:1',
        ]);

        $modules = implode(",", $request->modules);
        $newCert = new PersonalCertificate;
        $newCert->user_id = $request->user_id;
        $newCert->course_id = $request->course_id;
        $newCert->number = (int)$request->number;
        $newCert->color = $request->color;
        $newCert->title = $request->title;
        $newCert->sub_title = $request->sub_title;
        $newCert->modules = $modules;
        $newCert->username = $request->username;
        $newCert->lecturer = $request->lecturer;
        $newCert->date = $request->date;
        $newCert->center_logo = $request->center_logo;
        $newCert->save();

        return response()->json($newCert->id, 200);
    }

    public function certificatePreview($user)
    {
        $certificate = PersonalCertificate::where('user_id', $user)->first();
        $certificate->modules = explode(",", $certificate->modules);

        return View('certifications.show', ['certificate' => $certificate]);
    }

    public function getUserDataForCertificate($users = null)
    {
        if (!is_null($users) || !empty($users)) {
            $lecturers = CourseLecturer::with('User')->get();
            $data = [];
            $users = explode(",", $users);
            $last = PersonalCertificate::select('number')->orderBy('id', 'DESC')->first();
            foreach ($users as $id) {
                $users['user'][$id] = User::find($id);
                $modules = ModulesStudent::with('CourseModule', 'CourseModule.Course')->where('user_id', $id)->get();
                if (count($modules) > 0) {
                    foreach ($modules as $module) {
                        $modules = Module::where('course_id', $module->CourseModule->Course->id)->get();
                        $users['data'][$id]['course'] = $module->CourseModule->Course->name;
                        $users['data'][$id]['modules'] = $modules;
                        $course_id[$id] = $module->CourseModule->Course->id;
                    }
                    if ($last) {
                        $last->number = $last->number += 1;
                    } else {
                        $last = new PersonalCertificate;
                        $last->number = '' . Carbon::now()->format('y') . '';
                        $last->number .= '00';
                    }
                    $data[$id]['user'] = isset($users['user'][$id]) ? $users['user'][$id] : '';
                    $data[$id]['course'] = isset($users['data'][$id]['course']) ? $users['data'][$id]['course'] : '';
                    $data[$id]['course_id'] = isset($course_id[$id]) ? $course_id[$id] : 0;
                    $data[$id]['modules'] = isset($users['data'][$id]['modules']) ? $users['data'][$id]['modules'] : [];
                    $data[$id]['number'] = $last->number;
                }
            }

            return view('certifications.templates.edit', [
                'data' => $data,
                'lecturers' => $lecturers,
            ]);
        }

        return response()->json('empty data', 404);
    }

    public function filterUsers()
    {
        $users = User::whereNotIn('id',function($query) {
            $query->select('user_id')->from('entries');
        })->whereNotIn('id',function($query) {
            $query->select('user_id')->from('events_extra_forms');
        })->get();
        $users->load('Occupation');
        return view('admin.filter_users',['users' => $users]);
    }

    public function createPayment()
    {
        $users = User::all();
        return View('course.payment',['users' => $users]);
    }

    public function storePayment(Request $request)
    {
        $data = $request->validate([
            "levels" => 'required|integer|min:1|max:2|'
        ]);
        $process['levels'] = 160;
        if($data['levels'] > 1){
            $process['levels'] = 300;
        }
        $process['user_email'] = Auth::user()->email;
        $newPayMent = new ePayService($process);
        $response =  $newPayMent->sendPayment();

        return view('course.redirectPayment',['response' => $response]);
    }
}
