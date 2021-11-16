<?php

namespace App\Services;

use App\Models\Courses\Course;
use App\Models\Users\SocialLink;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Image;
use File;
use Ramsey\Uuid\Uuid;

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

    /* update user */
    public static function userUpdate($request, $user)
    {
        $message = __('Успешно направени промени!');
        $messageType = 'success';

        self::updatePassword($user, $request->currentPassword, $request->newPassword, $request->confirmPassword);

        self::saveUserAvatar($request, $user);

        if (isset($data['name']) && !is_null($data['name'])) {
            $name = explode(" ", $data['name']);
            $user->name = $name[0];
            $user->last_name = isset($name[1]) ? $name[1] : null;
        }

        if ($request->has('location')) {
            $user->location = $request->location;
        }

        if ($request->has('dob')) {
            $user->dob = $request->dob ? self::dateParse($request->dob) : null;
        }

        $validEmail = self::updateEmail($request);
        if (!$validEmail) {
            $user->email = $request->email;
        } else {
            $message = 'Имейлът съществува!';
            $messageType = 'info';
        }

        if ($request->has('bio')) {
            $user->bio = $request->bio;
        }

        SocialLink::updateLinks($user->id, $request);
        $user->save();

        return [
            'message' => $message,
            'messageType' => $messageType,
        ];
    }

    /*
     * save user avatar in dir: \images\user-pics
     */
    private static function saveUserAvatar($request, $user) {
        if (Input::hasFile('picture')) {
            if(!File::isDirectory(public_path('images/user-pics'))) {
                File::makeDirectory(public_path('images/user-pics'), 493, true);
            }

            $userPic = $request->picture;
            $image = Image::make($userPic->getRealPath());
            $image->fit(1280,1280, function ($constraint) {
                $constraint->upsize();
            });

            $name = Uuid::uuid4() . $userPic->getClientOriginalExtension();
            $imgPath = '/images/user-pics/';

            $oldImage = public_path() . $imgPath . $user->picture;
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }

            $user->picture = $name;
            if ($userPic->getClientOriginalExtension() == 'gif') {
                copy($userPic->getRealPath(), public_path() . $imgPath . $name);
            } else {
                $image->save(public_path() . $imgPath . $name, 90);
            }
        }
    }

    /* edit password */
    private static function updatePassword($user, $currentPassword, $newPassword, $confirmPassword)
    {
        if ($newPassword) {
            if (password_verify($currentPassword, Auth()->user()->password) && $newPassword == $confirmPassword) {
                $user->password = bcrypt($newPassword);
            } else {
                return redirect('profile')->with('error', 'Грешна парола за удостоверяване или паролите не съвпадат!');
            }
        }
    }

    /* date parse */
    private static function dateParse($date)
    {
        $parseDate = date_parse($date);

        return $parseDate['year'] . '-' . $parseDate['month'] . '-' . $parseDate['day'];
    }

    private static function updateEmail($request)
    {
        if ($request->has('email') && $request->email !== Auth::user()->email) {
            $validEmail = User::where('email', $request->email)
                ->first();

            return $validEmail;
        }
    }
}
