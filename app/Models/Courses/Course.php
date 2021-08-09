<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseModules\Module;
use App\Models\Courses\CourseLecturer;
use App\Models\Courses\Certification;
use App\Models\CourseModules\ModulesStudent;

class Course extends Model
{
    protected $table = 'courses';
    protected $dates = ['starts','ends','applications_from','applications_to'];
    protected $guarded = [];

    public function Modules()
    {
        return $this->hasMany(Module::class);
    }

    public function Lecturers()
    {
        return $this->hasMany(CourseLecturer::class);
    }

    public function Certifications()
    {
        return $this->hasMany(Certification::class);
    }

    public static function getModules($course, $isLecturer)
    {
        if ($isLecturer) {
            return Module::where('course_id', $course)->with('Lections')->oldest('order')->get();
        }

        if (Auth::user()) {
            $onModules = ModulesStudent::select('course_modules_id')->where('user_id', Auth::user()->id)->get()->toArray();
            return Module::where([
                ['course_id', $course],
                ['visibility','!=','draft'],
                ])->whereIn('id', $onModules)->with('Lections')->oldest('order')->get();
        }

        return Module::where([
            ['course_id', $course],
            ['visibility','public'],
            ])->with('Lections')->oldest('order')->get();
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
