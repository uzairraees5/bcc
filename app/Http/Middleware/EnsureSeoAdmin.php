<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSeoAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user || !$user->is_admin || !in_array($user->role ?? null, ['seo_admin', 'super_admin'], true)) {
            abort(403, 'You are not authorized to manage SEO settings.');
        }

        return $next($request);
    }
}
