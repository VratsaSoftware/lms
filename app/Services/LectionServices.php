<?php

namespace App\Services;

use Carbon\Carbon;
use function MongoDB\BSON\toJSON;

class LectionServices {
    /* lection video */
    public static function lectionVideo($lections, $lectionId) {
        $firstLectionVideoUrls = null;
        if (isset($lections[0]) && !$lectionId) {
            $firstLectionVideoUrls = self::videoUrlFormat($lections[0]->Video);
        } else if ($lectionId) {
            $videos = $lections->where('id', $lectionId)
                ->first()
                ->Video;
            $firstLectionVideoUrls = self::videoUrlFormat($videos);
        }

        return $firstLectionVideoUrls;
    }

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

        return json_encode($videoUrls);
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

    public static function showLectionVideo($lections, $iteration) {
        $newLection = $iteration == count($lections) ? null : $lections[$iteration];
        $oldLection = $iteration == 1 ? null : $lections[$iteration - 2];

        if ($newLection) {
            $newLectionId = $newLection->id;
            $newLectionFirstVideo = self::videoUrlFormat($newLection->Video);
        } else {
            $newLectionId = null;
            $newLectionFirstVideo = null;
        }

        if ($oldLection) {
            $oldLectionId = $oldLection->id;
            $oldLectionFirstVideo = self::videoUrlFormat($oldLection->Video);
        } else {
            $oldLectionId = null;
            $oldLectionFirstVideo = null;
        }

        return [
            'oldLectionId' => $oldLectionId,
            'oldLectionFirstVideo' => $oldLectionFirstVideo,
            'newLectionId' => $newLectionId,
            'newLectionFirstVideo' => $newLectionFirstVideo,
        ];
    }
}
