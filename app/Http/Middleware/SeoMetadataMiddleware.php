<?php

namespace App\Http\Middleware;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\SeoMeta;
use App\Models\SeoSetting;
use Closure;
use Illuminate\Http\Request;

class SeoMetadataMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $settings = SeoSetting::firstOrCreate([], ['site_name'=>config('app.name'),'default_title'=>config('app.name'),'default_description'=>'Professional cleaning services.']);
        if ($request->is('admin*')) return $this->share($settings->default_title, $settings->default_description, url($request->path()), true, true, $settings, $next, $request);

        $title = $settings->default_title;
        $description = $settings->default_description;
        $canonical = url($request->path() === '/' ? '/' : '/'.$request->path());
        $index = true; $follow = true; $ogTitle = null; $ogDescription = null; $ogImage = null; $schema = null;

        if ($request->routeIs('blog.show') && ($post = $request->route('blogPost')) instanceof BlogPost) {
            $seo = $post->seo;
            $title = $seo?->title ?: ($post->title . ' | ' . $settings->site_name);
            $description = $seo?->meta_description ?: ($post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 155));
            $canonical = $seo?->canonical_url ?: route('blog.show', $post);
            $index = $seo?->robots_index ?? true; $follow = $seo?->robots_follow ?? true;
            $ogTitle = $seo?->og_title; $ogDescription = $seo?->og_description; $ogImage = $seo?->og_image ?: ($post->image_path ? asset('storage/'.$post->image_path) : null); $schema = $seo?->custom_schema;
        } elseif ($request->routeIs('blog.category') && ($category = $request->route('category')) instanceof BlogCategory) {
            $title = $category->seo_title ?: ($category->name . ' | ' . $settings->site_name);
            $description = $category->meta_description ?: ($category->description ?: 'Browse '.$category->name.' articles.');
            $canonical = $category->canonical_url ?: route('blog.category', $category);
            $index = $category->robots_index ?? true; $follow = $category->robots_follow ?? true;
        } else {
            $path = '/'.trim($request->path(), '/'); $path = $path === '/' ? '/' : $path;
            $meta = SeoMeta::where('page_type','page')->where('slug',$path)->first() ?: SeoMeta::where('page_type','page')->where('slug','/')->first();
            if ($meta) {
                $title = $meta->title ?: (($meta->page_title ?: $settings->default_title) . ' | ' . $settings->site_name);
                $description = $meta->meta_description ?: $settings->default_description;
                $canonical = $meta->canonical_url ?: $canonical; $index = $meta->robots_index ?? true; $follow = $meta->robots_follow ?? true;
                $ogTitle = $meta->og_title; $ogDescription = $meta->og_description; $ogImage = $meta->og_image; $schema = $meta->custom_schema;
            }
        }
        return $this->share($title,$description,$canonical,$index,$follow,$settings,$next,$request,$ogTitle,$ogDescription,$ogImage,$schema);
    }

    private function share($title,$description,$canonical,$index,$follow,$settings,$next,$request,$ogTitle=null,$ogDescription=null,$ogImage=null,$schema=null)
    {
        view()->share(['seoTitle'=>$title,'seoDescription'=>$description,'seoCanonical'=>$canonical,'seoRobots'=>($index?'index':'noindex').', '.($follow?'follow':'nofollow'),'seoOgTitle'=>$ogTitle ?: $title,'seoOgDescription'=>$ogDescription ?: $description,'seoOgImage'=>$ogImage,'seoSchema'=>$schema,'seoSettings'=>$settings]);
        return $next($request);
    }
}
