<?php

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
            'role' => 'Spatie\Permission\Middlewares\RoleMiddleware',
            'permission' => 'Spatie\Permission\Middlewares\PermissionMiddleware',
            'role_or_permission' => 'Spatie\Permission\Middlewares\RoleOrPermissionMiddleware',
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {

        // 1. Validation Errors
        $exceptions->renderable(function (\Illuminate\Validation\ValidationException $e) {
            return \App\Helpers\ApiResponse::error(
                'Validation error',
                $e->errors(),
                422
            );
        });

        // 2. Authentication / JWT Auth Errors
        $exceptions->renderable(function (\Illuminate\Auth\AuthenticationException $e) {
            return \App\Helpers\ApiResponse::error(
                'Unauthorized',
                null,
                401
            );
        });

        // 3. JWT Token Exception
        $exceptions->renderable(function (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return \App\Helpers\ApiResponse::error(
                'Token error',
                $e->getMessage(),
                401
            );
        });

        // 4. Model Not Found
        $exceptions->renderable(function (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return \App\Helpers\ApiResponse::error(
                'Resource not found',
                null,
                404
            );
        });

        // 5. Route Not Found
        $exceptions->renderable(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e) {
            return \App\Helpers\ApiResponse::error(
                'Endpoint not found',
                null,
                404
            );
        });

        // 6. Method Not Allowed (GET ke POST, dll)
        $exceptions->renderable(function (\Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException $e) {
            return \App\Helpers\ApiResponse::error(
                'Method not allowed',
                null,
                405
            );
        });

        // 7. Query (SQL) errors
        $exceptions->renderable(function (\Illuminate\Database\QueryException $e) {
            return \App\Helpers\ApiResponse::error(
                'Database error',
                $e->getMessage(),
                500
            );
        });

        // 8. Fallback: unknown error
        $exceptions->renderable(function (\Throwable $e) {
            return \App\Helpers\ApiResponse::error(
                'Server error',
                $e->getMessage(),
                500
            );
        });
    })
    ->create();
