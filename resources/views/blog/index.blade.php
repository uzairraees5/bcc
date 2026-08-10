@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Blog</h1>
    <div class="row g-4">
        @foreach($posts as $post)
            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    @if($post->image_path)
                        <img src="{{ asset('storage/' . $post->image_path) }}" class="card-img-top" alt="{{ $post->image_alt_text ?? $post->title }}">
                    @endif
                    <div class="card-body">
                        <div class="text-muted small mb-2">
                            {{ $post->category?->name ?? 'Uncategorized' }} · {{ $post->published_at?->format('M d, Y') }}
                        </div>
                        <h3 class="h5">{{ $post->title }}</h3>
                        <p class="mb-3">{{ $post->excerpt ?: Str::limit(strip_tags($post->content), 140) }}</p>
                        <a href="{{ route('blog.show', $post) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection
