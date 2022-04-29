<?php

namespace App\Http\Controllers\LiskovSubstitution\Solution;

use App\Http\Controllers\Controller;
use App\Services\LiskovSubstitution\UserCacheRepository;
use App\Services\LiskovSubstitution\UserRepository;

class UserController extends Controller
{
    public function __construct(
        private UserCacheRepository $cacheRepository,
        private UserRepository $repository
    ) {}

    public function show(int $userId): array
    {
        $user = $this->cacheRepository->getUser($userId);

        if ($user) {
            return $user;
        }

        $user = $this->repository->getUser($userId);
        $this->cacheRepository->addToCache($user);

        return $user;
    }
}
