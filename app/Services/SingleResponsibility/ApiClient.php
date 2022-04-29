<?php

namespace App\Services\SingleResponsibility;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class ApiClient
{
    public Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.airtable.com',
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . config('services.airtable.bearer'),
            ]
        ]);
    }

    public function getItems(): ResponseInterface
    {
        return $this->client->request('GET', '/v0/apphsghWkQSK9nSYT/item');
    }
}
