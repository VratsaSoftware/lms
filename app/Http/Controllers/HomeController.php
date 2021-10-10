<?php

namespace App\Http\Controllers;

use App\Models\Admin\Poll;
use App\Models\Admin\PollVote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseModules\ModulesStudent;
use App\Models\Courses\Course;
use App\Models\CourseModules\Module;
use App\Models\Courses\CourseLecturer;
use App\Models\Users\SocialLink;
use App\Models\Users\EducationType;
use App\Models\Users\InterestsType;
use App\Models\Users\Interest;
use App\Models\Users\Hobbie;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Users\Subscribe;
use Cookie;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $courses = Course::whereDate('ends', '>=', Carbon::now()->format('Y-m-d'))
                ->whereDate('starts', '<', Carbon::now()->format('Y-m-d H:m:s'))
                ->orderBy('ends', 'DESC')
                ->get();

            $pastCourses = Course::whereDate('ends', '<', Carbon::now()->subDay()->format('Y-m-d H:m:s'))
                ->orderBy('ends', 'DESC')
                ->get();
        } else if (Auth::user()->isLecturer()) {
            $courses = Auth::user()->lecturerGetCourses();
            $pastCourses = Auth::user()->lecturerGetPastCourses();
        } else {
            $courses = Auth::user()->studentGetCourse();
            $pastCourses = Auth::user()->studentGetPastCourse();
        }

        if (!Auth::user()->isStudent()) {
            $courses = $courses->load('Modules');
            $pastCourses = $pastCourses->load('Modules');
        }

        /* links */
        $facebookLink = SocialLink::where('cl_social_id', 1)
            ->where('user_id', Auth::user()->id)
            ->pluck('link')
            ->first();
        $linkedinLink = SocialLink::where('cl_social_id', 2)
            ->where('user_id', Auth::user()->id)
            ->pluck('link')
            ->first();
        $githubLink = SocialLink::where('cl_social_id', 3)
            ->where('user_id', Auth::user()->id)
            ->pluck('link')
            ->first();

        $allWorkExperience = Auth::user()->getWorkExp();
        $allEducation = Auth::user()->getEducation();

        return view('profile.dashboard', [
            'courses' => $courses,
            'pastCourses' => $pastCourses,
            'activeCourses' => Auth::user()->activeGetCourse(),
            'facebookLink' => $facebookLink,
            'linkedinLink' => $linkedinLink,
            'githubLink' => $githubLink,
            'allWorkExperience' => $allWorkExperience,
            'allEducation' => $allEducation,
            'upcomingEvent' => Auth::user()->upcomingEvent(),
        ]);
    }

    public function subscribe($email)
    {
        $inputemail = ['email' => $email];
        $validatorEmail = Validator::make($inputemail, [
                'email' => 'email|unique:subscribers',
        ]);
        if(!$validatorEmail->fails()){
            $insertSubscribe = new Subscribe;
            $insertSubscribe->email = $email;
            $insertSubscribe->save();

            return response()->json('ok',200);
        }
        return response()->json('error',400);
    }
}
