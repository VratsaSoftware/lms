<?php

namespace App\Models\Tests;

use Illuminate\Database\Eloquent\Model;

class AssignedTest extends Model
{
    protected $guarded = [];
    protected $table = 'tests_assigned';

    public function Bank(){
        return $this->hasOne(Bank::class);
    }

    public function Test(){
        return $this->hasOne(Test::class);
    }
}
