<?php

namespace App\Models\Tests;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Test extends Model
{
    protected $guarded = [];
    protected $table = 'tests';
    protected $dates = ['start_at','expire_at'];

    public function getDurationAttribute($value)
    {
        return new \DateTime($value);
    }

    public function Users()
    {
        return $this->belongsToMany(User::class,'test_users_assign');
    }

    public function bank()
    {
        return $this->belongsToMany(Bank::class,'tests_assigned','test_id','test_bank_id');
    }
}
