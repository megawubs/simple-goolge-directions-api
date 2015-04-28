<?php namespace Wubs\Directions\Response;

use Illuminate\Support\Collection;

class DirectionResponse
{
    /**
     * @var Collection|Route[]
     */
    public $routes;

    public $travelMode;

    /**
     * @param $response
     * @param $travelMode
     */
    public function __construct($response, $travelMode)
    {
        $this->routes = new Collection();
        $this->travelMode = $travelMode;

        foreach ($response->routes as $route) {
            $this->routes->push(Route::fromObject($route));
        }

    }
}