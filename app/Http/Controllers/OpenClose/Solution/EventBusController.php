<?php

namespace App\Http\Controllers\OpenClose\Solution;

use App\DTOs\EventDTO;
use App\Http\Controllers\Controller;
use App\Services\OpenClose\EventFactory;
use Exception;
use Illuminate\Http\Request;

class EventBusController extends Controller
{
    public function __construct(
        private EventFactory $eventFactory
    ) {}

    /**
     * @throws Exception
     */
    public function handle(Request $request)
    {
        $dto = new EventDTO($request->all());

        $event = $this->eventFactory->createEvent($dto->getEventName());

        return $event->handle($dto->getDataDto());
    }
}
