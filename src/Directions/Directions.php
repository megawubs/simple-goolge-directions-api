<?php namespace Wubs\Directions;

use GuzzleHttp\Client;
use Wubs\Directions\Response\DirectionResponse;
use Wubs\Zip\Contracts\ZipApi as ZipApiInterface;

/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 17/04/15
 * Time: 11:21
 */
class Directions
{
    private $baseUrl = "https://maps.googleapis.com/maps/api/directions/json";

    private $key;

    public function __construct($key)
    {
        $this->client = new Client();
        $this->key = $key;
    }

    /**
     * @param DirectionOptions $options
     * @return DirectionResponse
     */
    public function route(DirectionOptions $options)
    {
        $options->push(["key" => $this->key]);

        $request = $this->client->createRequest(
            'get',
            $this->baseUrl,
            [
                'query' => $options->toArray()
            ]
        );

        $response = $this->client->send($request);
        return new DirectionResponse($response->json(['object' => true]));
    }


}