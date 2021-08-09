<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Users\Social;
use Illuminate\Http\Request;

class SocialLink extends Model
{
    protected $table = 'users_social_links';

    public function Users()
    {
        return $this->hasMany(User::class);
    }

    public function SocialName()
    {
        return $this->belongsTo(Social::class, 'cl_social_id');
    }

    public static function updateLinks($user_id, Request $request)
    {
        $facebook = Social::where('name', 'facebook')->first();
        $linkedin = Social::where('name', 'linkedin')->first();
        $github = Social::where('name', 'github')->first();

        $changeFacebook = SocialLink::where([
            ['user_id', $user_id],
            ['cl_social_id', $facebook->id],
        ])->first();
        if ($changeFacebook) {
            if (empty($request->facebook)) {
                $changeFacebook->delete();
                return;
            }
            $changeFacebook->link = $request->facebook;
            $changeFacebook->save();
        } else {
            if (!empty($request->facebook)) {
                $insertFacebook = new SocialLink;
                $insertFacebook->user_id = $user_id;
                $insertFacebook->cl_social_id = $facebook->id;
                $insertFacebook->link = $request->facebook;
                $insertFacebook->save();
            }
        }

        $changelinkedin = SocialLink::where([
            ['user_id',$user_id],
            ['cl_social_id',$linkedin->id],
        ])->first();
        if ($changelinkedin) {
            if (empty($request->linkedin)) {
                $changelinkedin->delete();
                return;
            }
            $changelinkedin->link = $request->linkedin;
            $changelinkedin->save();
        } else {
            if (!empty($request->linkedin)) {
                $insertLinkedin = new SocialLink;
                $insertLinkedin->user_id = $user_id;
                $insertLinkedin->cl_social_id = $linkedin->id;
                $insertLinkedin->link = $request->linkedin;
                $insertLinkedin->save();
            }
        }

        $changeGithub = SocialLink::where([
            ['user_id',$user_id],
            ['cl_social_id',$github->id],
        ])->first();
        if ($changeGithub) {
            if (empty($request->github)) {
                $changeGithub->delete();
                return;
            }
            $changeGithub->link = $request->github;
            $changeGithub->save();
        } else {
            if (!empty($request->github)) {
                $insertGithub = new SocialLink;
                $insertGithub->user_id = $user_id;
                $insertGithub->cl_social_id = $github->id;
                $insertGithub->link = $request->github;
                $insertGithub->save();
            }
        }
    }
}
