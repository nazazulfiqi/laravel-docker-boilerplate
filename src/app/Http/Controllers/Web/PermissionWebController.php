<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PermissionWebController extends Controller
{
    public function index()
    {
        $token = session('jwt_token');

        if (!$token) {
            return redirect('/login')->withErrors(['auth' => 'Token not found, please login again.']);
        }

        // Ambil URL API
        $api = config('app.api_url') . '/api/permissions';

        // Call API menggunakan token
        $response = Http::withToken($token)->get($api);

        if ($response->failed()) {
            return back()->withErrors(['error' => 'Failed to fetch permissions data']);
        }

        $permissions = $response->json('data'); // array list permissions

        return view('permissions.index', [
            'permissions' => $permissions
        ]);
    }
}
