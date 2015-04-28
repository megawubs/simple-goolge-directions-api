<?php
use Carbon\Carbon;
use Wubs\Directions\DirectionOption;
use Wubs\Directions\DirectionOptions;
use Wubs\Directions\Directions;
use Wubs\Directions\TravelModes;

/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 17/04/15
 * Time: 10:30
 */
class HowItShouldWorkTest extends PHPUnit_Framework_TestCase
{

    public function testDirectionOptionsResultInAssocArray()
    {
        $zipApi = new Wubs\Zip\ZipApi(getenv("ZIP_API_KEY"));
        $address1 = $zipApi->address("8316PB", 28);
        $address2 = $zipApi->address("7735KN", 1);

        $options = new DirectionOptions(
            DirectionOption::origin($address1->latitude, $address1->longitude),
            DirectionOption::destination($address2->latitude, $address2->longitude),
            DirectionOption::mode(TravelModes::BICYCLING),
            DirectionOption::alternatives(true),
            DirectionOption::language("nl_NL"),
            DirectionOption::departureTime(Carbon::now())
        );
        $arr = $options->toArray();

        $this->assertInternalType("array", $arr);
        $this->assertArrayHasKey("mode", $arr);
    }

    public function testWorkings()
    {
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

        $this->assertInstanceOf('Wubs\Directions\Response\DirectionResponse', $response);
        foreach ($response->routes as $route) {
            $this->assertInstanceOf('Wubs\Directions\Response\Route', $route);
            $this->assertEquals(TravelModes::BICYCLING, $route->travelMode);
        }

    }
}
