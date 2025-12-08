<?php

use App\Helpers\ApiResponse;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'jwt' => \Tymon\JWTAuth\Http\Middleware\Authenticate::class,
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => 'Spatie\Permission\Middlewares\PermissionMiddleware',
            'role_or_permission' => 'Spatie\Permission\Middlewares\RoleOrPermissionMiddleware',
            'auth.web' => \App\Http\Middleware\WebAuthMiddleware::class,
            'jwt.check' => \App\Http\Middleware\CheckJwtToken::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {

        /**
         * 401 — JWT: Token invalid
         */
        $exceptions->renderable(function (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return ApiResponse::error(
                'Unauthorized',
                'Invalid token',
                401
            );
        });



        /**
         * 401 — JWT: Token missing / not provided
         */
        $exceptions->renderable(function (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return ApiResponse::error(
                'Unauthorized',
                $e->getMessage() ?? 'Token not provided',
                401
            );
        });

        /**
         * 422 — Validation error
         */
        $exceptions->renderable(function (\Illuminate\Validation\ValidationException $e) {
            return ApiResponse::error(
                'Validation error',
                $e->errors(),
                422
            );
        });

        /**
         * 401 — Tidak autentikasi umum
         */
        $exceptions->renderable(function (\Illuminate\Auth\AuthenticationException $e) {
            return ApiResponse::error(
                'Unauthorized',
                null,
                401
            );
        });

        /**
         * 404 — Model tidak ditemukan
         */
        $exceptions->renderable(function (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return ApiResponse::error(
                'Resource not found',
                null,
                404
            );
        });

        /**
         * 404 — Endpoint tidak ditemukan
         */
        $exceptions->renderable(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e) {
            return ApiResponse::error(
                'Endpoint not found',
                null,
                404
            );
        });

        /**
         * 405 — Method tidak diperbolehkan
         */
        $exceptions->renderable(function (\Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException $e) {
            return ApiResponse::error(
                'Method not allowed',
                null,
                405
            );
        });

        /**
         * 500 — Error database
         */
        $exceptions->renderable(function (\Illuminate\Database\QueryException $e) {
            return ApiResponse::error(
                'Database error',
                $e->getMessage(),
                500
            );
        });

        /**
         * 401 — JWT: Token not provided by middleware Authenticate
         */
        $exceptions->renderable(function (\Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException $e) {
            return ApiResponse::error(
                'Unauthorized',
                $e->getMessage(),
                401
            );
        });

        /**
         * 500 — fallback semua error
         */
        $exceptions->renderable(function (\Throwable $e) {
            return ApiResponse::error(
                'Server error',
                $e->getMessage(),
                500
            );
        });
    })
    ->create();
