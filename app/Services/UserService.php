<?php

namespace App\Services;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\UserRepository;

final class UserService
{
    public function __construct(private readonly UserRepository $repository) {}

    public function create(UserRequest $request): ?User
    {
        return $this->repository->create($request);
    }

}
