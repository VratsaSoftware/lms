<?php

namespace App\Models\Tests;

use Illuminate\Database\Eloquent\Model;

class BankAnswer extends Model
{
    protected $guarded = [];
    protected $table = 'tests_bank_answers';

    public function Bank()
    {
        return $this->hasOne(BankQuestion::class);
    }
}
