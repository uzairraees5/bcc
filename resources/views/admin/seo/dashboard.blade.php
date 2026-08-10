@extends('admin.layouts.app')

@section('content')
<div class="row g-4">
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Total Pages</h6>
                <h2>{{ $pages }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Total Blog Posts</h6>
                <h2>{{ $posts }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">SEO Optimized Pages</h6>
                <h2>{{ $optimized }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Redirects</h6>
                <h2>{{ $redirects }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="row g-4 mt-2">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">SEO Health</h5>
                <p class="text-muted">Basic SEO score based on title, description, focus keyword, H1 and canonical availability.</p>
                <div class="progress" style="height: 12px;">
                    <div class="progress-bar bg-success" style="width: 78%"></div>
                </div>
                <p class="mt-2">Score: 78/100</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Quick Issues</h5>
                <ul class="mb-0">
                    <li>Missing descriptions: {{ $missingDescription }}</li>
                    <li>Missing focus keywords: {{ $missingKeyword }}</li>
                    <li>Missing H1: {{ $missingH1 }}</li>
                    <li>404s tracked: {{ $fours }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
