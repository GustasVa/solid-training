<?php

namespace App\DTOs;

class EventDTO
{
    private string $eventName;
    private EventDataDTO $dataDto;

    public function __construct(array $data)
    {
        $this->eventName = $data['event_name'] ?? null;
        $this->dataDto = new EventDataDTO($data['data'] ?? []);
    }

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return $this->eventName;
    }

    /**
     * @return EventDataDTO
     */
    public function getDataDto(): EventDataDTO
    {
        return $this->dataDto;
    }
}
