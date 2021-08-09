<?php

namespace App\Models\CourseModules;

use Illuminate\Database\Eloquent\Model;
use App\User;

class LectionVideoView extends Model
{
    protected $table = 'lections_videos_views';
    protected $guarded = [];

    public function User()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
