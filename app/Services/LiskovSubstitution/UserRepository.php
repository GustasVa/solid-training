<?php

namespace App\Services\LiskovSubstitution;

use App\Models\User;

class UserRepository implements UserFetchingInterface
{
    public function getUser(int $userId): array
    {
        $user = User::query()->find($userId);

        return $user->toArray();
    }
}
