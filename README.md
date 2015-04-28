Laravel Postcode API
==========
This is a simple laravel package to use the dutch postcode api. 

## Installation

To install this library into your project simply do the following in your project root:

```bash
composer require wubs/zip:1.1.*
```

### Laravel specific

If you use Laravel, add `'Wubs\Zip\ZipServiceProvider',` to `app/config.php` in the providers array and add `'Zip' => 
'Wubs\Zip\Facades\Zip',` to the aliases array, also in `app/config.php`.

## Usage

You can use the facade like this:
```PHP
<?php
Zip::address("1234AA", 11);
```

Or get it from the IoC container like so:
```PHP
<?php
$api = $app->make('\Wubs\Zip\ZipApi')
```

Or inject it into a constructor

```PHP
<?php namespace App\Http\Controllers;

use Wubs\Zip\ZipApi;

class ZipController extends Controller
{
   private $api;
   
    public function __construct(ZipApi $api)
    {
        $this->api = $api;
        
    }
}
```

Publish the configuration by running:
```bash
php artisan vendor:publish
```

Afterwards the configuration will be located in config/zip.php

I highly recommend using the .env file.


### Non laravel usage

The package is also usable without Laravel. See the code below. 

```PHP
<?php
require 'vendor/autoload.php'

use Wubs\Zip\ZipApi;

$zipApi = new ZipApi("API_KEY");
$address = $postcodeApi->address("1234AA", 11);
```


