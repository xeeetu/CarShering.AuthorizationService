<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService) {}

    public function store(UserRequest $request): JsonResponse
    {
        $result = $this->userService->create($request);
        if (!$result) {
            return response()->json(['success' => false, 'Ошибка сохранения!'])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['success' => true, 'Успешно сохранено!'])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

}
