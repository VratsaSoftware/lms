<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users\SocialLink;

class Social extends Model
{
    protected $table = 'cl_socials';

    public function SocialLinks(){
    	return $this->belongsToMany(SocialLink::class);
    }
}
