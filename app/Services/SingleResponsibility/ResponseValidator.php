<?php

namespace App\Services\SingleResponsibility;

class ResponseValidator
{
    /**
     * @param $response
     * @return bool
     */
    public function isValid($response): bool
    {
        if (!is_array($response)) {
            return false;
        }

        return true;
    }
}
