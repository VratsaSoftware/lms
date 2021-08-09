<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    protected $table = 'cl_roles';

    public function Users(){
    	return $this->belongsToMany(User::class);
    }
}
