<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;

class CerfticiationTemplate extends Model
{
    protected $table = 'certificate_templates';
    protected $dates = ['created_at','updated_at','deleted_at'];
}
