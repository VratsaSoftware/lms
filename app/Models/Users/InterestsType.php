<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users\Interest;

class InterestsType extends Model
{
    protected $table = 'cl_users_interest_types';

    public function Interest()
    {
        return $this->belongsTo(Interest::class, 'cl_users_interest_type_id', 'id');
    }

    public function getTypeAttribute($value)
    {
        return mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
    }
}
