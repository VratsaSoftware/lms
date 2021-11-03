<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Education extends Model
{
    protected $table = 'users_education';

    public function Users()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public static function isExisting($userId, $request)
    {
        $isExisting = Education::where([
            ['user_id', $userId],
            ['y_from', $request->y_from],
            ['y_to', $request->y_to],
            ['institution', $request->institution],
            ['specialty', $request->specialty],
        ])->first();
        if (is_null($isExisting) || empty($isExisting)) {
            return false;
        }
        return true;
    }
}
