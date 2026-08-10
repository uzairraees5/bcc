@extends('admin.layouts.app')
@section('content')
<div class="card shadow-sm"><div class="card-body"><h4>Blog SEO: {{ $blogPost->title }}</h4><p class="text-muted">Blog content and SEO permissions remain separate.</p>
<form method="POST" action="{{ route('admin.seo.blog.update',$blogPost) }}">@csrf @method('PUT')
<div class="row g-3">
<div class="col-md-6"><label class="form-label">SEO Title</label><input name="title" class="form-control" value="{{ old('title',$seoMeta->title) }}"></div>
<div class="col-md-6"><label class="form-label">Focus Keyword</label><input name="focus_keyword" class="form-control" value="{{ old('focus_keyword',$seoMeta->focus_keyword) }}"></div>
<div class="col-12"><label class="form-label">Meta Description</label><textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description',$seoMeta->meta_description) }}</textarea></div>
<div class="col-md-6"><label class="form-label">URL Slug</label><input name="slug" required class="form-control" value="{{ old('slug',$seoMeta->slug ?: $blogPost->slug) }}"></div>
<div class="col-md-6"><label class="form-label">Canonical URL</label><input name="canonical_url" class="form-control" value="{{ old('canonical_url',$seoMeta->canonical_url) }}"></div>
<div class="col-md-3 form-check ms-3 mt-4"><input type="checkbox" name="robots_index" value="1" class="form-check-input" {{ old('robots_index',$seoMeta->robots_index ?? true) ? 'checked':'' }}><label class="form-check-label">Index</label></div>
<div class="col-md-3 form-check ms-3 mt-4"><input type="checkbox" name="robots_follow" value="1" class="form-check-input" {{ old('robots_follow',$seoMeta->robots_follow ?? true) ? 'checked':'' }}><label class="form-check-label">Follow</label></div>
<div class="col-md-6"><label class="form-label">Open Graph Image</label><input name="og_image" class="form-control" value="{{ old('og_image',$seoMeta->og_image ?: ($blogPost->image_path ? asset('storage/'.$blogPost->image_path) : '')) }}"></div>
<div class="col-md-6"><label class="form-label">Open Graph Title</label><input name="og_title" class="form-control" value="{{ old('og_title',$seoMeta->og_title) }}"></div>
<div class="col-12"><label class="form-label">Open Graph Description</label><textarea name="og_description" class="form-control" rows="2">{{ old('og_description',$seoMeta->og_description) }}</textarea></div>
<div class="col-md-6"><label class="form-label">Image Alt Text</label><input name="image_alt_text" class="form-control" value="{{ old('image_alt_text',$blogPost->image_alt_text) }}"></div>
<div class="col-md-6"><label class="form-label">H1 Heading</label><input name="h1" class="form-control" value="{{ old('h1',$seoMeta->h1 ?: $blogPost->title) }}"></div>
<div class="col-12"><label class="form-label">SEO Content</label><textarea name="seo_content" class="form-control" rows="5">{{ old('seo_content',$seoMeta->seo_content) }}</textarea></div>
<div class="col-12"><label class="form-label">Article Schema / Custom JSON-LD</label><textarea name="custom_schema" class="form-control" rows="7">{{ old('custom_schema',$seoMeta->custom_schema) }}</textarea></div>
</div><button class="btn btn-primary mt-4">Save Blog SEO</button></form></div></div>
@endsection
