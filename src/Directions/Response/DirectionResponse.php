<?php namespace Wubs\Directions\Response;

use Illuminate\Support\Collection;

class DirectionResponse
{
    /**
     * @var Collection|Route[]
     */
    public $routes;

    public function __construct($response, $travelMode)
    {
        write($response, "full-response");
        $this->routes = new Collection();

        foreach ($response->routes as $route) {
            $this->routes->push(Route::fromObject($route, $travelMode));
        }
    }
}