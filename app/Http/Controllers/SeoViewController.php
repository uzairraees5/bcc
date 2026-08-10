<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;
use App\Models\SeoMeta;
use App\Models\SeoSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SeoViewController extends Controller
{
    public function renderMeta(Request $request)
    {
        $settings = SeoSetting::query()->firstOrCreate([], [
            'site_name' => config('app.name'),
            'default_title' => config('app.name'),
            'default_description' => 'Professional cleaning services.',
        ]);

        $path = $request->path();
        $meta = SeoMeta::query()->where('slug', $path)->orWhere('slug', '/' . $path)->first();

        if (!$meta) {
            $meta = SeoMeta::query()->where('page_type', 'page')->where('slug', '/')->first();
        }

        $title = $meta?->title ?? $settings->default_title;
        $description = $meta?->meta_description ?? $settings->default_description;
        $canonical = $meta?->canonical_url ?? url($path === '/' ? '/' : '/' . $path);
        $robots = ($meta?->robots_index ?? true ? 'index' : 'noindex') . ', ' . ($meta?->robots_follow ?? true ? 'follow' : 'nofollow');
        $ogTitle = $meta?->og_title ?? $title;
        $ogDescription = $meta?->og_description ?? $description;
        $schema = $meta?->custom_schema;

        return view('seo.meta', compact('title', 'description', 'canonical', 'robots', 'ogTitle', 'ogDescription', 'schema', 'settings'));
    }
}
