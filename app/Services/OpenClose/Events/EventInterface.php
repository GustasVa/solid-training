<?php

namespace App\Services\OpenClose\Events;

use App\DTOs\EventDataDTO;

interface EventInterface
{
    public function handle(EventDataDTO $dto);
}
