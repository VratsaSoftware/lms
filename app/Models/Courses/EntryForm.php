<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;

class EntryForm extends Model
{
    protected $table = 'entry_forms';
    protected $guarded = [];

    public function entry()
    {
        return $this->hasOne(Entry::class);
    }
}
