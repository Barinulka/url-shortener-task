<?php

namespace App\Service;

use App\Exceptions\InvalidAuthCredentialsException;
use App\Http\Requests\RegisterRequest;
use App\Interface\UserRepositoryInterface;
use App\Interface\UserServiceInterface;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserService implements UserServiceInterface
{
    public function __construct(
        private UserRepositoryInterface $repository,
    ) {
    }

    public function createUser(array $validateData): User
    {
        return $this->repository->createUser($validateData);
    }

    /**
     * @throws InvalidAuthCredentialsException
     */
    public function login(array $validateData): array
    {
        $this->checkAuth($validateData);

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return ['token' => $token];
    }

    public function logout(Request $request): void
    {
        $request->user()->currentAccessToken()->delete();
    }

    /**
     * @throws InvalidAuthCredentialsException
     */
    private function checkAuth(array $validateData): void
    {
        if (!Auth::attempt($validateData)) {
            throw new InvalidAuthCredentialsException();
        }
    }
}
