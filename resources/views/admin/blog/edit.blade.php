@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-4">Edit Blog Post</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.blog.posts.update', $blogPost) }}" enctype="multipart/form-data" id="blog-edit-form">
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
                    <div id="blog-editor" style="min-height: 500px; background:#fff;">{!! old('content', $blogPost->content) !!}</div>
                    <textarea name="content" id="blog-content" class="d-none">{{ old('content', $blogPost->content) }}</textarea>
                    <div class="form-text">Free Quill editor. Supports headings, bold, italic, underline, links, lists, blockquotes and code formatting.</div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Update Post</button>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
<style>
    #blog-editor.ql-container {
        min-height: 500px;
        border-radius: 0 0 .375rem .375rem;
    }
    #blog-editor .ql-editor {
        min-height: 500px;
        font-size: 16px;
        line-height: 1.7;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editorElement = document.getElementById('blog-editor');
    const contentField = document.getElementById('blog-content');
    const form = document.getElementById('blog-edit-form');

    const quill = new Quill(editorElement, {
        theme: 'snow',
        placeholder: 'Write your blog content here...',
        modules: {
            toolbar: [
                [{ header: [2, 3, 4, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                [{ align: [] }],
                ['blockquote', 'code-block'],
                ['link'],
                ['clean']
            ]
        }
    });

    function syncEditor() {
        contentField.value = quill.root.innerHTML;
    }

    quill.on('text-change', syncEditor);
    form.addEventListener('submit', syncEditor);
    syncEditor();

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
