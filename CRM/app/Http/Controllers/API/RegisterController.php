<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\UserRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Role;

class RegisterController extends BaseController
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function register(UserRequest $request)
    {
        $userData=$request->validated();
        $user = $this->authService->registerUser($userData);

        $success = [
            'token' => $user->createToken('MyApp')->plainTextToken,
            'name' => $user->name,
        ];

        return $this->sendResponse($success, 'User register successfully.');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($this->authService->attemptLogin($credentials)) {
            $user = $this->authService->getAuthenticatedUser();
            $success = [
                'token' => $user->createToken('MyApp')->plainTextToken,
                'name' => $user->name,
            ];

            return $this->sendResponse($success, 'User login successfully.');
        }

        return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);

    }
    public function logout(Request $request)
    {
        $this->authService->logoutUser($request->user());
        return $this->sendResponse([], 'You have logged out successfully');
    }
}


