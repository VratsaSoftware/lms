<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users\EducationType;
use App\User;
use App\Models\Users\EducationSpeciality;
use App\Models\Users\EducationInstitution;

class Education extends Model
{
    protected $table = 'users_education';

    public function Users()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function EduType()
    {
        return $this->hasOne(EducationType::class, 'id', 'cl_education_type_id');
    }

    public function EduInstitution()
    {
        return $this->hasOne(EducationInstitution::class, 'id', 'institution_id');
    }

    public function EduSpeciality()
    {
        return $this->hasOne(EducationSpeciality::class, 'id', 'specialty_id');
    }

    public static function isExisting($userId, $request)
    {
        $isExisting = Education::where([
            ['user_id',$userId],
            ['y_from',$request->y_from],
            ['y_to',$request->y_to],
            ['cl_education_type_id',$request->edu_type],
            ['institution_id',$request->institution_id],
            ['specialty_id',$request->specialty_id],
        ])->first();
        if (is_null($isExisting) || empty($isExisting)) {
            return false;
        }
        return true;
    }
}
