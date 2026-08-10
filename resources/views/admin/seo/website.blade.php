@extends('admin.layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="mb-4">Website SEO</h4>
        <form method="POST" action="{{ route('admin.seo.website.store') }}">
            @csrf
            <h6 class="border-bottom pb-2">Global SEO</h6>
            <div class="row g-3 mb-4">
                <div class="col-md-6"><label class="form-label">Site Name</label><input type="text" name="site_name" class="form-control" value="{{ old('site_name',$settings->site_name) }}"></div>
                <div class="col-md-6"><label class="form-label">Default SEO Title</label><input type="text" name="default_title" class="form-control" value="{{ old('default_title',$settings->default_title) }}"></div>
                <div class="col-12"><label class="form-label">Default Meta Description</label><textarea name="default_description" class="form-control" rows="3">{{ old('default_description',$settings->default_description) }}</textarea></div>
                <div class="col-md-6"><label class="form-label">Default Robots</label><input type="text" name="default_robots" class="form-control" value="{{ old('default_robots',$settings->default_robots ?: 'index,follow') }}"></div>
                <div class="col-md-6"><label class="form-label">Canonical Base</label><input type="text" name="default_canonical_base" class="form-control" value="{{ old('default_canonical_base',$settings->default_canonical_base) }}"></div>
            </div>

            <h6 class="border-bottom pb-2">Scripts & Tracking</h6>
            <div class="row g-3 mb-4">
                <div class="col-12"><label class="form-label">Header Scripts</label><textarea name="header_scripts" class="form-control font-monospace" rows="4">{{ old('header_scripts',$settings->header_scripts) }}</textarea></div>
                <div class="col-12"><label class="form-label">Body Scripts</label><textarea name="body_scripts" class="form-control font-monospace" rows="4">{{ old('body_scripts',$settings->body_scripts) }}</textarea></div>
                <div class="col-12"><label class="form-label">Footer Scripts</label><textarea name="footer_scripts" class="form-control font-monospace" rows="4">{{ old('footer_scripts',$settings->footer_scripts) }}</textarea></div>
                <div class="col-md-6"><label class="form-label">Google Analytics</label><input type="text" name="google_analytics" class="form-control" value="{{ old('google_analytics',$settings->google_analytics) }}"></div>
                <div class="col-md-6"><label class="form-label">Google Tag Manager</label><input type="text" name="google_tag_manager" class="form-control" value="{{ old('google_tag_manager',$settings->google_tag_manager) }}"></div>
                <div class="col-md-6"><label class="form-label">Meta Pixel</label><input type="text" name="meta_pixel" class="form-control" value="{{ old('meta_pixel',$settings->meta_pixel) }}"></div>
                <div class="col-md-6"><label class="form-label">Microsoft Clarity</label><input type="text" name="microsoft_clarity" class="form-control" value="{{ old('microsoft_clarity',$settings->microsoft_clarity) }}"></div>
            </div>

            <h6 class="border-bottom pb-2">Social SEO</h6>
            <div class="row g-3 mb-4">
                <div class="col-md-6"><label class="form-label">Facebook/OG Title</label><input type="text" name="social_og_title" class="form-control" value="{{ old('social_og_title',$settings->social_og_title) }}"></div>
                <div class="col-md-6"><label class="form-label">OG Image URL</label><input type="text" name="social_og_image" class="form-control" value="{{ old('social_og_image',$settings->social_og_image) }}"></div>
                <div class="col-12"><label class="form-label">OG Description</label><textarea name="social_og_description" class="form-control" rows="3">{{ old('social_og_description',$settings->social_og_description) }}</textarea></div>
                <div class="col-md-4"><label class="form-label">Twitter Card</label><select name="twitter_card" class="form-select"><option value="summary_large_image" @selected(old('twitter_card',$settings->twitter_card)==='summary_large_image')>Summary Large Image</option><option value="summary" @selected(old('twitter_card',$settings->twitter_card)==='summary')>Summary</option></select></div>
                <div class="col-md-4"><label class="form-label">Twitter Title</label><input type="text" name="twitter_title" class="form-control" value="{{ old('twitter_title',$settings->twitter_title) }}"></div>
                <div class="col-md-4"><label class="form-label">Twitter Image</label><input type="text" name="twitter_image" class="form-control" value="{{ old('twitter_image',$settings->twitter_image) }}"></div>
                <div class="col-12"><label class="form-label">Twitter Description</label><textarea name="twitter_description" class="form-control" rows="2">{{ old('twitter_description',$settings->twitter_description) }}</textarea></div>
                <div class="col-md-4"><label class="form-label">LinkedIn Title</label><input type="text" name="linkedin_title" class="form-control" value="{{ old('linkedin_title',$settings->linkedin_title) }}"></div>
                <div class="col-md-4"><label class="form-label">LinkedIn Image</label><input type="text" name="linkedin_image" class="form-control" value="{{ old('linkedin_image',$settings->linkedin_image) }}"></div>
                <div class="col-12"><label class="form-label">LinkedIn Description</label><textarea name="linkedin_description" class="form-control" rows="2">{{ old('linkedin_description',$settings->linkedin_description) }}</textarea></div>
            </div>

            <h6 class="border-bottom pb-2">Google Search Console</h6>
            <div class="row g-3">
                <div class="col-md-6"><label class="form-label">Property / Site URL</label><input type="text" name="search_console_property" class="form-control" value="{{ old('search_console_property',$settings->search_console_property) }}"></div>
                <div class="col-md-6"><label class="form-label">Verification Code</label><input type="text" name="search_console_verification" class="form-control" value="{{ old('search_console_verification',$settings->search_console_verification) }}"></div>
            </div>
            <button class="btn btn-primary mt-4">Save Settings</button>
        </form>
    </div>
</div>
@endsection
