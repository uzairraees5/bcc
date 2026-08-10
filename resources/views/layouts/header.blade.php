<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ trim((string) $__env->yieldContent('title')) !== '' ? $__env->yieldContent('title') : ($seoTitle ?? 'Bright Cleaning') }}</title>
	<meta name="description" content="{{ trim((string) $__env->yieldContent('meta_description')) !== '' ? $__env->yieldContent('meta_description') : ($seoDescription ?? 'Default description') }}">
	<meta name="robots" content="{{ $seoRobots ?? 'index,follow' }}">
	<link rel="canonical" href="{{ $seoCanonical ?? url('/') }}">
	<meta property="og:title" content="{{ $seoOgTitle ?? $seoTitle ?? 'Bright Cleaning' }}">
	<meta property="og:description" content="{{ $seoOgDescription ?? $seoDescription ?? 'Default description' }}">
	<meta property="og:url" content="{{ $seoCanonical ?? url('/') }}">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="{{ $seoOgTitle ?? $seoTitle ?? 'Bright Cleaning' }}">
	<meta name="twitter:description" content="{{ $seoOgDescription ?? $seoDescription ?? 'Default description' }}">
	@if(!empty($seoSchema))
	<script type="application/ld+json">{{ $seoSchema }}</script>
	@endif
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.compat.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	@if(!empty($seoSettings->header_scripts))
		{!! $seoSettings->header_scripts !!}
	@endif
</head>
<body>
<div class="page_wrap">
<header id="masthead" class="header">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg">
						<div class="navbar-brand">
						    <a href="/">
						    	<img class="" src="{{ asset('assets/images/logo.png') }}" align="Logo">
						    </a>
					    </div>
					<div class="main-mmenu">
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					      <span class="navbar-toggler-icon"></span>
					    </button>
					    <div class="collapse navbar-collapse" id="navbarNav">
					      <ul class="navbar-nav">					      	
							<li class="nav-item">
								<a href="/" class="nav-link">Home</a>
							</li>		      	
							<li class="nav-item">
								<a href="/about-us" class="nav-link">About</a>
							</li>				      	
							<li class="nav-item">
								<a href="/commercial-cleaning" class="nav-link">Commercial Cleaning</a>
							</li>				      	
							<li class="nav-item">
								<a href="/services" class="nav-link">Services</a>
							</li>				      	
							<li class="nav-item">
								<a href="/locations" class="nav-link">Locations</a>
							</li>				      	
							<li class="nav-item">
								<a href="/case-studies" class="nav-link">Case Studies</a>
							</li>				      	
							<li class="nav-item">
								<a href="/contact" class="nav-link">Contact Us</a>
							</li>

					      </ul>
					    </div>
					</div>
					<div class="xtra_links">
						<a href="/book-walkthrough" class="btn-custom">
							<span class="txt-before">Request a Free Walkthrough & Proposal</span>
							<span class="icon">								
								<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
								</svg>
							</span>
						</a>
					</div>    
			</nav>
		</div>
	</header>