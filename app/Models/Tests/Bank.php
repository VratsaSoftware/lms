<?php

namespace App\Models\Tests;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $guarded = [];
    protected $table = 'tests_banks';

    public function Type()
    {
        return $this->hasOne(BankType::class);
    }

    public function Questions()
    {
        return $this->hasMany(BankQuestion::class, 'test_bank_id', 'id');
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
