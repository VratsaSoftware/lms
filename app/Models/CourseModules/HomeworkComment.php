<?php

namespace App\Models\CourseModules;

use Illuminate\Database\Eloquent\Model;
use App\User;

class HomeworkComment extends Model
{
    protected $table = 'homework_comments';

    public function homework()
    {
        return $this->belongsTo(Homework::class, 'homework_id');
    }

    public function Author()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
