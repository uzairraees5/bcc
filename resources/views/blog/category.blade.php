@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ $category->name }}</h1>
    <div class="row g-4">
        @foreach($posts as $post)
            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    @if($post->image_path)
                        <img src="{{ asset('storage/' . $post->image_path) }}" class="card-img-top" alt="{{ $post->image_alt_text ?? $post->title }}">
                    @endif
                    <div class="card-body">
                        <h3 class="h5">{{ $post->title }}</h3>
                        <p class="mb-3">{{ $post->excerpt ?: Str::limit(strip_tags($post->content), 140) }}</p>
                        <a href="{{ route('blog.show', $post) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
