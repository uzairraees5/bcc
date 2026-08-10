<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- SEO is supplied by SeoMetadataMiddleware and must win over hard-coded page titles. --}}
    <title>{{ $seoTitle ?? (trim((string) $__env->yieldContent('title')) !== '' ? $__env->yieldContent('title') : 'Bright Cleaning') }}</title>
    <meta name="description" content="{{ $seoDescription ?? (trim((string) $__env->yieldContent('meta_description')) !== '' ? $__env->yieldContent('meta_description') : 'Professional cleaning services.') }}">
    <meta name="robots" content="{{ $seoRobots ?? 'index,follow' }}">
    <link rel="canonical" href="{{ $seoCanonical ?? url('/') }}">

    <meta property="og:title" content="{{ $seoOgTitle ?? $seoTitle ?? 'Bright Cleaning' }}">
    <meta property="og:description" content="{{ $seoOgDescription ?? $seoDescription ?? 'Professional cleaning services.' }}">
    <meta property="og:url" content="{{ $seoCanonical ?? url('/') }}">
    <meta property="og:type" content="{{ request()->routeIs('blog.show') ? 'article' : 'website' }}">
    @if(!empty($seoOgImage))<meta property="og:image" content="{{ $seoOgImage }}">@endif

    <meta name="twitter:card" content="{{ $seoTwitterCard ?? 'summary_large_image' }}">
    <meta name="twitter:title" content="{{ $seoTwitterTitle ?? $seoOgTitle ?? $seoTitle ?? 'Bright Cleaning' }}">
    <meta name="twitter:description" content="{{ $seoTwitterDescription ?? $seoOgDescription ?? $seoDescription ?? 'Professional cleaning services.' }}">
    @if(!empty($seoTwitterImage))<meta name="twitter:image" content="{{ $seoTwitterImage }}">@endif

    @if(!empty($seoLinkedinTitle))<meta property="linkedin:title" content="{{ $seoLinkedinTitle }}">@endif
    @if(!empty($seoLinkedinDescription))<meta property="linkedin:description" content="{{ $seoLinkedinDescription }}">@endif
    @if(!empty($seoLinkedinImage))<meta property="linkedin:image" content="{{ $seoLinkedinImage }}">@endif

    @if(!empty($seoSettings?->search_console_verification))
        <meta name="google-site-verification" content="{{ $seoSettings->search_console_verification }}">
    @endif

    @if(!empty($seoSchema))<script type="application/ld+json">{!! $seoSchema !!}</script>@endif

    {!! $seoSettings->header_scripts ?? '' !!}

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</head>
<body>
{!! $seoSettings->body_scripts ?? '' !!}
<div class="page_wrap">
    <header id="masthead" class="header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg">
                <div class="navbar-brand"><a href="/"><img src="{{ asset('assets/images/logo.png') }}" alt="Logo"></a></div>
                <div class="main-mmenu">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                            <li class="nav-item"><a href="/about-us" class="nav-link">About</a></li>
                            <li class="nav-item"><a href="/commercial-cleaning" class="nav-link">Commercial Cleaning</a></li>
                            <li class="nav-item"><a href="/services" class="nav-link">Services</a></li>
                            <li class="nav-item"><a href="/locations" class="nav-link">Locations</a></li>
                            <li class="nav-item"><a href="/case-studies" class="nav-link">Case Studies</a></li>
                            <li class="nav-item"><a href="/contact" class="nav-link">Contact Us</a></li>
                            <li class="nav-item"><a href="/blog" class="nav-link">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="xtra_links"><a href="/book-walkthrough" class="btn-custom"><span class="txt-before">Request a Free Walkthrough &amp; Proposal</span></a></div>
            </nav>
        </div>
    </header>
