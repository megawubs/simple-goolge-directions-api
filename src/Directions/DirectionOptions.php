<?php


namespace Wubs\Directions;


use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class DirectionOptions extends Collection
{


    public function __construct()
    {
        $params = func_get_args();
        parent::__construct(Arr::collapse($params));
    }
}