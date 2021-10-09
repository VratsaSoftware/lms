<?php

namespace App\Models\CourseModules;

use Illuminate\Database\Eloquent\Model;
use App\Models\Courses\Course;
use App\Models\Courses\Certification;
use App\Models\CourseModules\Lection;

class Module extends Model
{
    protected $table = 'courses_modules';
    protected $dates = ['starts','ends'];
    protected $guarded = [];

    public function Course()
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }
    public function Certifications()
    {
        return $this->hasMany(Certification::class, 'module_id');
    }

    public function Lections()
    {
        return $this->hasMany(Lection::class, 'course_modules_id');
    }

    public function ModulesStudent()
    {
        return $this->hasMany(ModulesStudent::class, 'course_modules_id');
    }

    public static function getLections($module, $lecturer = null)
    {
        if (!$lecturer) {
            return Lection::where([
                    ['course_modules_id', $module],
                    ['visibility', '!=', 'draft'],
                ])->with('Video', 'Comments', 'Comments.Author')
                ->oldest('order')
                ->get();
        }

        return Lection::where('course_modules_id', $module)
            ->with('Video', 'Video.Viewed', 'Video.Viewed.User', 'Comments', 'Comments.Author', 'HomeWorks', 'HomeWorks.Comments')
            ->oldest('order')
            ->get();
    }
}
