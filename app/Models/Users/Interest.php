<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users\InterestsType;

class Interest extends Model
{
    protected $guarded = [];
    protected $table = 'cl_users_interests';

    public function Type()
    {
        return $this->hasOne(InterestsType::class, 'id', 'cl_users_interest_type_id');
    }

    public function getNameAttribute($value)
    {
        return mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
    }

    public function getOthersAttribute($value)
    {
        return mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
    }
}
