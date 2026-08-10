@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-4">Edit Category</h4>
        <form method="POST" action="{{ route('admin.blog.categories.update', $blogCategory) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $blogCategory->name) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ old('slug', $blogCategory->slug) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $blogCategory->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">SEO Title</label>
                <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title', $blogCategory->seo_title) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $blogCategory->meta_description) }}</textarea>
            </div>
            <button class="btn btn-primary">Update Category</button>
        </form>
    </div>
</div>
@endsection
