<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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


        $user->assignRole('viewer');


        return ApiResponse::success(
            'Register successful',

            $user,
            201
        );
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
        $user = Auth::user();

        return ApiResponse::success([
            'user' => [
                'id'          => $user->id,
                'name'        => $user->name,
                'email'       => $user->email,
                'created_at'  => $user->created_at,
            ],
            'roles' => $user->getRoleNames(), // Spatie
            'permissions' => $user->getAllPermissions()->pluck('name'),
        ]);
    }
}
