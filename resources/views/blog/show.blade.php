@extends('layouts.app')
@section('content')
<div class="container py-5"><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>@if($blogPost->category)<li class="breadcrumb-item"><a href="{{ route('blog.category',$blogPost->category) }}">{{ $blogPost->category->name }}</a></li>@endif<li class="breadcrumb-item active">{{ $blogPost->title }}</li></ol></nav>
<article><h1 class="mb-3">{{ $blogPost->seo?->h1 ?: $blogPost->title }}</h1><div class="text-muted mb-4">{{ $blogPost->category?->name ?? 'Uncategorized' }} · {{ optional($blogPost->published_at)->format('M d, Y') }} @if($blogPost->author) · {{ $blogPost->author->name }} @endif</div>
@if($blogPost->image_path)<img src="{{ asset('storage/'.$blogPost->image_path) }}" class="img-fluid mb-4" alt="{{ $blogPost->image_alt_text ?: $blogPost->title }}">@endif
<div class="content">{!! $blogPost->content !!}</div>
@if($blogPost->seo?->seo_content)<section class="mt-5">{!! $blogPost->seo->seo_content !!}</section>@endif
@if($blogPost->seo?->faqs?->count())<section class="mt-5"><h2>Frequently Asked Questions</h2>@foreach($blogPost->seo->faqs as $faq)<div class="mb-4"><h3>{{ $faq->question }}</h3><div>{!! $faq->answer !!}</div></div>@endforeach</section>@endif
</article></div>
@endsection
