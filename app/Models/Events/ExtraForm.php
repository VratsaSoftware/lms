<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class ExtraForm extends Model
{
    protected $guarded = [];
    protected $table = 'events_extra_forms';

    public function User()
    {
        return $this->hasOne(\App\User::class,'id', 'user_id');
    }

    public function Event()
    {
        return $this->hasOne(Event::class,'id','event_id');
    }

    public function setFieldsAttribute($value)
    {
        $this->attributes['fields'] = serialize($value);
    }

    public function getFieldsAttribute($value)
    {
        return unserialize($value);
    }
}
