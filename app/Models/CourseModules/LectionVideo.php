<?php

namespace App\Models\CourseModules;

use Illuminate\Database\Eloquent\Model;
use App\Models\CourseModules\LectionVideoView;

class LectionVideo extends Model
{
    protected $table = 'lections_videos';
    protected $guarded = [];

    public function Viewed()
    {
        return $this->hasMany(LectionVideoView::class, 'lection_video_id', 'id');
    }
}
