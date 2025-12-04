<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardWebController extends Controller
{
    public function index()
    {
        $token = session('jwt_token');

        if (!$token) {
            return redirect('/login')->withErrors(['auth' => 'Token not found, please login again.']);
        }

        // Panggil API /me
        $api = config('app.api_url') . '/api/me';

        $response = Http::withToken($token)->get($api);

        if ($response->failed()) {
            return redirect('/login')->withErrors(['auth' => 'Session expired, please login again.']);
        }

        $data = $response->json('data');

        return view('main.dashboard', [
            'user' => $data['user'],
            'roles' => $data['roles'],
            'permissions' => $data['permissions'],
        ]);
    }
}
