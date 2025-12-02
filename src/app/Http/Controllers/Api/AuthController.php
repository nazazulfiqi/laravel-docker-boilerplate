<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Helpers\ApiResponse;


class AuthController extends Controller
{
  public function register(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
    ]);

    $token = JWTAuth::fromUser($user);

    return ApiResponse::success('Register successful', 
       
        $user
    , 201);
}



    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
        return ApiResponse::error('Unauthorized', null, 401);
    }

    return ApiResponse::success('Login successful', [
        'token' => $token
    ]);
    }

    public function me()
    {
        return ApiResponse::success(auth()->user(), 'User retrieved successfully');
    }
}
