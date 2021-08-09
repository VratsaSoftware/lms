<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\PollVote;

class PollOption extends Model
{
    protected $table = 'poll_options';
    protected $guarded = [];

    public function Votes()
    {
        return $this->hasMany(PollVote::class);
    }
}
