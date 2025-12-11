<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Helpers\ApiResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = $this->auth->register($data);

        return ApiResponse::success($user, 'Register successful', 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Set expired 1 hari (1440 menit)
        JWTAuth::factory()->setTTL(1440);

        $token = $this->auth->login($credentials);

        if (!$token) {
            return ApiResponse::error('Unauthorized', 401);
        }

        return ApiResponse::success(
            ['token' => $token],
            'Login successful'
        );
    }


    public function me()
    {
        return ApiResponse::success($this->auth->me());
    }
}
