<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;
use App\Models\Events\Event;
use App\Models\Events\TeamMember;

class Team extends Model
{
    protected $table = 'events_teams';
    protected $guarded = [];

    public function Events()
    {
        return $this->hasMany(Event::class, 'events_id', 'id');
    }

    public function Members()
    {
        return $this->hasMany(TeamMember::class, 'event_team_id', 'id');
    }

    public function Category()
    {
        return $this->hasOne(TeamCategory::class, 'id', 'event_team_category_id');
    }
}
