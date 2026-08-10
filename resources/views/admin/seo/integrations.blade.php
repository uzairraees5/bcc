@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-4">Integrations</h4>
        <form method="POST" action="{{ route('admin.seo.website.store') }}">
            @csrf
            <div class="row g-3">
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
            </div>
            <button class="btn btn-primary mt-4">Save</button>
        </form>
    </div>
</div>
@endsection
