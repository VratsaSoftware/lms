<?php

namespace App\Models\Hackaton;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hackaton\Team;

class Member extends Model
{
    protected $guarded = [];
    protected $table = 'members';
    protected $connection = 'mysqlSecond';
    public $timestamps = false;


    public function Team()
    {
        return $this->hasOne(Team::class, 'team_id', 'team');
    }
}
