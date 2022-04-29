<?php

namespace App\Services\SingleResponsibility;

use Psr\Http\Message\ResponseInterface;
use RuntimeException;

class ResponseDecoder
{
    public function decode(ResponseInterface $response)
    {
        $response = json_decode($response->getBody()->getContents(), true);

        if ($response === null) {
            throw new RuntimeException('Response could not be decoded');
        }

        return $response;
    }
}
