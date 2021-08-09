<?php

namespace App\Models\Hackaton;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    protected $table = 'categories';
    protected $connection = 'mysqlSecond';
    public $timestamps = false;
}
