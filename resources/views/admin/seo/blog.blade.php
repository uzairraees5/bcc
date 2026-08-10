@extends('admin.layouts.app')
@section('content')
<div class="card shadow-sm"><div class="card-body"><div class="d-flex justify-content-between"><h4 class="mb-3">Blog SEO</h4></div>
<div class="table-responsive"><table class="table table-striped"><thead><tr><th>Blog</th><th>Category</th><th>Status</th><th>Publish Date</th><th>SEO Score</th><th>SEO Title</th><th>Meta Description</th><th>Focus Keyword</th><th>Slug</th><th>Image</th><th></th></tr></thead><tbody>
@forelse($posts as $post)
@php($seo=$post->seo)
@php($score=collect([$seo?->title,$seo?->meta_description,$seo?->focus_keyword,$seo?->canonical_url,$seo?->h1])->filter(fn($v)=>filled($v))->count()*20)
<tr><td>{{ $post->title }}</td><td>{{ $post->category?->name ?? 'Uncategorized' }}</td><td>{{ $post->status }}</td><td>{{ optional($post->published_at)->format('M d, Y') ?: 'Not set' }}</td><td>{{ $score }}/100</td><td>{{ $seo?->title ?: 'Fallback' }}</td><td>{{ $seo?->meta_description ?: 'Fallback' }}</td><td>{{ $seo?->focus_keyword ?: '—' }}</td><td>{{ $seo?->slug ?: $post->slug }}</td><td>{{ $post->image_path ? 'Yes' : 'No' }}</td><td><a href="{{ route('admin.seo.blog.edit',$post) }}" class="btn btn-sm btn-outline-primary">SEO</a></td></tr>
@empty<tr><td colspan="11" class="text-center">No blog posts found.</td></tr>@endforelse
</tbody></table></div>{{ $posts->links() }}</div></div>
@endsection
