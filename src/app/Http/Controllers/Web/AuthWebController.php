<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthWebController extends Controller
{

    public function showLogin()
    {

        // if (session()->has('jwt_token')) {
        //     return redirect('/dashboard');
        // }

        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $api = config('app.api_url') . '/api/login';

        $response = Http::post($api, [
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        if ($response->failed()) {
            ToastMagic::error('Login failed', 'Invalid email or password');
            return back()->withErrors(['login' => 'Invalid email or password']);
        }

        $token = $response->json('data.token');

        // Simpan token
        session(['jwt_token' => $token]);

        /** ----------------------------
         * 🔥 FETCH USER / ROLES / PERMISSIONS
         * ---------------------------- */
        $me = Http::withToken($token)->get(config('app.api_url') . '/api/me');

        if ($me->failed()) {
            session()->forget('jwt_token');
            return redirect('/login')->withErrors(['auth' => 'Session expired, please login again.']);
        }

        $data = $me->json('data');

        // Simpan user ke session
        session([
            'auth_user'        => $data['user'],
            'auth_roles'       => $data['roles'],
            'auth_permissions' => $data['permissions'],
        ]);

        ToastMagic::success('Logged in', 'Welcome back!');

        return redirect('/dashboard');
    }


    public function register(Request $request)
    {
        $api = env('API_URL') . '/api/register';
        $response = Http::post($api, $request->all());


        if ($response->failed()) {
            return back()->withErrors(['register' => 'Registration failed']);
        }

        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }
    public function logout()
    {
        session()->forget('jwt_token');
        session()->forget('auth_user');
        session()->forget('auth_roles');
        session()->forget('auth_permissions');

        ToastMagic::success('Logged out', 'You have been logged out successfully.');

        return redirect('/')->with('success', 'Logged out successfully');
    }
}
