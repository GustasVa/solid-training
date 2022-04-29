<?php

namespace App\Http\Controllers\LiskovSubstitution\Problem;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function show(int $userId): array
    {
        $user = Cache::tags('users')->get((string)$userId);

        if ($user) {
            return $user;
        }

        $user = User::query()->findMany([$userId]);

        Cache::tags('users')->add((string)$user->id, $user->toArray());

        return $user;
    }
}
