@extends('admin.layouts.app')

@section('title', 'SEO Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="mb-1">SEO Dashboard</h3>
        <p class="text-muted mb-0">Live SEO data from your database. Changes made in Page SEO or Blog SEO are used automatically on the frontend.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.seo.pages') }}" class="btn btn-outline-primary">Manage Pages</a>
        <a href="{{ route('admin.seo.blog') }}" class="btn btn-primary">Manage Blog SEO</a>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-3"><div class="card shadow-sm h-100"><div class="card-body"><div class="text-muted">Pages</div><h2 class="mb-2">{{ $pages }}</h2><a href="{{ route('admin.seo.pages') }}">Edit Page SEO</a></div></div></div>
    <div class="col-md-3"><div class="card shadow-sm h-100"><div class="card-body"><div class="text-muted">Blog Posts</div><h2 class="mb-2">{{ $posts }}</h2><a href="{{ route('admin.seo.blog') }}">Edit Blog SEO</a></div></div></div>
    <div class="col-md-3"><div class="card shadow-sm h-100"><div class="card-body"><div class="text-muted">SEO Optimized Records</div><h2 class="mb-2">{{ $optimized }}</h2><span class="text-muted">Title + description + keyword</span></div></div></div>
    <div class="col-md-3"><div class="card shadow-sm h-100"><div class="card-body"><div class="text-muted">Redirects</div><h2 class="mb-2">{{ $redirects }}</h2><a href="{{ route('admin.seo.redirects') }}">Manage Redirects</a></div></div></div>
</div>

<div class="row g-4 mt-1">
    <div class="col-lg-5">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5>SEO Health</h5>
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex justify-content-between px-0"><span>Missing meta descriptions</span><strong>{{ $missingDescription }}</strong></div>
                    <div class="list-group-item d-flex justify-content-between px-0"><span>Missing focus keywords</span><strong>{{ $missingKeyword }}</strong></div>
                    <div class="list-group-item d-flex justify-content-between px-0"><span>Missing H1</span><strong>{{ $missingH1 }}</strong></div>
                    <div class="list-group-item d-flex justify-content-between px-0"><span>404s tracked</span><strong>{{ $fours }}</strong></div>
                </div>
                <a class="btn btn-sm btn-outline-primary mt-3" href="{{ route('admin.seo.reports') }}">Open SEO Reports</a>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="mb-0">Recent Blog Posts</h5>
                    <a href="{{ route('admin.blog.posts') }}">View all</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm align-middle mb-0">
                        <thead><tr><th>Blog</th><th>Category</th><th>Status</th><th>SEO</th></tr></thead>
                        <tbody>
                        @forelse($recentPosts as $post)
                            @php($seo = $post->seo)
                            @php($score = collect([$seo?->title, $seo?->meta_description, $seo?->focus_keyword, $seo?->canonical_url, $seo?->h1])->filter(fn ($v) => filled($v))->count() * 20)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category?->name ?? 'Uncategorized' }}</td>
                                <td>{{ ucfirst($post->status) }}</td>
                                <td><a href="{{ route('admin.seo.blog.edit', $post) }}">{{ $score }}/100</a></td>
                            </tr>
                        @empty
                            <tr><td colspan="4">No blog posts found.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mt-1">
    <div class="col-md-4"><a class="text-decoration-none" href="{{ route('admin.seo.website') }}"><div class="card shadow-sm h-100"><div class="card-body"><h5>Website SEO</h5><p class="text-muted mb-0">Global title, description, scripts, analytics, social metadata and verification.</p></div></div></a></div>
    <div class="col-md-4"><a class="text-decoration-none" href="{{ route('admin.seo.schema') }}"><div class="card shadow-sm h-100"><div class="card-body"><h5>Schema</h5><p class="text-muted mb-0">Organization, Website, WebPage, Local Business, Service, Product, FAQ, Breadcrumb and custom JSON-LD.</p></div></div></a></div>
    <div class="col-md-4"><a class="text-decoration-none" href="{{ route('admin.seo.integrations') }}"><div class="card shadow-sm h-100"><div class="card-body"><h5>SEO Integrations</h5><p class="text-muted mb-0">Search Console, Analytics and tracking configuration.</p></div></div></a></div>
</div>
@endsection
