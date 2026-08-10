@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-3">SEO Reports</h4>
        <h5>Pages</h5>
        <ul>
            @foreach($pages as $page)
                <li>{{ $page->title ?? 'Untitled' }} - Missing title: {{ empty($page->title) ? 'yes' : 'no' }} | Missing description: {{ empty($page->meta_description) ? 'yes' : 'no' }} | Missing H1: {{ empty($page->h1) ? 'yes' : 'no' }}</li>
            @endforeach
        </ul>
        <h5 class="mt-4">Posts</h5>
        <ul>
            @foreach($posts as $post)
                <li>{{ $post->title ?? 'Untitled' }} - Missing title: {{ empty($post->title) ? 'yes' : 'no' }} | Missing description: {{ empty($post->meta_description) ? 'yes' : 'no' }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
