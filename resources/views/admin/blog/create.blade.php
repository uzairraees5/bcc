@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-4">Create Blog Post</h4>
        <form method="POST" action="{{ route('admin.blog.posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <div class="mt-2">
                        <small class="text-muted">Or create a new category from the categories page.</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Publish Date</label>
                    <input type="datetime-local" name="published_at" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Featured Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-12">
                    <label class="form-label">Image Alt Text</label>
                    <input type="text" name="image_alt_text" class="form-control">
                </div>
                <div class="col-12">
                    <label class="form-label">Excerpt</label>
                    <textarea name="excerpt" class="form-control" rows="2"></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Content</label>
                    <textarea name="content" class="form-control" rows="12" id="blog-editor"></textarea>
                </div>
            </div>
            <button class="btn btn-primary mt-4">Save Post</button>
        </form>
    </div>
</div>
@endsection
