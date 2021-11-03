<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users\WorkCompany;
use App\Models\Users\WorkPosition;

class WorkExperience extends Model
{
    protected $table = 'work_experience';
    protected $guarded = [];

    public function Company()
    {
        return $this->hasOne(WorkCompany::class, 'id', 'company_id');
    }

    public function Position()
    {
        return $this->hasOne(WorkPosition::class, 'id', 'position_id');
    }
}
