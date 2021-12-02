<?php

namespace App\Services;

use Carbon\Carbon;

class BaseService {
    /**
     * @param $date
     * @return null | $date string
     */
    public static function parseDatePickerDate($date)
    {
        if (is_null($date)) {
            return null;
        }

        $dateArr = explode('/', $date);

        $date = Carbon::createFromDate($dateArr[2], $dateArr[1], $dateArr[0]);

        return $date->toDateString();
    }
}
