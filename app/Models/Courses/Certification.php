<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Courses\Course;
use App\Models\CourseModules\Module;

class Certification extends Model
{
    protected $table = 'course_certifications';
    protected $dates = ['started','finished'];

    public function Users()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function Courses()
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }

    public function Modules()
    {
        return $this->hasMany(Module::class, 'id', 'module_id');
    }
}
