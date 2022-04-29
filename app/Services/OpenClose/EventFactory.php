<?php

namespace App\Services\OpenClose;

use App\Services\OpenClose\Events\AddToRedis;
use App\Services\OpenClose\Events\ClearRedis;
use App\Services\OpenClose\Events\EventInterface;
use Exception;

class EventFactory
{
    public const ADD_TO_REDIS = 'add_to_redis';
    public const CLEAR_REDIS = 'clear_redis';

    private const EVENT_MAP = [
        self::ADD_TO_REDIS => AddToRedis::class,
        self::CLEAR_REDIS => ClearRedis::class,
    ];

    /**
     * @param string $eventName
     * @return EventInterface
     * @throws Exception
     */
    public function createEvent(string $eventName): EventInterface
    {
        if (!isset(self::EVENT_MAP[$eventName])) {
            throw new Exception('Missing event handler');
        }

        $eventClass = self::EVENT_MAP[$eventName];

        return new $eventClass;
    }
}
