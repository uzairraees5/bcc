@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-1">robots.txt</h4>
        <p class="text-muted">Edit the robots.txt served at <code>/robots.txt</code>. Keep your sitemap URL included.</p>
        <form method="POST" action="{{ route('admin.seo.robots.store') }}">
            @csrf
            <textarea name="robots_txt" class="form-control font-monospace" rows="16" required>{{ old('robots_txt', $settings->robots_txt ?: "User-agent: *\nDisallow: /admin\nSitemap: ".url('/sitemap.xml')."\n") }}</textarea>
            <button class="btn btn-primary mt-3">Save robots.txt</button>
        </form>
    </div>
</div>
@endsection
