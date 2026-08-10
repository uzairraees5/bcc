<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
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
        $settings = $this->settings();
        $pages = SeoMeta::where('page_type', 'page')->count();
        $posts = BlogPost::count();
        $optimized = SeoMeta::whereNotNull('title')->where('title', '!=', '')->whereNotNull('meta_description')->where('meta_description', '!=', '')->whereNotNull('focus_keyword')->where('focus_keyword', '!=', '')->count();
        $missingDescription = BlogPost::count() - SeoMeta::where('seoable_type', BlogPost::class)->whereNotNull('meta_description')->where('meta_description', '!=', '')->count();
        $missingKeyword = BlogPost::count() - SeoMeta::where('seoable_type', BlogPost::class)->whereNotNull('focus_keyword')->where('focus_keyword', '!=', '')->count();
        $missingH1 = BlogPost::count() - SeoMeta::where('seoable_type', BlogPost::class)->whereNotNull('h1')->where('h1', '!=', '')->count();
        $redirects = RedirectRule::count();
        $fours = PageViewLog::where('hit_count', '>=', 1)->count();
        $recentPosts = BlogPost::with('category')->latest('created_at')->take(5)->get();

        return view('admin.seo.dashboard', compact('settings', 'pages', 'posts', 'optimized', 'missingDescription', 'missingKeyword', 'missingH1', 'redirects', 'fours', 'recentPosts'));
    }

    public function website()
    {
        $settings = $this->settings();
        return view('admin.seo.website', compact('settings'));
    }

    public function storeWebsite(Request $request)
    {
        $settings = $this->settings();
        $data = $request->validate([
            'site_name' => ['nullable', 'string', 'max:255'],
            'default_title' => ['nullable', 'string', 'max:255'],
            'default_description' => ['nullable', 'string', 'max:255'],
            'header_scripts' => ['nullable', 'string'], 'body_scripts' => ['nullable', 'string'], 'footer_scripts' => ['nullable', 'string'],
            'google_analytics' => ['nullable', 'string', 'max:255'], 'google_tag_manager' => ['nullable', 'string', 'max:255'], 'meta_pixel' => ['nullable', 'string', 'max:255'], 'microsoft_clarity' => ['nullable', 'string', 'max:255'],
            'default_robots' => ['nullable', 'string', 'max:255'], 'default_canonical_base' => ['nullable', 'string', 'max:255'],
        ]);
        $settings->fill($data)->save();
        return back()->with('success', 'SEO settings saved.');
    }

    public function pages()
    {
        $pages = SeoMeta::where('page_type', 'page')->orderByDesc('updated_at')->get();
        $routes = [
            ['slug' => '/', 'title' => 'Home'], ['slug' => '/about-us', 'title' => 'About Us'], ['slug' => '/commercial-cleaning', 'title' => 'Commercial Cleaning'], ['slug' => '/services', 'title' => 'Services'], ['slug' => '/contact', 'title' => 'Contact'], ['slug' => '/locations', 'title' => 'Locations'], ['slug' => '/case-studies', 'title' => 'Case Studies'], ['slug' => '/book-walkthrough', 'title' => 'Book Walkthrough'],
        ];
        foreach ($routes as $route) {
            $existing = $pages->firstWhere('slug', $route['slug']);
            if (!$existing) {
                $created = SeoMeta::create(['slug' => $route['slug'], 'page_title' => $route['title'], 'title' => null, 'page_type' => 'page', 'is_active' => true]);
                $pages->push($created);
            }
        }
        return view('admin.seo.pages', compact('pages'));
    }

    public function editPage(SeoMeta $seoMeta)
    {
        abort_unless($seoMeta->page_type === 'page', 404);
        return view('admin.seo.page-editor', compact('seoMeta'));
    }

    public function updatePage(Request $request, SeoMeta $seoMeta)
    {
        abort_unless($seoMeta->page_type === 'page', 404);
        $data = $request->validate([
            'page_title' => ['nullable', 'string', 'max:255'], 'title' => ['nullable', 'string', 'max:255'], 'meta_description' => ['nullable', 'string', 'max:255'], 'focus_keyword' => ['nullable', 'string', 'max:255'], 'slug' => ['required', 'string', 'max:255'], 'canonical_url' => ['nullable', 'string', 'max:255'], 'robots_index' => ['nullable', 'boolean'], 'robots_follow' => ['nullable', 'boolean'], 'og_image' => ['nullable', 'string', 'max:255'], 'og_title' => ['nullable', 'string', 'max:255'], 'og_description' => ['nullable', 'string', 'max:255'], 'h1' => ['nullable', 'string', 'max:255'], 'seo_content' => ['nullable', 'string'], 'custom_schema' => ['nullable', 'string'], 'schema_type' => ['nullable', 'string', 'max:255'],
        ]);
        $data['robots_index'] = $request->boolean('robots_index', true);
        $data['robots_follow'] = $request->boolean('robots_follow', true);
        $seoMeta->fill($data)->save();
        return redirect()->route('admin.seo.pages')->with('success', 'Page SEO updated.');
    }

    public function blog()
    {
        $posts = BlogPost::with(['category', 'seo'])->orderByDesc('created_at')->paginate(20);
        return view('admin.seo.blog', compact('posts'));
    }

    public function editBlog(BlogPost $blogPost)
    {
        $seoMeta = $blogPost->seo ?: new SeoMeta(['page_type' => 'post', 'slug' => $blogPost->slug, 'title' => null]);
        return view('admin.seo.blog-editor', compact('blogPost', 'seoMeta'));
    }

    public function updateBlog(Request $request, BlogPost $blogPost)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'], 'meta_description' => ['nullable', 'string', 'max:255'], 'focus_keyword' => ['nullable', 'string', 'max:255'], 'slug' => ['required', 'string', 'max:255'], 'canonical_url' => ['nullable', 'string', 'max:255'], 'robots_index' => ['nullable', 'boolean'], 'robots_follow' => ['nullable', 'boolean'], 'og_image' => ['nullable', 'string', 'max:255'], 'og_title' => ['nullable', 'string', 'max:255'], 'og_description' => ['nullable', 'string', 'max:255'], 'image_alt_text' => ['nullable', 'string', 'max:255'], 'h1' => ['nullable', 'string', 'max:255'], 'seo_content' => ['nullable', 'string'], 'custom_schema' => ['nullable', 'string'], 'schema_type' => ['nullable', 'string', 'max:255'],
        ]);
        $data['robots_index'] = $request->boolean('robots_index', true);
        $data['robots_follow'] = $request->boolean('robots_follow', true);
        $data['page_type'] = 'post';
        $data['seoable_type'] = BlogPost::class;
        $data['seoable_id'] = $blogPost->id;
        $blogPost->seo()->updateOrCreate([], $data);
        if ($request->filled('image_alt_text')) {
            $blogPost->update(['image_alt_text' => $request->string('image_alt_text')->toString()]);
        }
        return redirect()->route('admin.seo.blog')->with('success', 'Blog SEO updated.');
    }

    public function redirects() { $redirects = RedirectRule::latest('updated_at')->get(); return view('admin.seo.redirects', compact('redirects')); }
    public function storeRedirect(Request $request) { $data = $request->validate(['source_url'=>'required|string|max:255','destination_url'=>'required|string|max:255','redirect_type'=>'required|string|max:10','notes'=>'nullable|string','is_active'=>'nullable|boolean']); RedirectRule::create($data); return back()->with('success','Redirect saved.'); }
    public function destroyRedirect(RedirectRule $redirect) { $redirect->delete(); return back()->with('success','Redirect deleted.'); }
    public function fourOhFour() { $logs = PageViewLog::latest('last_seen')->paginate(20); return view('admin.seo.four-oh-four', compact('logs')); }
    public function reports() { $pages = SeoMeta::where('page_type','page')->get(); $posts = BlogPost::with('seo')->get(); return view('admin.seo.reports', compact('pages','posts')); }
    public function integrations() { $settings = $this->settings(); return view('admin.seo.integrations', compact('settings')); }
    public function schema() { return view('admin.seo.schema'); }
    public function storeFaq(Request $request, SeoMeta $seoMeta) { $data = $request->validate(['question'=>'required|string|max:255','answer'=>'required|string']); $data['faqable_type']=SeoMeta::class; $data['faqable_id']=$seoMeta->id; $data['sort_order']=0; FaqItem::create($data); return back()->with('success','FAQ added.'); }

    public function sitemap()
    {
        $urls = BlogPost::where('status','published')->where(function($q){$q->whereNull('published_at')->orWhere('published_at','<=',now());})->get()->map(fn($post)=>['loc'=>route('blog.show',$post),'changefreq'=>'weekly','priority'=>'0.7'])->values()->all();
        array_unshift($urls, ['loc'=>url('/'),'changefreq'=>'weekly','priority'=>'1.0']);
        return response(view('admin.seo.sitemap', compact('urls')), 200)->header('Content-Type','application/xml');
    }

    public function robots()
    {
        $settings = $this->settings();
        return response("User-agent: *\nDisallow: /admin\nSitemap: " . url('/sitemap.xml') . "\n", 200)->header('Content-Type','text/plain');
    }

    private function settings(): SeoSetting
    {
        return SeoSetting::firstOrCreate([], ['site_name'=>config('app.name'),'default_title'=>config('app.name'),'default_description'=>'Professional cleaning services.']);
    }
}
