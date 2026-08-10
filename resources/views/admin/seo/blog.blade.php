@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-3">Blog SEO</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Post</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->seoable_type ?? 'Blog Post' }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td><a href="{{ route('admin.seo.pages.edit', $post) }}" class="btn btn-sm btn-outline-primary">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
