<?php

namespace App\Services\OpenClose\Events;

use App\DTOs\EventDataDTO;
use Illuminate\Support\Facades\Cache;

class AddToRedis implements EventInterface
{
    public function handle(EventDataDTO $dto)
    {
        return Cache::tags('events')->add($dto->getKey(), $dto->getValue());
    }
}
