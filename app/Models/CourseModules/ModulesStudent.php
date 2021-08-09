<?php

namespace App\Models\CourseModules;

use Illuminate\Database\Eloquent\Model;
use App\Models\CourseModules\Module;
use App\User;
use App\Models\Courses\Course;

class ModulesStudent extends Model
{
    protected $table = 'modules_students';
    protected $guarded = [];

    public function CourseModule()
    {
        return $this->hasOne(Module::class, 'id', 'course_modules_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
