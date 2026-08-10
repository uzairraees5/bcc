@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-3">Page SEO</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Page</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                <tr>
                    <td>{{ $page->seoable_type ?? 'Page' }}</td>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td>
                    <td><a href="{{ route('admin.seo.pages.edit', $page) }}" class="btn btn-sm btn-outline-primary">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
