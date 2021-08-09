<?php

namespace App\Models\CourseModules;

use Illuminate\Database\Eloquent\Model;
use App\Models\CourseModules\Module;
use App\Models\CourseModules\LectionVideo;
use App\Models\CourseModules\LectionComment;
use App\Models\CourseModules\Homework;

class Lection extends Model
{
    protected $table = 'course_lections';
    protected $dates = ['first_date', 'second_date','homework_end', 'homework_check_end'];

    public function Module()
    {
        return $this->hasOne(Module::class, 'id', 'course_modules_id');
    }

    public function Video()
    {
        return $this->hasOne(LectionVideo::class, 'id', 'lections_video_id');
    }

    public function Comments()
    {
        return $this->hasMany(LectionComment::class, 'course_lection_id');
    }

    public function HomeWorks()
    {
        return $this->hasMany(HomeWork::class,'lection_id');
    }

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    public function getDescriptionAttribute($value)
    {
        return ucwords($value, '.');
    }
}
