<?php

namespace App\Services;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

final class UserService
{
    public function __construct(private readonly UserRepository $repository) {}

    public function getById(int $id): ?User
    {
        return $this->repository->getById($id);
    }

    public function create(Request $request): ?User
    {
        return $this->repository->create($request);
    }

}
