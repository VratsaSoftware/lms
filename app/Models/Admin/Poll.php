<?php

namespace App\Models\Admin;

use App\Models\Admin\PollOption;
use App\Models\Admin\PollVote;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $table = 'polls';
    protected $dates = ['start','ends'];
    protected $guarded = [];

    public function Options()
    {
        return $this->hasMany(PollOption::class);
    }

    public function VotesCount ()
    {
        return $this->hasManyThrough(PollVote::class, PollOption::class);
    }
}
