<?php

namespace Wubs\Directions\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 20-04-15
 * Time: 11:05
 */
class Directions extends Facade
{

    protected static function getFacadeAccessor()
    {
        return "directions";
    }

}