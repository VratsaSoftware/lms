<?php

namespace App\Services;

use App\Models\Courses\Course;
use App\Models\Users\SocialLink;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserService {
    /* user profile data */
    public static function profileData() {
        if (Auth::user()->isAdmin()) {
            $courses = Course::where('ends', '>', Carbon::now()->format('Y-m-d H:m:s'))->orderBy('ends', 'DESC')
                ->get();

            $pastCourses = Course::where('ends', '<', Carbon::now()->format('Y-m-d H:m:s'))->orderBy('ends', 'DESC')
                ->get();
        } else if (Auth::user()->isLecturer()) {
            $courses = Auth::user()->lecturerGetCourses();
            $pastCourses = Auth::user()->lecturerGetPastCourses();
        } else {
            $courses = Auth::user()->studentGetCourse();
            $pastCourses = Auth::user()->studentGetPastCourse();
        }

        $courses = $courses->load('Modules');
        $pastCourses = $pastCourses->load('Modules');

        $allWorkExperience = Auth::user()->getWorkExp();
        $allEducation = Auth::user()->getEducation();

        $socialLinks = self::socialLinks();

        return [
            'courses' => $courses,
            'pastCourses' => $pastCourses,
            'activeCourses' => Auth::user()->activeGetCourse(),
            'facebookLink' => $socialLinks['facebook'],
            'linkedinLink' => $socialLinks['linkedin'],
            'githubLink' => $socialLinks['gitHub'],
            'allWorkExperience' => $allWorkExperience,
            'allEducation' => $allEducation,
            'upcomingEvent' => Auth::user()->upcomingEvent(),
        ];
    }

    /* user social link */
    public static function socialLinks() {
        /* links */
        $facebookLink = SocialLink::where('cl_social_id', 1)
            ->where('user_id', Auth::user()->id)
            ->pluck('link')
            ->first();
        $linkedinLink = SocialLink::where('cl_social_id', 2)
            ->where('user_id', Auth::user()->id)
            ->pluck('link')
            ->first();
        $gitHubLink = SocialLink::where('cl_social_id', 3)
            ->where('user_id', Auth::user()->id)
            ->pluck('link')
            ->first();

        return [
            'facebook' => $facebookLink,
            'linkedin' => $linkedinLink,
            'gitHub' => $gitHubLink,
        ];
    }
}
