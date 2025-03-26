<?php

namespace App\Interface;

use App\Models\User;
use Illuminate\Http\Request;

interface UserServiceInterface
{
    public function createUser(array $validateData): User;
    public function login(array $validateData): array;
    public function logout(Request $request): void;

}
