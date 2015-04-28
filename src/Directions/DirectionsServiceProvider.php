<?php
/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 20-04-15
 * Time: 10:14
 */

namespace Wubs\Directions;

use Illuminate\Support\ServiceProvider;

class DirectionsServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([__DIR__ . '/config/directions.php' => config_path('directions.php')]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;
        $app->singleton(
            '\Wubs\Directions\Directions',
            function ($app) {
                return new Directions($app['config']->get('directions.key'));
            }
        );

        $app->bind(
            'directions',
            function () use ($app) {
                return $app->make('\Wubs\Directions\Directions');
            }
        );
    }

    public function provides()
    {
        return ['Wubs\Directions\Directions'];
    }
}