<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Courses\Course;

class CourseLecturer extends Model
{
    protected $table = 'courses_lecturers';
    protected $dates = ['created_at'];

    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function Courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
