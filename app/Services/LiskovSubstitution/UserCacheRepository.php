<?php

namespace App\Services\LiskovSubstitution;

use Illuminate\Support\Facades\Cache;

class UserCacheRepository implements UserFetchingInterface
{
    public function addToCache(array $user): bool
    {
        return Cache::tags('users')->add((string)$user['id'], $user);
    }

    public function getUser(int $userId): array
    {
        $user = Cache::tags('users')->get((string)$userId);

        if (!is_array($user)) {
            return (array)$user;
        }

        return $user;
    }
}
