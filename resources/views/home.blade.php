@extends('layouts.app')
@section('title', old('title', $seoMeta->title ?? 'Home - BCC'))
@section('meta_description', $seoMeta->meta_description ?? '')
@section('content')
	<section class="secBanner">
		<div class="banner_slider">
			<div class="item">
				<img src="{{ asset('assets/images/banner1.jpg') }}">
			</div>
			<div class="item">
				<img src="{{ asset('assets/images/banner2.jpg') }}">
			</div>
			<div class="item">
				<img src="{{ asset('assets/images/banner3.jpg') }}">
			</div>
		</div>
		<div class="container-fluid">
			<div class="bright-txt">
				<img src="{{ asset('assets/images/bright-txt.png') }}">
			</div>
			<div class="row">
				<div class="col-12 col-md-7">
					<div class="bn_txt">
						<h1 class="ft-urban clr-white">
							<span class="txt">COMMERCIAL CLEANING<br>BUILT AROUD YOUR BUSINESS</span>
						</h1>
						<p class="clr-white">Reliable janitorial, office, warehouse, and post-construction cleaning <br> solutions for businesses that demand spotless results.</p>
						<div class="xtra_links">
							<a href="javascript:;" class="btn-custom">
								<span class="txt-before">Get a Quote</span>
								<span class="icon">
																	
									<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
									</svg>
								
								</span>
							</a>
							<a href="javascript:;" class="btn-custom btn-white">
								<span class="txt-before">Request a Free Walkthrough & Proposal</span>
								<span class="icon">
																	
									<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
									</svg>
								
								</span>
							</a>
						</div>    
					</div>
				</div>
				<div class="col-12 col-md-5">
					<div class="thumb_slider">
						<div class="item">
							<img src="{{ asset('assets/images/thumb_1.png') }}">
						</div>
						<div class="item">
							<img src="{{ asset('assets/images/thumb_2.png') }}">
						</div>
						<div class="item">
							<img src="{{ asset('assets/images/thumb_3.png') }}">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="secServices">
		<div class="container-fluid">
			<div class="txt_head">
				<h4 class="clr-blue">OUR SERVICES</h4>
				<h2 class="ft-urban">Explore Our Services</h2>
			</div>
			<div class="serv_slider">
				<div class="item">
					<div class="srvBox">
						<div class="thumb">
							<img src="{{ asset('assets/images/srv_12.png') }}">
						</div>
						<div class="ctn">
							<h4> School & Facility Cleaning</h4>
							<p>Reliable school cleaning solutions focused on creating cleaner, healthier learning environments for students.</p>
							<a href="javascript:;" class="btn-srv">
								<span class="icon">								
									<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="srvBox">
						<div class="thumb">
							<img src="{{ asset('assets/images/srv_12.png') }}">
						</div>
						<div class="ctn">
							<h4> School & Facility Cleaning</h4>
							<p>Reliable school cleaning solutions focused on creating cleaner, healthier learning environments for students.</p>
							<a href="javascript:;" class="btn-srv">
								<span class="icon">								
									<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="srvBox">
						<div class="thumb">
							<img src="{{ asset('assets/images/srv_12.png') }}">
						</div>
						<div class="ctn">
							<h4> School & Facility Cleaning</h4>
							<p>Reliable school cleaning solutions focused on creating cleaner, healthier learning environments for students.</p>
							<a href="javascript:;" class="btn-srv">
								<span class="icon">								
									<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="srvBox">
						<div class="thumb">
							<img src="{{ asset('assets/images/srv_12.png') }}">
						</div>
						<div class="ctn">
							<h4> School & Facility Cleaning</h4>
							<p>Reliable school cleaning solutions focused on creating cleaner, healthier learning environments for students.</p>
							<a href="javascript:;" class="btn-srv">
								<span class="icon">								
									<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="srvBox">
						<div class="thumb">
							<img src="{{ asset('assets/images/srv_12.png') }}">
						</div>
						<div class="ctn">
							<h4> School & Facility Cleaning</h4>
							<p>Reliable school cleaning solutions focused on creating cleaner, healthier learning environments for students.</p>
							<a href="javascript:;" class="btn-srv">
								<span class="icon">								
									<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="srvBox">
						<div class="thumb">
							<img src="{{ asset('assets/images/srv_12.png') }}">
						</div>
						<div class="ctn">
							<h4> School & Facility Cleaning</h4>
							<p>Reliable school cleaning solutions focused on creating cleaner, healthier learning environments for students.</p>
							<a href="javascript:;" class="btn-srv">
								<span class="icon">								
									<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="srvBox">
						<div class="thumb">
							<img src="{{ asset('assets/images/srv_12.png') }}">
						</div>
						<div class="ctn">
							<h4> School & Facility Cleaning</h4>
							<p>Reliable school cleaning solutions focused on creating cleaner, healthier learning environments for students.</p>
							<a href="javascript:;" class="btn-srv">
								<span class="icon">								
									<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="srvBox">
						<div class="thumb">
							<img src="{{ asset('assets/images/srv_12.png') }}">
						</div>
						<div class="ctn">
							<h4> School & Facility Cleaning</h4>
							<p>Reliable school cleaning solutions focused on creating cleaner, healthier learning environments for students.</p>
							<a href="javascript:;" class="btn-srv">
								<span class="icon">								
									<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="srvBox">
						<div class="thumb">
							<img src="{{ asset('assets/images/srv_12.png') }}">
						</div>
						<div class="ctn">
							<h4> School & Facility Cleaning</h4>
							<p>Reliable school cleaning solutions focused on creating cleaner, healthier learning environments for students.</p>
							<a href="javascript:;" class="btn-srv">
								<span class="icon">								
									<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="srvBox">
						<div class="thumb">
							<img src="{{ asset('assets/images/srv_12.png') }}">
						</div>
						<div class="ctn">
							<h4> School & Facility Cleaning</h4>
							<p>Reliable school cleaning solutions focused on creating cleaner, healthier learning environments for students.</p>
							<a href="javascript:;" class="btn-srv">
								<span class="icon">								
									<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="srvBox">
						<div class="thumb">
							<img src="{{ asset('assets/images/srv_12.png') }}">
						</div>
						<div class="ctn">
							<h4> School & Facility Cleaning</h4>
							<p>Reliable school cleaning solutions focused on creating cleaner, healthier learning environments for students.</p>
							<a href="javascript:;" class="btn-srv">
								<span class="icon">								
									<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="srvBox">
						<div class="thumb">
							<img src="{{ asset('assets/images/srv_12.png') }}">
						</div>
						<div class="ctn">
							<h4> School & Facility Cleaning</h4>
							<p>Reliable school cleaning solutions focused on creating cleaner, healthier learning environments for students.</p>
							<a href="javascript:;" class="btn-srv">
								<span class="icon">								
									<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="text-center mt-60">
				<a href="javascript:;" class="btn-custom">
					<span class="txt-before">View all Services</span>
					<span class="icon">								
						<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
						</svg>
					</span>
				</a>
			</div>
		</div>
	</section>

	<section class="secAbout">
		<div class="container-fluid">
			<div class="row align-center">
				<div class="col-12 col-md-6">
					<div class="txt_head">
						<h4 class="clr-blue">ABOUT US</h4>
						<h2 class="ft-urban">Reliable Cleaning For Professional Spaces.</h2>
						<p>BCC Solutions LLC delivers dependable commercial cleaning services for offices, warehouses, retail stores, medical facilities, and industrial spaces throughout South Texas. Our team focuses on consistency, professionalism, and long-term client satisfaction.</p>
						<a href="javascript:;" class="btn-custom">
							<span class="txt-before">Learn More</span>
							<span class="icon">								
								<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
								</svg>
							</span>
						</a>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="abt_thumb">
						<img src="{{ asset('assets/images/abt_thumb.png') }}">
						<img class="abt_vector" src="{{ asset('assets/images/abt_vector.png') }}">
					</div>
				</div>
			</div>
			<div class="row mt-70">
				<div class="col-12 col-md-3">
					<div class="counter">
						<h4 class="ft-urban">2k+</h4>
						<p>Satisfied Clients</p>
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="counter">
						<h4 class="ft-urban">05K+</h4>
						<p>Completed Projects</p>
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="counter">
						<h4 class="ft-urban">25+</h4>
						<p>Year of Experience</p>
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="counter">
						<h4 class="ft-urban">4.9+</h4>
						<p>Overall Ratings</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="secWork">
		<div class="container-fluid">
			<div class="txt_head">
				<h4 class="clr-white text-center">HOW IT WORKS</h4>
				<h2 class="ft-urban clr-white text-center">Detail-Focused Cleaning For Professional Facilities.</h2>
			</div>
			<div class="row mt-60">
				<div class="col-12 col-md-3">
					<div class="howBox">
						<h2 class="ft-urban">#01</h2>
						<h4 class="ft-urban clr-white">Request a Free Quote</h4>
						<p class="clr-white">Contact our team online or by phone and tell us about your cleaning needs, facility type, and preferred schedule.</p>
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="howBox">
						<h2 class="ft-urban">#02</h2>
						<h4 class="ft-urban clr-white">Schedule a Walkthrough</h4>
						<p class="clr-white">Contact our team online or by phone and tell us about your cleaning needs, facility type, and preferred schedule.</p>
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="howBox">
						<h2 class="ft-urban">#03</h2>
						<h4 class="ft-urban clr-white">Receive a Plan</h4>
						<p class="clr-white">Get a clear service proposal tailored to your facility size, cleaning frequency, and operational needs.</p>
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="howBox">
						<h2 class="ft-urban">#04</h2>
						<h4 class="ft-urban clr-white">Cleaning Begins</h4>
						<p class="clr-white">Our trained team delivers reliable, detail-focused cleaning services designed to keep your business spotless and professional.</p>
					</div>
				</div>
			</div>
			<div class="text-center mt-60">
				<a href="javascript:;" class="btn-custom btn-white">
					<span class="txt-before">Request a Vendor Comparison Proposal</span>
					<span class="icon">								
						<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
						</svg>
					</span>
				</a>
			</div>
		</div>
	</section>

	<section class="secClean">
		<div class="container-fluid">
			<div class="txt_head">
				<h4 class="clr-blue text-center">FLOOR CLEANING</h4>
				<h2 class="ft-urban text-center">Your Trusted Commercial <br> Cleaning Partner.</h2>
			</div>
			<div class="clean_slider">
				<div class="item">
					<img src="{{ asset('assets/images/clean_1.png') }}">
				</div>
				<div class="item">
					<img src="{{ asset('assets/images/clean_2.png') }}">
				</div>
				<div class="item">
					<img src="{{ asset('assets/images/clean_3.png') }}">
				</div>
				<div class="item">
					<img src="{{ asset('assets/images/clean_1.png') }}">
				</div>
				<div class="item">
					<img src="{{ asset('assets/images/clean_2.png') }}">
				</div>
				<div class="item">
					<img src="{{ asset('assets/images/clean_3.png') }}">
				</div>
			</div>
		</div>
	</section>

	<section class="secChoose">
		<div class="container-fluid">
			<div class="txt_head">
				<h4 class="clr-blue text-center">WHY CHOOSE US</h4>
				<h2 class="ft-urban text-center">Detail-Focused Cleaning For <br> Professional Facilities.</h2>
			</div>
			<div class="row mt-40">
				<div class="col-12 col-md-3">
					<div class="icon_box">
						<div class="icon">
							<img src="{{ asset('assets/images/icon_1.png') }}">
						</div>
						<h4>Professional commercial-grade equipment</h4>
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="icon_box">
						<div class="icon">
							<img src="{{ asset('assets/images/icon_2.png') }}">
						</div>
						<h4>Flexible after-hours cleaning options</h4>
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="icon_box">
						<div class="icon">
							<img src="{{ asset('assets/images/icon_3.png') }}">
						</div>
						<h4>Quality-focused cleaning standards</h4>
					</div>
				</div>
				<div class="col-12 col-md-3">
					<div class="icon_box">
						<div class="icon">
							<img src="{{ asset('assets/images/icon_4.png') }}">
						</div>
						<h4>Fast response and easy communication</h4>
					</div>
				</div>
			</div>
			<div class="choose_thumb mt-40">
				<img src="{{ asset('assets/images/choose_thumb.png') }}">
			</div>
		</div>
	</section>

	<section class="secClients">
		<div class="container-fluid">
			<div class="txt_head">
				<h4 class="clr-blue text-center">OUR TRUSTED CLIENTS</h4>
				<h2 class="ft-urban text-center">Trusted Cleaning Solutions For <br> Commercial Property.</h2>
			</div>
			<div class="client_slider mt-40">
				<div class="item">
					<img src="{{ asset('assets/images/client_1.png') }}">
				</div>
				<div class="item">
					<img src="{{ asset('assets/images/client_2.png') }}">
				</div>
				<div class="item">
					<img src="{{ asset('assets/images/client_3.png') }}">
				</div>
				<div class="item">
					<img src="{{ asset('assets/images/client_4.png') }}">
				</div>
				<div class="item">
					<img src="{{ asset('assets/images/client_5.png') }}">
				</div>
				<div class="item">
					<img src="{{ asset('assets/images/client_1.png') }}">
				</div>
				<div class="item">
					<img src="{{ asset('assets/images/client_2.png') }}">
				</div>
				<div class="item">
					<img src="{{ asset('assets/images/client_3.png') }}">
				</div>
				<div class="item">
					<img src="{{ asset('assets/images/client_4.png') }}">
				</div>
				<div class="item">
					<img src="{{ asset('assets/images/client_5.png') }}">
				</div>
			</div>
		</div>
	</section>

	<section class="secReviews">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-5">
					<div class="txt_head">
						<h4 class="clr-blue">TESTIMONIALS</h4>
						<h2 class="ft-urban">What Client Says About Our Cleaning Services</h2>
						<p>Businesses across South Texas trust Bright Cleaning for reliable, professional, and detail-oriented commercial cleaning services. From offices and medical facilities to warehouses and retail spaces, we help companies maintain cleaner, safer, and more professional environments every day.</p>
					</div>
				</div>
				<div class="col-12 col-md-7">
					<div class="test_slider">
						<div class="item">
							<div class="tstBox">
								<div class="ctn">
									<img src="{{ asset('assets/images/tst.png') }}">
									<h4 class="ft-urban">Leo</h4>
									<div class="stars">										
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
									</div>
								</div>
								<div class="txt">
									Had an awesome experience. Got more than what I expected from the crew. I would definitely recommend these guys to anyone!!
								</div>
								<h3>-Property Supervisor</h3>
							</div>
						</div>
						<div class="item">
							<div class="tstBox">
								<div class="ctn">
									<img src="{{ asset('assets/images/tst.png') }}">
									<h4 class="ft-urban">Leo</h4>
									<div class="stars">										
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
									</div>
								</div>
								<div class="txt">
									Had an awesome experience. Got more than what I expected from the crew. I would definitely recommend these guys to anyone!!
								</div>
								<h3>-Property Supervisor</h3>
							</div>
						</div>
						<div class="item">
							<div class="tstBox">
								<div class="ctn">
									<img src="{{ asset('assets/images/tst.png') }}">
									<h4 class="ft-urban">Leo</h4>
									<div class="stars">										
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
									</div>
								</div>
								<div class="txt">
									Had an awesome experience. Got more than what I expected from the crew. I would definitely recommend these guys to anyone!!
								</div>
								<h3>-Property Supervisor</h3>
							</div>
						</div>
						<div class="item">
							<div class="tstBox">
								<div class="ctn">
									<img src="{{ asset('assets/images/tst.png') }}">
									<h4 class="ft-urban">Leo</h4>
									<div class="stars">										
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
										<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.74172 18.5863L5.33134 11.7143L0 7.09215L7.04324 6.48076L9.78227 0L12.5213 6.48076L19.5645 7.09215L14.2332 11.7143L15.8228 18.5863L9.78227 14.9424L3.74172 18.5863Z" fill="#FDCA00"/>
										</svg>
									</div>
								</div>
								<div class="txt">
									Had an awesome experience. Got more than what I expected from the crew. I would definitely recommend these guys to anyone!!
								</div>
								<h3>-Property Supervisor</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="secClients">
		<div class="container-fluid">
			<div class="txt_head">
				<h4 class="clr-blue text-center">OUR WORK</h4>
				<h2 class="ft-urban text-center">South Texas Commercial Cleaning Experts. <br>Commercial Cleaning Done Right.</h2>
			</div>
			<div class="row mt-40">
				<div class="col-12 col-md-7">
					<img src="{{ asset('assets/images/gallery_1.png') }}">
				</div>
				<div class="col-12 col-md-5">
					<img src="{{ asset('assets/images/gallery_2.png') }}">
				</div>
			</div>
			<div class="row mt-40">
				<div class="col-12 col-md-3">
					<img src="{{ asset('assets/images/gallery_3.png') }}">
				</div>
				<div class="col-12 col-md-3">
					<img src="{{ asset('assets/images/gallery_4.png') }}">
				</div>
				<div class="col-12 col-md-3">
					<img src="{{ asset('assets/images/gallery_5.png') }}">
				</div>
				<div class="col-12 col-md-3">
					<img src="{{ asset('assets/images/gallery_6.png') }}">
				</div>
			</div>
			<div class="text-center mt-60">
				<a href="javascript:;" class="btn-custom">
					<span class="txt-before">View all</span>
					<span class="icon">								
						<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
						</svg>
					</span>
				</a>
			</div>
		</div>
	</section>

	<section class="secContact">
		<div class="container-fluid">
			<div class="row box_shade align-center">
				<div class="col-12 col-md-6">
					<div class="ct_thumb">
						<img src="{{ asset('assets/images/ct_thumb.png') }}">
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="txt_head">
						<h2 class="ft-urban">Get a Quote</h2>
					</div>
					<div class="ct_form">
						<form class="form" enctype="multiple">
							<div class="row">
								<div class="col-12 col-md-6 field">
									<input class="form-control" type="text" name="name" placeholder="Name">
								</div>
								<div class="col-12 col-md-6 field">
									<input class="form-control" type="text" name="company-name" placeholder="Company Name">
								</div>
								<div class="col-12 col-md-6 field">
									<input class="form-control" type="email" name="email" placeholder="Email">
								</div>
								<div class="col-12 col-md-6 field">
									<input class="form-control" type="tel" name="phone" placeholder="Phone">
								</div>
								<div class="col-12 col-md-6 field">
									<input class="form-control" type="text" name="service" placeholder="Service needed">
								</div>
								<div class="col-12 col-md-6 field">
									<input class="form-control" type="text" name="location" placeholder="Location">
								</div>
								<div class="col-12 field">
									<input class="form-control" type="text" name="footage" placeholder="Approximate square footage">
								</div>
								<div class="col-12 col-md-6 field">
									<input class="form-control" type="text" name="name" placeholder="Date Picker">
								</div>
								<div class="col-12 col-md-6 field">
									<input class="form-control" type="text" name="company-name" placeholder="Time Picker">
								</div>
								<div class="col-12 field file_upload">
									<!-- <input class="form-control" type="file" name="footage" placeholder="Approximate square footage"> -->
									<div class="upload-container">
										<h4 class="ft-urban clr-blue">
											<span class="icon">												
												<svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M1 17H13M7 13V1M3.5 4.5L7 1L10.5 4.5" stroke="#004B9E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</span>
											Upload File
										</h4>
									  <p>Click or drag files here (Max 10)</p>
									  <input type="file" id="fileInput" multiple>
									</div>

									<div class="preview-container" id="previewContainer"></div>
								</div>
								<div class="col-12 field file_upload">
									<textarea class="form-control" name="message" placeholder=" Notes/special instructions"></textarea>
								</div>
								<div class="col-12 field file_upload">
									<button type="submit" class="btn-custom">
										<span class="txt-before">Request a Free Walkthrough & Proposal</span>
										<span class="icon">								
											<svg width="13" height="11" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0 3.68164V4.18164H8.5V3.68164V3.18164H0V3.68164Z" fill="#004B9E"/>
											</svg>
										</span>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

<script type="text/javascript">
	$(document).ready(function() {
		$('.banner_slider').slick({
		  vertical: true,
		  verticalSwiping: true,
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  arrows: false,
		  dots: false,
		  swipe: false,
		  asNavFor: '.thumb_slider',
		  infinite: true
		});

		$('.serv_slider').slick({
		  slidesToShow: 3,
		  slidesToScroll: 1,
		  dots: false,
		  infinite: true,
		  prevArrow: `
			<button class="slick-prev">			    
			    <svg width="37" height="15" viewBox="0 0 37 15" fill="none" xmlns="http://www.w3.org/2000/svg">
			        <path d="M0.292892 8.07039C-0.0976295 7.67986 -0.0976295 7.0467 0.292892 6.65617L6.65685 0.292213C7.04738 -0.0983109 7.68054 -0.0983109 8.07107 0.292213C8.46159 0.682738 8.46159 1.3159 8.07107 1.70643L2.41422 7.36328L8.07107 13.0201C8.46159 13.4107 8.46159 14.0438 8.07107 14.4343C7.68054 14.8249 7.04738 14.8249 6.65685 14.4343L0.292892 8.07039ZM37 7.36328V8.36328H1V7.36328V6.36328H37V7.36328Z" fill="#004B9E"/>
			    </svg>
			</button>
			`,

			nextArrow: `
			<button class="slick-next">
			    <svg width="37" height="15" viewBox="0 0 37 15" fill="none" xmlns="http://www.w3.org/2000/svg">
			        <path d="M36.7071 8.07039C37.0976 7.67986 37.0976 7.0467 36.7071 6.65617L30.3431 0.292213C29.9526 -0.0983109 29.3195 -0.0983109 28.9289 0.292213C28.5384 0.682738 28.5384 1.3159 28.9289 1.70643L34.5858 7.36328L28.9289 13.0201C28.5384 13.4107 28.5384 14.0438 28.9289 14.4343C29.3195 14.8249 29.9526 14.8249 30.3431 14.4343L36.7071 8.07039ZM0 7.36328V8.36328H36V7.36328V6.36328H0V7.36328Z" fill="#004B9E"/>
			    </svg>
			</button>
			`,
		});

		$('.clean_slider').slick({
		  slidesToShow: 3,
		  slidesToScroll: 1,
		  dots: true,
		  arrows: false,
		  infinite: true,
		});

		$('.test_slider').slick({
		  slidesToShow: 2,
		  slidesToScroll: 1,
		  dots: true,
		  arrows: false,
		  infinite: true,
		});

		$('.thumb_slider').slick({
		  slidesToShow: 2,
		  slidesToScroll: 1,
		  dots: false,
		  swipe: false,
		  asNavFor: '.banner_slider',
		  focusOnSelect: true,
		  infinite: true,
		  prevArrow: `
			<button class="slick-prev">			    
			    <svg width="37" height="15" viewBox="0 0 37 15" fill="none" xmlns="http://www.w3.org/2000/svg">
			        <path d="M0.292892 8.07039C-0.0976295 7.67986 -0.0976295 7.0467 0.292892 6.65617L6.65685 0.292213C7.04738 -0.0983109 7.68054 -0.0983109 8.07107 0.292213C8.46159 0.682738 8.46159 1.3159 8.07107 1.70643L2.41422 7.36328L8.07107 13.0201C8.46159 13.4107 8.46159 14.0438 8.07107 14.4343C7.68054 14.8249 7.04738 14.8249 6.65685 14.4343L0.292892 8.07039ZM37 7.36328V8.36328H1V7.36328V6.36328H37V7.36328Z" fill="white"/>
			    </svg>
			</button>
			`,

			nextArrow: `
			<button class="slick-next">
			    <svg width="37" height="15" viewBox="0 0 37 15" fill="none" xmlns="http://www.w3.org/2000/svg">
			        <path d="M36.7071 8.07039C37.0976 7.67986 37.0976 7.0467 36.7071 6.65617L30.3431 0.292213C29.9526 -0.0983109 29.3195 -0.0983109 28.9289 0.292213C28.5384 0.682738 28.5384 1.3159 28.9289 1.70643L34.5858 7.36328L28.9289 13.0201C28.5384 13.4107 28.5384 14.0438 28.9289 14.4343C29.3195 14.8249 29.9526 14.8249 30.3431 14.4343L36.7071 8.07039ZM0 7.36328V8.36328H36V7.36328V6.36328H0V7.36328Z" fill="white"/>
			    </svg>
			</button>
			`,
		});

		$('.client_slider').slick({
			autoplay: true,
			autoplaySpeed: 0,
			speed: 6000,
			arrows: false,
			swipe: false,
			slidesToShow: 4,
			cssEase: 'linear',
			pauseOnFocus: false,
			pauseOnHover: false,
			responsive: [
		        {
		            breakpoint: 1400,
		            settings: {
		                slidesToShow: 4 // yaha aap apni requirement ke hisab se number change kar sakte ho
		            }
		        },
				{
		            breakpoint: 768,
		            settings: {
		                slidesToShow: 2 // yaha aap apni requirement ke hisab se number change kar sakte ho
		            }
		        }
	    	]
		  });

	});


	const fileInput = document.getElementById('fileInput');
  const previewContainer = document.getElementById('previewContainer');
  let filesArray = [];

  fileInput.addEventListener('change', (e) => {
    const selectedFiles = Array.from(e.target.files);

    selectedFiles.forEach(file => {
      if (filesArray.length < 10) {
        filesArray.push(file);
      }
    });

    updatePreview();
  });

  function updatePreview() {
    previewContainer.innerHTML = '';

    filesArray.forEach((file, index) => {
      const fileReader = new FileReader();
      const previewDiv = document.createElement('div');
      previewDiv.className = 'file-preview';

      const removeBtn = document.createElement('button');
      removeBtn.className = 'remove-btn';
      removeBtn.innerHTML = '&times;';
      removeBtn.onclick = () => {
        filesArray.splice(index, 1);
        updatePreview();
      };

      previewDiv.appendChild(removeBtn);

      if (file.type.startsWith('image/')) {
        fileReader.onload = (e) => {
          const img = document.createElement('img');
          img.src = e.target.result;
          previewDiv.appendChild(img);
          const fileName = document.createElement('div');
          fileName.textContent = file.name;
          previewDiv.appendChild(fileName);
        };
        fileReader.readAsDataURL(file);
      } else {
        const fileName = document.createElement('div');
        fileName.textContent = file.name;
        previewDiv.appendChild(fileName);
      }

      previewContainer.appendChild(previewDiv);
    });
  }

</script>

@endsection