<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqItem;
use App\Models\PageViewLog;
use App\Models\RedirectRule;
use App\Models\SeoMeta;
use App\Models\SeoSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SeoController extends Controller
{
    public function dashboard()
    {
        $settings = SeoSetting::query()->firstOrCreate([], [
            'site_name' => config('app.name'),
            'default_title' => config('app.name'),
            'default_description' => 'Professional cleaning services.',
        ]);

        $pages = SeoMeta::query()->where('page_type', 'page')->count();
        $posts = SeoMeta::query()->where('page_type', 'post')->count();
        $optimized = SeoMeta::query()->whereNotNull('title')->whereNotNull('meta_description')->whereNotNull('focus_keyword')->count();
        $missingDescription = SeoMeta::query()->where(function ($query) {
            $query->whereNull('meta_description')->orWhere('meta_description', '');
        })->count();
        $missingKeyword = SeoMeta::query()->where(function ($query) {
            $query->whereNull('focus_keyword')->orWhere('focus_keyword', '');
        })->count();
        $missingH1 = SeoMeta::query()->where(function ($query) {
            $query->whereNull('h1')->orWhere('h1', '');
        })->count();
        $redirects = RedirectRule::query()->count();
        $fours = PageViewLog::query()->where('hit_count', '>=', 1)->count();

        return view('admin.seo.dashboard', compact('settings', 'pages', 'posts', 'optimized', 'missingDescription', 'missingKeyword', 'missingH1', 'redirects', 'fours'));
    }

    public function website()
    {
        $settings = SeoSetting::query()->firstOrCreate([], [
            'site_name' => config('app.name'),
            'default_title' => config('app.name'),
            'default_description' => 'Professional cleaning services.',
        ]);

        return view('admin.seo.website', compact('settings'));
    }

    public function storeWebsite(Request $request)
    {
        $settings = SeoSetting::query()->firstOrCreate([], [
            'site_name' => config('app.name'),
            'default_title' => config('app.name'),
            'default_description' => 'Professional cleaning services.',
        ]);

        $data = $request->validate([
            'site_name' => ['nullable', 'string', 'max:255'],
            'default_title' => ['nullable', 'string', 'max:255'],
            'default_description' => ['nullable', 'string', 'max:255'],
            'header_scripts' => ['nullable', 'string'],
            'body_scripts' => ['nullable', 'string'],
            'footer_scripts' => ['nullable', 'string'],
            'google_analytics' => ['nullable', 'string', 'max:255'],
            'google_tag_manager' => ['nullable', 'string', 'max:255'],
            'meta_pixel' => ['nullable', 'string', 'max:255'],
            'microsoft_clarity' => ['nullable', 'string', 'max:255'],
            'default_robots' => ['nullable', 'string', 'max:255'],
            'default_canonical_base' => ['nullable', 'string', 'max:255'],
        ]);

        $settings->fill($data)->save();

        return redirect()->route('admin.seo.website')->with('success', 'SEO settings saved.');
    }

    public function pages()
    {
        $pages = SeoMeta::query()->where('page_type', 'page')->orderByDesc('updated_at')->get();

        $routes = [
            ['slug' => '/', 'title' => 'Home'],
            ['slug' => '/about-us', 'title' => 'About Us'],
            ['slug' => '/commercial-cleaning', 'title' => 'Commercial Cleaning'],
            ['slug' => '/services', 'title' => 'Services'],
            ['slug' => '/contact', 'title' => 'Contact'],
            ['slug' => '/locations', 'title' => 'Locations'],
            ['slug' => '/case-studies', 'title' => 'Case Studies'],
            ['slug' => '/book-walkthrough', 'title' => 'Book Walkthrough'],
        ];

        foreach ($routes as $route) {
            $existing = $pages->firstWhere('slug', $route['slug']);
            if (!$existing) {
                $created = SeoMeta::create([
                    'slug' => $route['slug'],
                    'title' => $route['title'],
                    'page_type' => 'page',
                    'is_active' => true,
                ]);

                $pages->push($created);
            }
        }

        return view('admin.seo.pages', compact('pages'));
    }

    public function editPage(SeoMeta $seoMeta)
    {
        return view('admin.seo.page-editor', compact('seoMeta'));
    }

    public function updatePage(Request $request, SeoMeta $seoMeta)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'focus_keyword' => ['nullable', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'canonical_url' => ['nullable', 'string', 'max:255'],
            'robots_index' => ['nullable', 'boolean'],
            'robots_follow' => ['nullable', 'boolean'],
            'og_image' => ['nullable', 'string', 'max:255'],
            'og_title' => ['nullable', 'string', 'max:255'],
            'og_description' => ['nullable', 'string', 'max:255'],
            'h1' => ['nullable', 'string', 'max:255'],
            'seo_content' => ['nullable', 'string'],
            'custom_schema' => ['nullable', 'string'],
            'schema_type' => ['nullable', 'string', 'max:255'],
            'page_type' => ['nullable', 'string', 'max:255'],
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title'] ?? $seoMeta->seoable?->name ?? 'page');
        }

        $seoMeta->fill($data)->save();

        return redirect()->route('admin.seo.pages')->with('success', 'Page SEO updated.');
    }

    public function blog()
    {
        $posts = SeoMeta::query()->where('page_type', 'post')->orderByDesc('updated_at')->get();

        return view('admin.seo.blog', compact('posts'));
    }

    public function redirects()
    {
        $redirects = RedirectRule::query()->orderByDesc('updated_at')->get();

        return view('admin.seo.redirects', compact('redirects'));
    }

    public function storeRedirect(Request $request)
    {
        $data = $request->validate([
            'source_url' => ['required', 'string', 'max:255'],
            'destination_url' => ['required', 'string', 'max:255'],
            'redirect_type' => ['required', 'string', 'max:10'],
            'notes' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        RedirectRule::create($data);

        return redirect()->route('admin.seo.redirects')->with('success', 'Redirect saved.');
    }

    public function destroyRedirect(RedirectRule $redirect)
    {
        $redirect->delete();

        return redirect()->route('admin.seo.redirects')->with('success', 'Redirect deleted.');
    }

    public function fourOhFour()
    {
        $logs = PageViewLog::query()->orderByDesc('last_seen')->paginate(20);

        return view('admin.seo.four-oh-four', compact('logs'));
    }

    public function sitemap()
    {
        $urls = [];
        $urls[] = ['loc' => url('/'), 'changefreq' => 'weekly', 'priority' => '1.0'];
        $urls[] = ['loc' => url('/about-us'), 'changefreq' => 'monthly', 'priority' => '0.8'];
        $urls[] = ['loc' => url('/services'), 'changefreq' => 'monthly', 'priority' => '0.8'];
        $urls[] = ['loc' => url('/contact'), 'changefreq' => 'monthly', 'priority' => '0.6'];

        $response = response(view('admin.seo.sitemap', compact('urls')), 200)
            ->header('Content-Type', 'application/xml');

        return $response;
    }

    public function robots()
    {
        $settings = SeoSetting::query()->firstOrCreate([], [
            'site_name' => config('app.name'),
            'default_title' => config('app.name'),
            'default_description' => 'Professional cleaning services.',
        ]);

        return response("User-agent: *\nDisallow: /admin\nSitemap: " . url('/sitemap.xml') . "\n", 200)
            ->header('Content-Type', 'text/plain');
    }

    public function reports()
    {
        $pages = SeoMeta::query()->where('page_type', 'page')->get();
        $posts = SeoMeta::query()->where('page_type', 'post')->get();

        return view('admin.seo.reports', compact('pages', 'posts'));
    }

    public function integrations()
    {
        $settings = SeoSetting::query()->firstOrCreate([], [
            'site_name' => config('app.name'),
            'default_title' => config('app.name'),
            'default_description' => 'Professional cleaning services.',
        ]);

        return view('admin.seo.integrations', compact('settings'));
    }

    public function storeFaq(Request $request, SeoMeta $seoMeta)
    {
        $data = $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
        ]);

        $data['faqable_type'] = SeoMeta::class;
        $data['faqable_id'] = $seoMeta->id;
        $data['sort_order'] = 0;

        FaqItem::create($data);

        return redirect()->back()->with('success', 'FAQ added.');
    }

    public function schema()
    {
        return view('admin.seo.schema');
    }
}
