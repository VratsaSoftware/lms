<?php

namespace App\Services;

class LectionServices {
    /* video url format */
    public static function videoUrlFormat($video) {
        $videoUrls = [];
        if ($video) {
            $urls = explode(' ', $video->url);
            foreach ($urls as $url) {
                if (strstr($video->url, 'watch?v=')) {
                    $videoUrl = str_replace("watch?v=", "embed/", $url);
                    $videoUrls[] = str_replace(['&feature=youtu.be', '&ab_channel=VratsaSoftwareSchool'], '', $videoUrl);
                } else {
                    $videoUrls[] = str_replace("youtu.be", "www.youtube.com/embed", $url);
                }
            }
        }

        return $videoUrls;
    }
}
