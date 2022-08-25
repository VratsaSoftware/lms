<?php

namespace App\Models\CourseModules;

use Illuminate\Database\Eloquent\Model;
use App\User;

class HomeworkComment extends Model
{
    protected $table = 'homework_comments';

    public function isValid()
    {
        return $this->is_valid == 1;
    }

    public function isLecturerComment()
    {
        return $this->is_lecturer_comment == 1;
    }

    public function homework()
    {
        return $this->belongsTo(Homework::class, 'homework_id');
    }

    public function Author()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
