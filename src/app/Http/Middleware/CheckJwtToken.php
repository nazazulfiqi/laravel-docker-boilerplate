<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckJwtToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = session('jwt_token');

        if (!$token || $this->isTokenExpired($token)) {
            return redirect()->route('login')->withErrors([
                'token' => 'Session expired. Please login again.'
            ]);
        }

        return $next($request);
    }

    private function isTokenExpired($token)
    {
        try {
            $payload = json_decode(base64_decode(explode('.', $token)[1]), true);
            return $payload['exp'] < time();
        } catch (\Exception $e) {
            return true;
        }
    }
}
