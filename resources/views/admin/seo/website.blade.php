@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-4">Website SEO</h4>
        <form method="POST" action="{{ route('admin.seo.website.store') }}">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Site Name</label>
                    <input type="text" name="site_name" class="form-control" value="{{ old('site_name', $settings->site_name) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Default Title</label>
                    <input type="text" name="default_title" class="form-control" value="{{ old('default_title', $settings->default_title) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Default Description</label>
                    <textarea name="default_description" class="form-control" rows="3">{{ old('default_description', $settings->default_description) }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Header Scripts</label>
                    <textarea name="header_scripts" class="form-control" rows="3">{{ old('header_scripts', $settings->header_scripts) }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Body Scripts</label>
                    <textarea name="body_scripts" class="form-control" rows="3">{{ old('body_scripts', $settings->body_scripts) }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Footer Scripts</label>
                    <textarea name="footer_scripts" class="form-control" rows="3">{{ old('footer_scripts', $settings->footer_scripts) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Google Analytics</label>
                    <input type="text" name="google_analytics" class="form-control" value="{{ old('google_analytics', $settings->google_analytics) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Google Tag Manager</label>
                    <input type="text" name="google_tag_manager" class="form-control" value="{{ old('google_tag_manager', $settings->google_tag_manager) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Meta Pixel</label>
                    <input type="text" name="meta_pixel" class="form-control" value="{{ old('meta_pixel', $settings->meta_pixel) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Microsoft Clarity</label>
                    <input type="text" name="microsoft_clarity" class="form-control" value="{{ old('microsoft_clarity', $settings->microsoft_clarity) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Default Robots</label>
                    <input type="text" name="default_robots" class="form-control" value="{{ old('default_robots', $settings->default_robots) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Canonical Base</label>
                    <input type="text" name="default_canonical_base" class="form-control" value="{{ old('default_canonical_base', $settings->default_canonical_base) }}">
                </div>
            </div>
            <button class="btn btn-primary mt-4">Save Settings</button>
        </form>
    </div>
</div>
@endsection
