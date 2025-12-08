<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RoleWebController extends Controller
{
    public function index()
    {
        $token = session('jwt_token');

        if (!$token) {
            return redirect('/')->withErrors(['auth' => 'Token not found, please login again.']);
        }

        // Ambil URL API
        $api = config('app.api_url') . '/api/roles';

        // Call API menggunakan token
        $response = Http::withToken($token)->get($api);

        if ($response->failed()) {
            return back()->withErrors(['error' => 'Failed to fetch roles data']);
        }

        $roles = $response->json('data'); // array list roles

        return view('roles.index', [
            'roles' => $roles
        ]);
    }
}
