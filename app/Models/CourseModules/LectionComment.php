<?php

namespace App\Models\CourseModules;

use Illuminate\Database\Eloquent\Model;
use App\Models\CourseModules\Lection;
use App\User;

class LectionComment extends Model
{
    protected $table = 'lections_students_comments';
    protected $guarded = [];

    public function Lection()
    {
        return $this->hasOne(Lection::class);
    }

    public function Author()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
