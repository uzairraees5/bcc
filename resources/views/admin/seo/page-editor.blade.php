@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-4">Edit Page SEO</h4>
        <form method="POST" action="{{ route('admin.seo.pages.update', $seoMeta) }}">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">SEO Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $seoMeta->title) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Focus Keyword</label>
                    <input type="text" name="focus_keyword" class="form-control" value="{{ old('focus_keyword', $seoMeta->focus_keyword) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $seoMeta->meta_description) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $seoMeta->slug) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Canonical URL</label>
                    <input type="text" name="canonical_url" class="form-control" value="{{ old('canonical_url', $seoMeta->canonical_url) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">OG Title</label>
                    <input type="text" name="og_title" class="form-control" value="{{ old('og_title', $seoMeta->og_title) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">OG Image</label>
                    <input type="text" name="og_image" class="form-control" value="{{ old('og_image', $seoMeta->og_image) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">OG Description</label>
                    <textarea name="og_description" class="form-control" rows="2">{{ old('og_description', $seoMeta->og_description) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">H1</label>
                    <input type="text" name="h1" class="form-control" value="{{ old('h1', $seoMeta->h1) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Schema Type</label>
                    <input type="text" name="schema_type" class="form-control" value="{{ old('schema_type', $seoMeta->schema_type) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">SEO Content</label>
                    <textarea name="seo_content" class="form-control" rows="4">{{ old('seo_content', $seoMeta->seo_content) }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Custom Schema JSON-LD</label>
                    <textarea name="custom_schema" class="form-control" rows="6">{{ old('custom_schema', $seoMeta->custom_schema) }}</textarea>
                </div>
            </div>
            <button class="btn btn-primary mt-4">Save</button>
        </form>
    </div>
</div>
@endsection
