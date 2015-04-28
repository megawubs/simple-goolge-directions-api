Simple Goolge Directions API
==========
This is a simple laravel package to get basic information from the Google Directions API. 

## Installation

To install this library into your project simply do the following in your project root:

```bash
composer require wubs/simple-google-directions-api:0.*
```

### Laravel specific

If you use Laravel, add `'Wubs\Directions\DirectionsServiceProvider',` to `app/config.php` in the providers array and 
add 
`'Directions' => 'Wubs\Directions\Facades\Directions',` to the aliases array, also in `app/config.php`.

## Usage

You can use the facade like this:
```PHP
<?php
$options = new DirectionOptions(
            DirectionOption::origin($address1->latitude, $address1->longitude),
            DirectionOption::destination($address2->latitude, $address2->longitude),
            DirectionOption::mode(TravelModes::BICYCLING),
            DirectionOption::alternatives(true),
            DirectionOption::language("nl_NL"),
            DirectionOption::departureTime(Carbon::now())
        );
$routes = Directions::route($options);

```

Or get it from the IoC container like so:
```PHP
<?php
$api = $app->make('\Wubs\Directions\Directions')
```

Or inject it into a constructor

```PHP
<?php namespace App\Http\Controllers;

use Wubs\Directions\Directions;

class ZipController extends Controller
{
   private $api;
   
    public function __construct(Directions $directions)
    {
        $this->directions = $directions;
        
    }
}
```

Publish the configuration by running:
```bash
php artisan vendor:publish
```

Afterwards the configuration will be located in config/directions.php

I highly recommend using the .env file.


### Non laravel usage

The package is also usable without Laravel. See the code below. 

```PHP
<?php
require 'vendor/autoload.php'

use Wubs\Directions\Directions;

$directions = new Directions(getenv("GOOGLE_DIRECTIONS_SERVER_KEY"));

$zipApi = new Wubs\Zip\ZipApi(getenv("ZIP_API_KEY"));
$address1 = $zipApi->address("8316PB", 28);
$address2 = $zipApi->address("6821HX", 1);

$options = new DirectionOptions(
    DirectionOption::origin($address1->latitude, $address1->longitude),
    DirectionOption::destination($address2->latitude, $address2->longitude),
    DirectionOption::mode(TravelModes::BICYCLING),
    DirectionOption::alternatives(true),
    DirectionOption::language("nl_NL"),
    DirectionOption::departureTime(Carbon::now())
);

$response = $directions->route($options);
```


