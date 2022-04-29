<?php

namespace App\DTOs;

class EventDataDTO
{
    private ?string $key;
    private ?string $value;

    public function __construct(array $data)
    {
        $this->key = $data['key'] ?? null;
        $this->value = $data['value'] ?? null;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
