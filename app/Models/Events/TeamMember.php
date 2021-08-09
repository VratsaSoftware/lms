<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;
use App\Models\Events\Team;
use App\Models\Users\UsersTeamRole;
use App\Models\Users\ShirtSize;
use App\User;

class TeamMember extends Model
{
    protected $table = 'events_team_members';
    protected $guarded = [];
    protected $dates = ['created_at','updated_at'];

    public function Teams()
    {
        return $this->hasMany(Team::class, 'id', 'event_team_id');
    }

    public function Role()
    {
        return $this->hasOne(UsersTeamRole::class, 'id', 'cl_users_team_role_id');
    }

    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function Shirt()
    {
        return $this->hasOne(ShirtSize::class, 'id', 'cl_users_shirts_size_id');
    }
}
