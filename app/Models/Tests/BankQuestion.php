<?php

namespace App\Models\Tests;

use Illuminate\Database\Eloquent\Model;

class BankQuestion extends Model
{
    protected $guarded = [];
    protected $table = 'tests_bank_questions';

    public function Answers()
    {
        return $this->hasMany(BankAnswer::class,'tests_bank_question_id','id');
    }
}
