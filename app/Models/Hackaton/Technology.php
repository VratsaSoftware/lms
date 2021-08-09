<?php

namespace App\Models\Hackaton;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $guarded = [];
    protected $table = 'technologies';
    protected $connection = 'mysqlSecond';
    public $timestamps = false;
}
