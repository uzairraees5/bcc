@extends('admin.layouts.app')

@section('title', 'Page SEO')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-1">Page SEO</h4>
                <p class="text-muted mb-0">Every website page has one database SEO record. Edit the record and the frontend metadata updates automatically.</p>
            </div>
            <a href="{{ route('admin.seo.website') }}" class="btn btn-outline-secondary">Website Defaults</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>Page</th>
                        <th>SEO Title</th>
                        <th>Meta Description</th>
                        <th>Focus Keyword</th>
                        <th>Slug</th>
                        <th>Robots</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @forelse($pages as $page)
                    <tr>
                        <td>
                            <strong>{{ $page->page_title ?: $page->slug }}</strong>
                            <div class="small text-muted">{{ $page->slug }}</div>
                        </td>
                        <td>{{ $page->title ?: 'Fallback from page title' }}</td>
                        <td>{{ $page->meta_description ?: 'Fallback from website/page data' }}</td>
                        <td>{{ $page->focus_keyword ?: '—' }}</td>
                        <td><code>{{ $page->slug }}</code></td>
                        <td>{{ ($page->robots_index ?? true) ? 'index' : 'noindex' }}, {{ ($page->robots_follow ?? true) ? 'follow' : 'nofollow' }}</td>
                        <td><a href="{{ route('admin.seo.pages.edit', $page) }}" class="btn btn-sm btn-primary">Edit SEO</a></td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center py-4">No pages configured.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
