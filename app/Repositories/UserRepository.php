<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\Models\User;

final class UserRepository
{
    public function create(UserRequest $request): ?User
    {
        $result = User::create($request->only((new User())->getFillable()));

        return $result ?? null;
    }

}
