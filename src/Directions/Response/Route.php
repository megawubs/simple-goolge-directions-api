<?php namespace Wubs\Directions\Response;


class Route
{
    public $distance;

    public $duration;

    /**
     * @param $distance
     * @param $duration
     */
    private function __construct($distance, $duration)
    {
        $this->distance = $distance;
        $this->duration = $duration;
    }

    /**
     * @param $json
     * @return Route
     */
    public static function fromObject($json)
    {
        $leg = $json->legs[0];

        return new static($leg->distance, $leg->duration);
    }

}