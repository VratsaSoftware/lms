<?php

namespace App\Models\Hackaton;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    protected $guarded = [];
    protected $table = 'occupation';
    protected $connection = 'mysqlSecond';
    public $timestamps = false;
}
