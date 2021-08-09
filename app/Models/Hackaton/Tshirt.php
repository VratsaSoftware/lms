<?php

namespace App\Models\Hackaton;

use Illuminate\Database\Eloquent\Model;

class Tshirt extends Model
{
    protected $guarded = [];
    protected $table = 'tshirts';
    protected $connection = 'mysqlSecond';
    public $timestamps = false;
}
