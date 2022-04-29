<?php

namespace App\Http\Controllers\SingleResponsibility\Solution;

use App\Http\Controllers\Controller;
use App\Services\SingleResponsibility\ApiClient;
use App\Services\SingleResponsibility\ResponseDecoder;
use App\Services\SingleResponsibility\ResponseValidator;

class ApiController extends Controller
{
    protected ApiClient $client;
    protected ResponseValidator $validator;
    protected ResponseDecoder $decoder;

    public function __construct(
        ApiClient $client,
        ResponseDecoder $decoder,
        ResponseValidator $validator
    ) {
        $this->client = $client;
        $this->decoder = $decoder;
        $this->validator = $validator;
    }

    public function handle()
    {
        $response = $this->client->getItems();
        $response = $this->decoder->decode($response);

        if (!$this->validator->isValid($response)) {
            return false;
        }

        return $response;
    }
}
