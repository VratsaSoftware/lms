<?php

namespace App\Models\Courses;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PersonalCertificate extends Model
{
    protected $table = 'personal_certificate';
    protected $dates = ['date','created_at','updated_at','deleted_at'];
    protected $guarded = [];

    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function Course()
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }
}
