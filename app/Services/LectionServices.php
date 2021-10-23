<?php

namespace App\Services;

class LectionServices {
    /* video url format */
    public static function videoUrlFormat($video) {
        $videoUrl = '';
        if ($video) {
            if (strstr($video->url, 'watch?v=')) {
                $videoUrl = str_replace("watch?v=", "embed/", $video->url);
                $videoUrl = str_replace(['&feature=youtu.be', '&ab_channel=VratsaSoftwareSchool'], '', $videoUrl);
            } else {
                $videoUrl = str_replace("youtu.be", "www.youtube.com/embed", $video->url);
            }
        }

        return $videoUrl;
    }
}
