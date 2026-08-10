<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Bright Cleaning Admin')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <style>
        :root {
            --admin-bg: #f4f7fb;
            --admin-card: #ffffff;
            --admin-border: #e6ebf2;
            --admin-text: #172033;
            --admin-muted: #718096;
            --admin-primary: #2563eb;
            --admin-primary-dark: #1d4ed8;
            --admin-sidebar: #111827;
            --admin-sidebar-hover: #1f2937;
        }

        * { box-sizing: border-box; }
        body.admin-body { background: var(--admin-bg); color: var(--admin-text); }
        .admin-shell { min-height: 100vh; }
        .admin-sidebar {
            position: sticky;
            top: 20px;
            max-height: calc(100vh - 40px);
            overflow-y: auto;
            background: var(--admin-sidebar);
            border-radius: 18px;
            box-shadow: 0 12px 35px rgba(15, 23, 42, .12);
        }
        .admin-sidebar .card-body { padding: 22px 16px; }
        .admin-brand {
            color: #fff;
            font-size: 20px;
            font-weight: 750;
            letter-spacing: -.02em;
            padding: 0 12px 18px;
            margin-bottom: 8px;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }
        .admin-sidebar .nav-link {
            color: #cbd5e1;
            border-radius: 10px;
            padding: 10px 12px;
            margin: 2px 0;
            font-size: 14px;
            font-weight: 550;
            transition: .18s ease;
        }
        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link:focus {
            color: #fff;
            background: var(--admin-sidebar-hover);
            transform: translateX(2px);
        }
        .admin-sidebar .section-label {
            color: #64748b;
            text-transform: uppercase;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .12em;
            padding: 18px 12px 6px;
        }
        .admin-content { min-width: 0; }
        .admin-content > .alert { border-radius: 12px; border: 0; box-shadow: 0 4px 15px rgba(15,23,42,.05); }
        .admin-content .card {
            border: 1px solid var(--admin-border);
            border-radius: 16px;
            background: var(--admin-card);
            box-shadow: 0 8px 28px rgba(15,23,42,.045) !important;
        }
        .admin-content .card-body { padding: 22px; }
        .admin-content h1, .admin-content h2, .admin-content h3, .admin-content h4, .admin-content h5 { color: var(--admin-text); font-weight: 700; }
        .admin-content .text-muted { color: var(--admin-muted) !important; }
        .admin-content .form-label { font-size: 13px; font-weight: 650; color: #334155; margin-bottom: 7px; }
        .admin-content .form-control,
        .admin-content .form-select {
            min-height: 44px;
            border-color: #dce3ec;
            border-radius: 10px;
            color: #1e293b;
            background-color: #fff;
            box-shadow: none;
        }
        .admin-content textarea.form-control { min-height: 110px; }
        .admin-content .form-control:focus,
        .admin-content .form-select:focus {
            border-color: #93c5fd;
            box-shadow: 0 0 0 3px rgba(37,99,235,.1);
        }
        .admin-content .btn { border-radius: 9px; font-weight: 650; padding: 9px 15px; }
        .admin-content .btn-primary { background: var(--admin-primary); border-color: var(--admin-primary); }
        .admin-content .btn-primary:hover { background: var(--admin-primary-dark); border-color: var(--admin-primary-dark); }
        .admin-content .table { margin-bottom: 0; }
        .admin-content .table thead th {
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .06em;
            font-weight: 800;
            border-bottom: 1px solid var(--admin-border);
            white-space: nowrap;
        }
        .admin-content .table td { border-color: #edf1f5; vertical-align: middle; }
        .admin-content .table tbody tr:hover { background: #fafcff; }
        .admin-stat {
            border: 1px solid var(--admin-border);
            border-radius: 16px;
            background: #fff;
            padding: 20px;
            height: 100%;
        }
        .admin-stat .stat-label { color: var(--admin-muted); font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: .05em; }
        .admin-stat .stat-value { font-size: 32px; line-height: 1.1; font-weight: 800; margin: 8px 0; color: var(--admin-text); }
        .admin-page-header { margin-bottom: 22px; }
        .admin-page-header p { color: var(--admin-muted); margin: 0; }
        .admin-content .list-group-item { border-color: #edf1f5; }
        .admin-content code { color: #475569; background: #f1f5f9; padding: 3px 6px; border-radius: 5px; }
        .tox-tinymce { border-radius: 10px !important; border-color: #dce3ec !important; }
        .tox .tox-edit-area::before { border: 0 !important; }

        @media (max-width: 991.98px) {
            .admin-sidebar { position: static; max-height: none; margin-bottom: 18px; }
            .admin-sidebar .card-body { padding: 16px; }
            .admin-sidebar .nav { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 3px; }
            .admin-sidebar .section-label { grid-column: 1 / -1; }
        }
        @media (max-width: 575.98px) {
            .admin-shell { padding-top: 12px !important; }
            .admin-sidebar .nav { display: block; }
            .admin-content .card-body { padding: 16px; }
            .admin-page-header { display: block !important; }
            .admin-page-header .btn { margin-top: 12px; }
            .admin-content .table { font-size: 13px; }
        }
    </style>
    @stack('styles')
</head>
<body class="admin-body">
<div class="container-fluid py-4 admin-shell">
    <div class="row g-4">
        <div class="col-xl-2 col-lg-3">
            <aside class="admin-sidebar card border-0">
                <div class="card-body">
                    <div class="admin-brand">Bright Cleaning Admin</div>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.blog.posts') }}">Blog Posts</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.blog.categories') }}">Blog Categories</a></li>

                        @if(auth()->check() && auth()->user()->isSeoAdmin())
                            <li class="nav-item section-label">SEO Management</li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.website') }}">Website SEO</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.pages') }}">Page SEO</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.blog') }}">Blog SEO</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.schema') }}">Schema</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.redirects') }}">Redirects</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.four-oh-four') }}">404 Monitor</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.sitemap') }}">Sitemap</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.robots') }}">Robots.txt</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.reports') }}">SEO Reports</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.seo.integrations') }}">SEO Integrations</a></li>
                        @endif

                        <li class="nav-item mt-2"><a class="nav-link" href="{{ route('admin.logout') }}">Logout</a></li>
                    </ul>
                </div>
            </aside>
        </div>

        <div class="col-xl-10 col-lg-9 admin-content">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</div>
@stack('scripts')
</body>
</html>
