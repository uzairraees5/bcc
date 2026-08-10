<?php

namespace App\Http\Middleware;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\SeoMeta;
use App\Models\SeoSetting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SeoMetadataMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $settings = SeoSetting::firstOrCreate([], [
            'site_name' => config('app.name'),
            'default_title' => config('app.name'),
            'default_description' => 'Professional cleaning services.',
        ]);

        if ($request->is('admin*')) {
            return $next($request);
        }

        $title = $settings->default_title ?: $settings->site_name;
        $description = $settings->default_description;
        $canonical = $settings->default_canonical_base
            ? rtrim($settings->default_canonical_base, '/') . ($request->path() === '/' ? '' : '/' . $request->path())
            : url($request->path() === '/' ? '/' : '/' . $request->path());
        $index = true;
        $follow = true;
        $ogTitle = $settings->social_og_title ?: null;
        $ogDescription = $settings->social_og_description ?: null;
        $ogImage = $settings->social_og_image ?: null;
        $seoH1 = null;
        $seoContent = null;
        $schemaNodes = [];

        if ($request->routeIs('blog.show') && ($post = $request->route('blogPost')) instanceof BlogPost) {
            $seo = $post->seo;
            $title = $seo?->title ?: ($post->title . ' | ' . $settings->site_name);
            $description = $seo?->meta_description ?: ($post->excerpt ?: Str::limit(strip_tags($post->content), 155));
            $canonical = $seo?->canonical_url ?: route('blog.show', $post);
            $index = $seo?->robots_index ?? true;
            $follow = $seo?->robots_follow ?? true;
            $ogTitle = $seo?->og_title ?: $title;
            $ogDescription = $seo?->og_description ?: $description;
            $ogImage = $seo?->og_image ?: ($post->image_path ? asset('storage/' . $post->image_path) : $settings->social_og_image);
            $seoH1 = $seo?->h1 ?: $post->title;
            $seoContent = $seo?->seo_content;

            $this->pushJsonNode($schemaNodes, $seo?->custom_schema);
            $schemaNodes[] = [
                '@type' => 'BlogPosting',
                'headline' => $post->title,
                'description' => $description,
                'datePublished' => optional($post->published_at)->toIso8601String(),
                'dateModified' => optional($post->updated_at)->toIso8601String(),
                'image' => $ogImage,
                'mainEntityOfPage' => $canonical,
                'author' => $post->author ? ['@type' => 'Person', 'name' => $post->author->name] : null,
            ];

            if ($seo) {
                foreach ($seo->faqs as $faq) {
                    $schemaNodes[] = [
                        '@type' => 'Question',
                        'name' => $faq->question,
                        'acceptedAnswer' => ['@type' => 'Answer', 'text' => strip_tags($faq->answer)],
                    ];
                }
            }
        } elseif ($request->routeIs('blog.category') && ($category = $request->route('category')) instanceof BlogCategory) {
            $title = $category->seo_title ?: ($category->name . ' | ' . $settings->site_name);
            $description = $category->meta_description ?: ($category->description ?: 'Browse ' . $category->name . ' articles.');
            $canonical = $category->canonical_url ?: route('blog.category', $category);
            $index = $category->robots_index ?? true;
            $follow = $category->robots_follow ?? true;
            $ogTitle = $title;
            $ogDescription = $description;
            $seoH1 = $category->name;
        } else {
            $path = '/' . trim($request->path(), '/');
            $path = $path === '/' ? '/' : $path;
            $meta = SeoMeta::where('page_type', 'page')->where('slug', $path)->first();

            if ($meta) {
                $title = $meta->title ?: (($meta->page_title ?: $settings->default_title) . ' | ' . $settings->site_name);
                $description = $meta->meta_description ?: $settings->default_description;
                $canonical = $meta->canonical_url ?: $canonical;
                $index = $meta->robots_index ?? true;
                $follow = $meta->robots_follow ?? true;
                $ogTitle = $meta->og_title ?: $title;
                $ogDescription = $meta->og_description ?: $description;
                $ogImage = $meta->og_image ?: $settings->social_og_image;
                $seoH1 = $meta->h1 ?: $meta->page_title;
                $seoContent = $meta->seo_content;

                $this->pushJsonNode($schemaNodes, $meta->custom_schema);
                foreach ($meta->faqs as $faq) {
                    $schemaNodes[] = [
                        '@type' => 'Question',
                        'name' => $faq->question,
                        'acceptedAnswer' => ['@type' => 'Answer', 'text' => strip_tags($faq->answer)],
                    ];
                }
            }
        }

        // Add a standard WebPage node for normal pages while keeping custom schemas intact.
        if (!$request->routeIs('blog.show') && !$request->routeIs('blog.category')) {
            $schemaNodes[] = [
                '@type' => 'WebPage',
                'name' => $title,
                'description' => $description,
                'url' => $canonical,
            ];
        }

        foreach ([
            'schema_organization', 'schema_website', 'schema_webpage', 'schema_local_business',
            'schema_service', 'schema_product', 'schema_breadcrumb', 'schema_faq', 'schema_custom',
        ] as $field) {
            $this->pushJsonNode($schemaNodes, $settings->{$field});
        }

        $schema = null;
        if ($schemaNodes) {
            $faqQuestions = array_values(array_filter($schemaNodes, fn ($node) => is_array($node) && (($node['@type'] ?? null) === 'Question')));
            $graph = array_values(array_filter($schemaNodes, fn ($node) => is_array($node) && (($node['@type'] ?? null) !== 'Question')));
            if ($faqQuestions) {
                $graph[] = ['@type' => 'FAQPage', 'mainEntity' => $faqQuestions];
            }
            $schema = json_encode(['@context' => 'https://schema.org', '@graph' => $graph], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }

        view()->share([
            'seoTitle' => $title,
            'seoDescription' => $description,
            'seoCanonical' => $canonical,
            'seoRobots' => ($index ? 'index' : 'noindex') . ', ' . ($follow ? 'follow' : 'nofollow'),
            'seoOgTitle' => $ogTitle ?: $title,
            'seoOgDescription' => $ogDescription ?: $description,
            'seoOgImage' => $ogImage,
            'seoTwitterCard' => $settings->twitter_card ?: 'summary_large_image',
            'seoTwitterTitle' => $settings->twitter_title ?: ($ogTitle ?: $title),
            'seoTwitterDescription' => $settings->twitter_description ?: ($ogDescription ?: $description),
            'seoTwitterImage' => $settings->twitter_image ?: $ogImage,
            'seoLinkedinTitle' => $settings->linkedin_title ?: ($ogTitle ?: $title),
            'seoLinkedinDescription' => $settings->linkedin_description ?: ($ogDescription ?: $description),
            'seoLinkedinImage' => $settings->linkedin_image ?: $ogImage,
            'seoH1' => $seoH1,
            'seoContent' => $seoContent,
            'seoSchema' => $schema,
            'seoSettings' => $settings,
        ]);

        return $next($request);
    }

    private function pushJsonNode(array &$nodes, ?string $json): void
    {
        if (!$json) return;
        $decoded = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) return;

        if (isset($decoded['@graph']) && is_array($decoded['@graph'])) {
            foreach ($decoded['@graph'] as $node) if (is_array($node)) $nodes[] = $node;
            return;
        }

        unset($decoded['@context']);
        $nodes[] = $decoded;
    }
}
