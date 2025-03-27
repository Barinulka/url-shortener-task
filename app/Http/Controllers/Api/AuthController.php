<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Interface\UserServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(
        private UserServiceInterface $service,
    ) {
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $validateData = $request->validated();

        $user = $this->service->createUser($validateData);

        return response()->json(['id' => $user->id], Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $validateData = $request->validated();

        try {
            $tokenData = $this->service->login($validateData);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], Response::HTTP_BAD_REQUEST);
        }

        return response()->json($tokenData, Response::HTTP_OK);
    }

    public function logout(Request $request): JsonResponse
    {
        $this->service->logout($request);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
