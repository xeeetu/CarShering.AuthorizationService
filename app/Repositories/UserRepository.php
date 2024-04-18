<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

final class UserRepository
{
    public function getById(int $id): ?User
    {
        return User::find($id);
    }

    public function create(Request $request): ?User
    {
        $result = User::create($request->only((new User())->getFillable()));

        return $result ? $result : null;
    }

}
