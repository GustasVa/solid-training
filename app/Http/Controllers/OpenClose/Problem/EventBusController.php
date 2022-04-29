<?php

namespace App\Http\Controllers\OpenClose\Problem;

use App\DTOs\EventDataDTO;
use App\DTOs\EventDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EventBusController extends Controller
{
    public function handle(Request $request): bool
    {
        $dto = new EventDTO($request->all());

        if ($dto->getEventName() === 'add_to_redis') {
            return $this->addToRedisAction($dto->getDataDto());
        } else if ($dto->getEventName() === 'clear_redis') {
            return $this->clearRedisAction($dto->getDataDto());
        }

        return true;
    }

    private function addToRedisAction(EventDataDTO $dataDto)
    {
        return Cache::tags('events')->add($dataDto->getKey(), $dataDto->getValue());
    }

    private function clearRedisAction(EventDataDTO $dataDto)
    {
        return Cache::tags('events')->flush();
    }
}
