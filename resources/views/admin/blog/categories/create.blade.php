@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-4">Create Category</h4>
        <form method="POST" action="{{ route('admin.blog.categories.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">SEO Title</label>
                <input type="text" name="seo_title" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="3"></textarea>
            </div>
            <button class="btn btn-primary">Save Category</button>
        </form>
    </div>
</div>
@endsection
