@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-4">Edit Blog Post</h4>

        <form method="POST" action="{{ route('admin.blog.posts.update', $blogPost) }}" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Title</label>
                    <input name="title" class="form-control" value="{{ old('title', $blogPost->title) }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="draft" @selected(old('status', $blogPost->status) === 'draft')>Draft</option>
                        <option value="published" @selected(old('status', $blogPost->status) === 'published')>Published</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <div class="input-group">
                        <select id="category_id" name="category_id" class="form-select">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $blogPost->category_id) == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-outline-primary" id="add-category">+ Add Category</button>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Publish Date</label>
                    <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at', optional($blogPost->published_at)->format('Y-m-d\TH:i')) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Slug</label>
                    <input name="slug" class="form-control" value="{{ old('slug', $blogPost->slug) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Featured Image</label>
                    <input type="file" name="image" class="form-control">
                    @if($blogPost->image_path)
                        <img src="{{ asset('storage/' . $blogPost->image_path) }}" style="max-height:120px" class="mt-2" alt="{{ $blogPost->image_alt_text ?: $blogPost->title }}">
                    @endif
                </div>

                <div class="col-md-6">
                    <label class="form-label">Image Alt Text</label>
                    <input name="image_alt_text" class="form-control" value="{{ old('image_alt_text', $blogPost->image_alt_text) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Image Title</label>
                    <input name="image_title" class="form-control" value="{{ old('image_title', $blogPost->image_title) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Image Caption</label>
                    <input name="image_caption" class="form-control" value="{{ old('image_caption', $blogPost->image_caption) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Image Description</label>
                    <textarea name="image_description" class="form-control" rows="2">{{ old('image_description', $blogPost->image_description) }}</textarea>
                </div>

                <div class="col-12">
                    <label class="form-label">Excerpt</label>
                    <textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $blogPost->excerpt) }}</textarea>
                </div>

                <div class="col-12">
                    <label class="form-label">Content</label>
                    <textarea name="content" id="blog-editor">{{ old('content', $blogPost->content) }}</textarea>
                </div>
            </div>

            <button class="btn btn-primary mt-4">Update Post</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    tinymce.init({
        selector: '#blog-editor',
        height: 550,
        plugins: 'lists link image table autoresize',
        toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright | bullist numlist | blockquote | link image table',
        menubar: false,
        branding: false,
        block_formats: 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4'
    });

    const categoryButton = document.getElementById('add-category');
    const categorySelect = document.getElementById('category_id');

    categoryButton?.addEventListener('click', async function () {
        const name = window.prompt('Category name');
        if (!name || !name.trim()) return;

        try {
            const response = await fetch('{{ route('admin.blog.categories.quick') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ name: name.trim() })
            });

            const payload = await response.json();
            if (!response.ok) {
                throw new Error(payload.message || 'Unable to create category.');
            }

            categorySelect.add(new Option(payload.name, payload.id, true, true));
            categorySelect.value = payload.id;
        } catch (error) {
            window.alert(error.message || 'Unable to create category.');
        }
    });
});
</script>
@endpush
