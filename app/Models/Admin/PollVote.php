<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Admin\PollOption;

class PollVote extends Model
{
    protected $table = 'poll_votes';
    protected $guarded = [];

    public function User()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function Options(){
        return $this->hasMany(PollOption::class);
    }
}
