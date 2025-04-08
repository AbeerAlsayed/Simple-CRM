<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthService
{
    public function registerUser(array $userData)
    {
        $userData['password'] = Hash::make($userData['password']);
        $user = User::create($userData);

        $userRole = Role::firstOrCreate(['name' => 'user']);
        $user->assignRole($userRole);

        return $user;
    }

    public function attemptLogin(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }

    public function getAuthenticatedUser()
    {
        return Auth::user();
    }

    public function logoutUser(User $user)
    {
        $user->tokens()->delete();
    }
}
