<?php

namespace App\Services;

class LectionServices {
    /* video url format */
    public static function videoUrlFormat($video) {
        $videoUrls = [];
        if ($video) {
            $urls = explode(' ', $video->url);
            foreach ($urls as $url) {
                if (strstr($url, 'http')) {
                    $newUrl = explode('=', $url);
                    if (isset($newUrl[1])) {
                        $newUrl = explode('&', $newUrl[1]);
                    }
                    $videoUrls[] = 'https://www.youtube.com/embed/' . $newUrl[0];
                }
            }
        }

        return $videoUrls;
    }
}
