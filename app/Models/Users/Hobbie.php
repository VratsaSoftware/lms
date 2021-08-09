<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users\Interest;
use App\User;

class Hobbie extends Model
{
    protected $guarded = [];
    protected $table = 'users_hobbies';

    public function Interests()
    {
        return $this->hasOne(Interest::class, 'id', 'cl_interest_id');
    }

    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
