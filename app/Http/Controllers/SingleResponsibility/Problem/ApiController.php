<?php

namespace App\Http\Controllers\SingleResponsibility\Problem;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ApiController extends Controller
{
    public Client $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function handle()
    {
        try {
            $response = $this->client->request('GET', 'https://api.airtable.com/v0/apphsghWkQSK9nSYT/item', [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . config('services.airtable.bearer'),
                ]
            ]);

            $request = json_decode($response->getBody()->getContents(), true);

            if (!$request) {
                return false;
            }

            return $request;
        } catch (GuzzleException $e) {
        }

        return true;
    }
}
