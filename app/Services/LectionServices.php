<?php

namespace App\Services;

use Carbon\Carbon;

class LectionServices {
    /* video url format */
    public static function videoUrlFormat($video) {
        $videoUrls = [];
        if ($video) {
            $urls = explode(' ', $video->url);
            foreach ($urls as $url) {
                if (strstr($url, 'http')) {
                    if (strstr($url, 'watch?v=')) {
                        $newUrl = explode('=', $url);
                        if (isset($newUrl[1])) {
                            $newUrl = explode('&', $newUrl[1]);
                        }
                        $videoUrls[] = 'https://www.youtube.com/embed/' . $newUrl[0];
                    } else {
                        $videoUrls[] = str_replace("youtu.be", "www.youtube.com/embed", $url);
                    }
                }
            }
        }

        if (count($videoUrls) >= 1) {
            $firstUrl[] = $videoUrls[0];
        } else {
            $firstUrl = [];
        }

        return $firstUrl;
    }

    public static function evaluationOptionCheck($lection, $myHomework) {
        if ($myHomework->evaluation_user !== $lection->HomeWorks->count() - 1) {
            $evaluationOption = ($lection->homework_check_end && $lection->homework_check_end->addDays(1)->gt(Carbon::now())) || !$lection->homework_check_end;
        } elseif ($myHomework->evaluation_user == $lection->HomeWorks->count() - 1) {
            $evaluationOption = false;
        } else {
            $evaluationOption = false;
        }

        return $evaluationOption;
    }
}
