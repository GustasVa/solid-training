<?php

namespace App\Services\LiskovSubstitution;

use App\Models\User;

interface UserFetchingInterface
{
    /**
     * @param int $userId
     * @return array
     */
    public function getUser(int $userId): array;
}
