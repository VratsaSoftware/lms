<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class WorkCompany extends Model
{
    protected $table = 'work_companies';
    protected $guarded = [];

    public function getNameAttribute($value)
    {
        return mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
    }
}
