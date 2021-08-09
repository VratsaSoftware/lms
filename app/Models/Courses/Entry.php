<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Courses\EntryForm;

class Entry extends Model
{
    protected $table = 'entries';
    protected $guarded = [];

    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function Form()
    {
        return $this->hasOne(EntryForm::class, 'id', 'entry_form_id');
    }
}
