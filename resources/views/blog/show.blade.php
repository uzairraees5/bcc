@extends('layouts.app')

@section('content')
<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $blogPost->title }}</li>
        </ol>
    </nav>

    <article>
        <h1 class="mb-3">{{ $blogPost->title }}</h1>
        <div class="text-muted mb-4">
            {{ $blogPost->category?->name ?? 'Uncategorized' }} · {{ $blogPost->published_at?->format('M d, Y') }}
        </div>
        @if($blogPost->image_path)
            <img src="{{ asset('storage/' . $blogPost->image_path) }}" class="img-fluid mb-4" alt="{{ $blogPost->image_alt_text ?? $blogPost->title }}">
        @endif
        <div class="content">
            {!! $blogPost->content !!}
        </div>
    </article>
</div>
@endsection
