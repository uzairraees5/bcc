<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SEO Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body class="bg-light">
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">SEO Admin</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.website') }}">Website SEO</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.pages') }}">Pages</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.blog') }}">Blog SEO</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.blog.posts') }}">Blog Posts</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.schema') }}">Schema</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.redirects') }}">Redirects</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.four-oh-four') }}">404 Monitor</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.sitemap') }}">Sitemap</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.robots') }}">Robots.txt</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.reports') }}">Reports</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.integrations') }}">Integrations</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
