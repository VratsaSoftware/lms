<?php

namespace App\Models\Hackaton;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hackaton\Category;

class Team extends Model
{
    protected $guarded = [];
    protected $table = 'teams';
    protected $connection = 'mysqlSecond';
    public $timestamps = false;
    protected $primaryKey = 'team_id';
}
