<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\FaqItem;
use App\Models\PageViewLog;
use App\Models\RedirectRule;
use App\Models\SeoMeta;
use App\Models\SeoSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use ReflectionFunction;

class SeoController extends Controller
{
    public function dashboard()
    {
        $this->discoverRoutePages();
        $settings = $this->settings();
        $seoPages = SeoMeta::where('page_type', 'page')->orderBy('slug')->get();
        $pages = $seoPages->count();
        $posts = BlogPost::count();
        $optimized = SeoMeta::whereNotNull('title')->where('title', '!=', '')
            ->whereNotNull('meta_description')->where('meta_description', '!=', '')
            ->whereNotNull('focus_keyword')->where('focus_keyword', '!=', '')
            ->count();
        $missingDescription = max(0, $posts - SeoMeta::where('seoable_type', BlogPost::class)->whereNotNull('meta_description')->where('meta_description', '!=', '')->count());
        $missingKeyword = max(0, $posts - SeoMeta::where('seoable_type', BlogPost::class)->whereNotNull('focus_keyword')->where('focus_keyword', '!=', '')->count());
        $missingH1 = max(0, $posts - SeoMeta::where('seoable_type', BlogPost::class)->whereNotNull('h1')->where('h1', '!=', '')->count());
        $redirects = RedirectRule::count();
        $fours = PageViewLog::where('hit_count', '>=', 1)->count();
        $recentPosts = BlogPost::with(['category', 'seo'])->latest('created_at')->take(5)->get();

        return view('admin.seo.dashboard', compact(
            'settings', 'seoPages', 'pages', 'posts', 'optimized',
            'missingDescription', 'missingKeyword', 'missingH1', 'redirects', 'fours', 'recentPosts'
        ));
    }

    public function website() { $settings = $this->settings(); return view('admin.seo.website', compact('settings')); }

    public function storeWebsite(Request $request)
    {
        $settings = $this->settings();
        $data = $request->validate([
            'site_name' => 'nullable|string|max:255', 'default_title' => 'nullable|string|max:255', 'default_description' => 'nullable|string|max:255',
            'header_scripts' => 'nullable|string', 'body_scripts' => 'nullable|string', 'footer_scripts' => 'nullable|string',
            'google_analytics' => 'nullable|string|max:255', 'google_tag_manager' => 'nullable|string|max:255', 'meta_pixel' => 'nullable|string|max:255', 'microsoft_clarity' => 'nullable|string|max:255',
            'default_robots' => 'nullable|string|max:255', 'default_canonical_base' => 'nullable|string|max:255',
            'social_og_title' => 'nullable|string|max:255', 'social_og_description' => 'nullable|string', 'social_og_image' => 'nullable|string|max:255',
            'twitter_card' => 'nullable|string|max:100', 'twitter_title' => 'nullable|string|max:255', 'twitter_description' => 'nullable|string', 'twitter_image' => 'nullable|string|max:255',
            'linkedin_title' => 'nullable|string|max:255', 'linkedin_description' => 'nullable|string', 'linkedin_image' => 'nullable|string|max:255',
            'search_console_property' => 'nullable|string|max:255', 'search_console_verification' => 'nullable|string|max:255',
        ]);
        $settings->fill($data)->save();
        return back()->with('success', 'SEO settings saved.');
    }

    public function pages()
    {
        $this->discoverRoutePages();
        $pages = SeoMeta::where('page_type', 'page')->orderBy('slug')->get();
        return view('admin.seo.pages', compact('pages'));
    }

    public function editPage(SeoMeta $seoMeta) { abort_unless($seoMeta->page_type === 'page', 404); return view('admin.seo.page-editor', compact('seoMeta')); }

    public function updatePage(Request $request, SeoMeta $seoMeta)
    {
        abort_unless($seoMeta->page_type === 'page', 404);
        $data = $request->validate([
            'page_title' => 'nullable|string|max:255', 'title' => 'nullable|string|max:255', 'meta_description' => 'nullable|string|max:255', 'focus_keyword' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255', 'canonical_url' => 'nullable|string|max:255', 'robots_index' => 'nullable|boolean', 'robots_follow' => 'nullable|boolean',
            'og_image' => 'nullable|string|max:255', 'og_title' => 'nullable|string|max:255', 'og_description' => 'nullable|string|max:255', 'h1' => 'nullable|string|max:255',
            'seo_content' => 'nullable|string', 'custom_schema' => 'nullable|string', 'schema_type' => 'nullable|string|max:255',
        ]);
        $data['robots_index'] = $request->boolean('robots_index', true);
        $data['robots_follow'] = $request->boolean('robots_follow', true);
        $seoMeta->fill($data)->save();
        return back()->with('success', 'Page SEO updated.');
    }

    public function blog() { $posts = BlogPost::with(['category', 'seo'])->latest('created_at')->paginate(20); return view('admin.seo.blog', compact('posts')); }
    public function editBlog(BlogPost $blogPost) { $seoMeta = $blogPost->seo ?: new SeoMeta(['page_type' => 'post', 'slug' => $blogPost->slug]); return view('admin.seo.blog-editor', compact('blogPost', 'seoMeta')); }

    public function updateBlog(Request $request, BlogPost $blogPost)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255', 'meta_description' => 'nullable|string|max:255', 'focus_keyword' => 'nullable|string|max:255',
            'slug' => ['required', 'string', 'max:255', Rule::unique('blog_posts', 'slug')->ignore($blogPost->id)], 'canonical_url' => 'nullable|string|max:255',
            'robots_index' => 'nullable|boolean', 'robots_follow' => 'nullable|boolean', 'og_image' => 'nullable|string|max:255', 'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:255', 'image_alt_text' => 'nullable|string|max:255', 'h1' => 'nullable|string|max:255', 'seo_content' => 'nullable|string',
            'custom_schema' => 'nullable|string', 'schema_type' => 'nullable|string|max:255',
        ]);
        $data['robots_index'] = $request->boolean('robots_index', true);
        $data['robots_follow'] = $request->boolean('robots_follow', true);
        $blogPost->update(['slug' => $data['slug'], 'image_alt_text' => $data['image_alt_text'] ?? $blogPost->image_alt_text]);
        $data['page_type'] = 'post';
        unset($data['image_alt_text']);
        $blogPost->seo()->updateOrCreate([], array_merge($data, ['slug' => $blogPost->slug, 'seoable_type' => BlogPost::class, 'seoable_id' => $blogPost->id]));
        return back()->with('success', 'Blog SEO updated.');
    }

    public function redirects() { $redirects = RedirectRule::latest('updated_at')->get(); return view('admin.seo.redirects', compact('redirects')); }
    public function storeRedirect(Request $request) { RedirectRule::create($request->validate(['source_url' => 'required|string|max:255', 'destination_url' => 'required|string|max:255', 'redirect_type' => 'required|string|max:10', 'notes' => 'nullable|string', 'is_active' => 'nullable|boolean'])); return back()->with('success', 'Redirect saved.'); }
    public function destroyRedirect(RedirectRule $redirect) { $redirect->delete(); return back()->with('success', 'Redirect deleted.'); }
    public function fourOhFour() { $logs = PageViewLog::latest('last_seen')->paginate(20); return view('admin.seo.four-oh-four', compact('logs')); }
    public function reports() { $this->discoverRoutePages(); $pages = SeoMeta::where('page_type', 'page')->get(); $posts = BlogPost::with('seo')->get(); return view('admin.seo.reports', compact('pages', 'posts')); }
    public function integrations() { $settings = $this->settings(); return view('admin.seo.integrations', compact('settings')); }
    public function schema() { return view('admin.seo.schema', ['settings' => $this->settings()]); }

    public function storeSchema(Request $request)
    {
        $fields = ['schema_organization', 'schema_website', 'schema_webpage', 'schema_local_business', 'schema_service', 'schema_product', 'schema_breadcrumb', 'schema_faq', 'schema_custom'];
        $data = $request->validate(array_fill_keys($fields, 'nullable|string'));
        foreach ($data as $key => $value) {
            if ($value !== null && $value !== '') {
                json_decode($value, true);
                if (json_last_error() !== JSON_ERROR_NONE) return back()->withErrors([$key => 'This field must contain valid JSON-LD JSON.'])->withInput();
            }
        }
        $settings = $this->settings();
        $settings->fill($data)->save();
        return back()->with('success', 'Schema settings saved.');
    }

    public function robotsAdmin() { return view('admin.seo.robots-editor', ['settings' => $this->settings()]); }
    public function storeRobots(Request $request) { $settings = $this->settings(); $settings->update($request->validate(['robots_txt' => 'required|string'])); return back()->with('success', 'robots.txt saved.'); }
    public function storeFaq(Request $request, SeoMeta $seoMeta) { $data = $request->validate(['question' => 'required|string|max:255', 'answer' => 'required|string']); $data['faqable_type'] = SeoMeta::class; $data['faqable_id'] = $seoMeta->id; $data['sort_order'] = 0; FaqItem::create($data); return back()->with('success', 'FAQ added.'); }

    public function sitemap()
    {
        $this->discoverRoutePages();
        $urls = [];
        foreach (SeoMeta::where('page_type', 'page')->where('is_active', true)->get() as $meta) $urls[] = ['loc' => url(ltrim($meta->slug, '/')), 'changefreq' => 'weekly', 'priority' => '0.8'];
        foreach (BlogPost::published()->get() as $post) $urls[] = ['loc' => route('blog.show', $post), 'changefreq' => 'weekly', 'priority' => '0.7'];
        foreach (\App\Models\BlogCategory::where('is_active', true)->get() as $category) $urls[] = ['loc' => route('blog.category', $category), 'changefreq' => 'weekly', 'priority' => '0.6'];
        return response(view('admin.seo.sitemap', compact('urls')), 200)->header('Content-Type', 'application/xml');
    }

    public function robots()
    {
        $settings = $this->settings();
        $content = $settings->robots_txt ?: "User-agent: *\nDisallow: /admin\nSitemap: " . url('/sitemap.xml') . "\n";
        return response($content, 200)->header('Content-Type', 'text/plain');
    }

    /**
     * Discover public, route-backed Blade pages and create their SEO records once.
     * This keeps the SEO panel in sync when a new public page route is added.
     */
    private function discoverRoutePages(): void
    {
        $excludedPrefixes = ['admin', 'blog'];
        $excludedUris = ['sitemap.xml', 'robots.txt'];

        foreach (Route::getRoutes() as $route) {
            if (!in_array('GET', $route->methods(), true)) {
                continue;
            }

            $uri = trim($route->uri(), '/');
            if ($uri === '' && $route->uri() !== '/') {
                continue;
            }
            if (in_array($uri, $excludedUris, true) || str_contains($uri, '{')) {
                continue;
            }
            if (collect($excludedPrefixes)->contains(fn ($prefix) => $uri === $prefix || str_starts_with($uri, $prefix . '/'))) {
                continue;
            }

            $action = $route->getAction('uses');
            if (!$action instanceof \Closure) {
                continue;
            }

            try {
                $reflection = new ReflectionFunction($action);
                $source = file_get_contents($reflection->getFileName());
            } catch (\Throwable) {
                continue;
            }

            if (!$source) {
                continue;
            }

            $pattern = '/view\(\s*[\'\"]([^\'\"]+)[\'\"]/';
            if (!preg_match($pattern, $source, $matches)) {
                continue;
            }

            $viewName = $matches[1];
            $viewPath = resource_path('views/' . str_replace('.', '/', $viewName) . '.blade.php');
            if (!is_file($viewPath)) {
                continue;
            }

            $slug = $route->uri() === '/' ? '/' : '/' . $uri;
            $pageTitle = $this->bladeSection($viewPath, 'title') ?: $this->humanizePageName($viewName);
            $metaDescription = $this->bladeSection($viewPath, 'meta_description');

            SeoMeta::firstOrCreate(
                ['page_type' => 'page', 'slug' => $slug],
                [
                    'page_title' => $pageTitle,
                    'meta_description' => $metaDescription,
                    'is_active' => true,
                    'robots_index' => true,
                    'robots_follow' => true,
                ]
            );
        }
    }

    private function bladeSection(string $path, string $section): ?string
    {
        $content = @file_get_contents($path);
        if (!$content) {
            return null;
        }

        $pattern = '/@section\(\s*[\'\"]' . preg_quote($section, '/') . '[\'\"]\s*,\s*[\'\"](.*?)[\'\"]\s*\)/s';
        return preg_match($pattern, $content, $matches) ? trim($matches[1]) : null;
    }

    private function humanizePageName(string $viewName): string
    {
        $name = last(explode('.', $viewName));
        return ucwords(str_replace(['-', '_'], ' ', $name));
    }

    private function settings(): SeoSetting
    {
        return SeoSetting::firstOrCreate([], ['site_name' => config('app.name'), 'default_title' => config('app.name'), 'default_description' => 'Professional cleaning services.']);
    }
}
