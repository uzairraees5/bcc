@extends('admin.layouts.app')
@section('content')
<div class="card shadow-sm"><div class="card-body">
<h4 class="mb-4">Edit Category</h4>
@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<form method="POST" action="{{ route('admin.blog.categories.update.post',$blogCategory) }}">
@csrf
<div class="row g-3">
<div class="col-md-6"><label class="form-label">Name</label><input name="name" class="form-control" value="{{ old('name',$blogCategory->name) }}" required></div>
<div class="col-md-6"><label class="form-label">Slug</label><input name="slug" class="form-control" value="{{ old('slug',$blogCategory->slug) }}"></div>
<div class="col-12"><label class="form-label">Description</label><textarea name="description" class="form-control" rows="3">{{ old('description',$blogCategory->description) }}</textarea></div>
<div class="col-md-6"><label class="form-label">SEO Title</label><input name="seo_title" class="form-control" value="{{ old('seo_title',$blogCategory->seo_title) }}"></div>
<div class="col-md-6"><label class="form-label">Canonical URL</label><input name="canonical_url" class="form-control" value="{{ old('canonical_url',$blogCategory->canonical_url) }}"></div>
<div class="col-12"><label class="form-label">Meta Description</label><textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description',$blogCategory->meta_description) }}</textarea></div>
<div class="col-md-3 form-check ms-3"><input type="hidden" name="robots_index" value="0"><input type="checkbox" name="robots_index" value="1" class="form-check-input" {{ old('robots_index',$blogCategory->robots_index ?? true) ? 'checked' : '' }}><label class="form-check-label">Index</label></div>
<div class="col-md-3 form-check ms-3"><input type="hidden" name="robots_follow" value="0"><input type="checkbox" name="robots_follow" value="1" class="form-check-input" {{ old('robots_follow',$blogCategory->robots_follow ?? true) ? 'checked' : '' }}><label class="form-check-label">Follow</label></div>
</div>
<button class="btn btn-primary mt-4" type="submit">Update Category</button>
<a href="{{ route('admin.blog.categories') }}" class="btn btn-outline-secondary mt-4">Cancel</a>
</form></div></div>
@endsection
