<?php namespace Wubs\Directions\Response;


class Route
{
    public $distance;

    public $duration;

    public $travelMode;

    /**
     * @param $distance
     * @param $duration
     * @param $mode
     */
    private function __construct($distance, $duration, $mode)
    {
        $this->distance = $distance;
        $this->duration = $duration;
        $this->travelMode = $mode;
    }

    public static function fromObject($json, $mode)
    {
        $leg = $json->legs[0];

        return new static($leg->distance, $leg->duration, $mode);
    }

}