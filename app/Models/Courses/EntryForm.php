<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntryForm extends Model
{
    use SoftDeletes;

    protected $table = 'entry_forms';
    protected $guarded = [];

    public function entry()
    {
        return $this->hasOne(Entry::class);
    }
}
