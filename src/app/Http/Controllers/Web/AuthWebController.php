<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
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
            return back()->withErrors(['login' => 'Invalid email or password']);
        }

        $token = $response->json('data.token');

        // Simpan token di session
        session(['jwt_token' => $token]);

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
        return redirect('/')->with('success', 'Logged out successfully');
    }
}
