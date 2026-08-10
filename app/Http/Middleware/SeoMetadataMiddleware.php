<?php

namespace App\Http\Middleware;

use App\Models\SeoMeta;
use App\Models\SeoSetting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SeoMetadataMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $settings = SeoSetting::query()->firstOrCreate([], [
            'site_name' => config('app.name'),
            'default_title' => config('app.name'),
            'default_description' => 'Professional cleaning services.',
        ]);

        if ($request->is('admin*')) {
            view()->share('seoTitle', $settings->default_title);
            view()->share('seoDescription', $settings->default_description);
            view()->share('seoCanonical', url($request->path() === '/' ? '/' : '/' . $request->path()));
            view()->share('seoRobots', 'index,follow');
            view()->share('seoOgTitle', $settings->default_title);
            view()->share('seoOgDescription', $settings->default_description);
            view()->share('seoOgImage', '');
            view()->share('seoSchema', '');
            view()->share('seoSettings', $settings);

            return $next($request);
        }

        $path = '/' . trim((string) $request->path(), '/');
        $path = $path === '/' ? '/' : $path;

        $meta = SeoMeta::query()->where('slug', $path)->first();
        if (!$meta) {
            $meta = SeoMeta::query()->where('slug', '/')->first();
        }

        $metaData = $meta ?: (object) [
            'title' => $settings->default_title,
            'meta_description' => $settings->default_description,
            'canonical_url' => url($path),
            'robots_index' => true,
            'robots_follow' => true,
            'og_title' => null,
            'og_description' => null,
            'og_image' => null,
            'custom_schema' => null,
        ];

        view()->share('seoTitle', $metaData->title ?? $settings->default_title);
        view()->share('seoDescription', $metaData->meta_description ?? $settings->default_description);
        view()->share('seoCanonical', $metaData->canonical_url ?? url($path));
        view()->share('seoRobots', (($metaData->robots_index ?? true) ? 'index' : 'noindex') . ', ' . (($metaData->robots_follow ?? true) ? 'follow' : 'nofollow'));
        view()->share('seoOgTitle', $metaData->og_title ?? $metaData->title ?? $settings->default_title);
        view()->share('seoOgDescription', $metaData->og_description ?? $metaData->meta_description ?? $settings->default_description);
        view()->share('seoOgImage', $metaData->og_image ?? '');
        view()->share('seoSchema', $metaData->custom_schema ?? '');
        view()->share('seoSettings', $settings);

        return $next($request);
    }
}
