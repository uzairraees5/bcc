<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as BaseAuthenticate;

class Authenticate extends BaseAuthenticate
{
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            return route('admin.login');
        }

        return null;
    }
}
