<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class LoginController extends Controller
{
    public function login(UserRequest $request): JsonResponse
    {
        $credentials = $request->only(['login', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        return $this->respondWithToken($token);
    }

    private function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'type' => 'Bearer',
            'expires_in' => Config::get('jwt.ttl') * 60,
        ]);
    }
}
