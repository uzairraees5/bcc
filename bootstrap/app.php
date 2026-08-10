<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append(\App\Http\Middleware\SeoMetadataMiddleware::class);
        $middleware->alias([
            'auth' => \App\Http\Middleware\Authenticate::class,
            'admin' => \App\Http\Middleware\EnsureAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, $request) {
            if ($request->is('admin/*') || $request->is('admin')) {
                return null;
            }

            $log = \App\Models\PageViewLog::firstOrNew([
                'requested_url' => $request->getPathInfo(),
            ]);
            $log->referrer = $request->headers->get('referer');
            $log->user_agent = $request->headers->get('user-agent');
            $log->ip_address = $request->ip();
            $log->last_seen = now();
            $log->hit_count = ($log->hit_count ?? 0) + 1;
            $log->save();

            return null;
        });
    })->create();
