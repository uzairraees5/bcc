<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [];

    protected $middlewareGroups = [
        'web' => [
            \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
        ],
    ];

    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'admin' => \App\Http\Middleware\EnsureAdmin::class,
    ];
}
