<?php

namespace App\Models\Tests;

use Illuminate\Database\Eloquent\Model;

class TestUserSubmited extends Model
{
    protected $guarded = [];
    protected $table = 'test_users_submited';

    protected $dates = ['started_at','submited_at'];
}
