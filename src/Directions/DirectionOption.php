<?php


namespace Wubs\Directions;


use Carbon\Carbon;

class DirectionOption
{
    public static function origin($latitude, $longitude)
    {
        return ['origin' => $latitude . ',' . $longitude];
    }

    public static function destination($latitude, $longitude)
    {
        return ['destination' => $latitude . ',' . $longitude];
    }

    public static function mode($mode)
    {
        return ['mode' => $mode];
    }

    public static function alternatives($status)
    {
        if ($status) {
            return ['alternatives' => "true"];
        }

        return ['alternatives' => "false"];
    }

    public static function language($language)
    {
        return ['language' => $language];
    }

    public static function departureTime(Carbon $time)
    {
        return ['departure_time' => $time->timestamp];
    }


}