@extends('layouts.app')
@section('title', 'Book Walkthrough - BCC')
@section('meta_description', '')
@section('content')


	<section class="secBreadcrumbs" style="background-image: url('assets/images/book-banner.jpg');">
		<div class="container-fluid">
			<div class="txt_head">
				<h1 class="ft-urban clr-white text-center">BOOK WALKTHROUGH</h1>
				<p class="clr-white text-center">Home / Book Through</p>
			</div>
		</div>
	</section>

	<section class="pt-100 pb-100">
		<div class="container-fluid">
			<div class="row align-center">
				<div class="col-12 col-md-6">
					<div class="book-thumb">
						<img src="assets/images/book-thumb.png">
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="txt_head">
						<h2 class="ft-urban">Proudly Serving Businesses Across South Texas</h2>
						<p>BCC Solutions LLC provides reliable commercial cleaning solutions for businesses throughout South Texas. Our team proudly serves Brownsville, McAllen, Harlingen, and Edinburg with customized cleaning plans designed to keep commercial facilities clean, professional, and well-maintained. </p>
						<p>Whether you operate an office, warehouse, retail store, medical facility, school, or industrial property, we deliver dependable cleaning services tailored to your business needs.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="bg_grad pt-100 pb-100 secSteps">
		<div class="container-fluid">
			<div class="txt_head">
				<h2 class="ft-urban text-center clr-white">Why Businesses Trust Bright Cleaning</h2>
			</div>
			<div class="blocks_lists">
				<div class="iconBox">
					<div class="bf_icon">
						<img src="assets/images/before_icon.png">
					</div>
					<div class="icon">
						<img src="assets/images/white_icon_1.svg">
					</div>
					<h4 class="ft-urban clr-white text-center">Commercial Cleaning Specialists</h4>
				</div>
				<div class="iconBox">
					<div class="bf_icon">
						<img src="assets/images/before_icon.png">
					</div>
					<div class="icon">
						<img src="assets/images/white_icon_2.svg">
					</div>
					<h4 class="ft-urban clr-white text-center"> Fully Insured</h4>
				</div>
				<div class="iconBox">
					<div class="bf_icon">
						<img src="assets/images/before_icon.png">
					</div>
					<div class="icon">
						<img src="assets/images/white_icon_3.svg">
					</div>
					<h4 class="ft-urban clr-white text-center">Customized Cleaning Programs</h4>
				</div>
				<div class="iconBox">
					<div class="bf_icon">
						<img src="assets/images/before_icon.png">
					</div>
					<div class="icon">
						<img src="assets/images/white_icon_4.svg">
					</div>
					<h4 class="ft-urban clr-white text-center">Quality Inspections</h4>
				</div>
				<div class="iconBox">
					<div class="bf_icon">
						<img src="assets/images/before_icon.png">
					</div>
					<div class="icon">
						<img src="assets/images/white_icon_5.svg">
					</div>
					<h4 class="ft-urban clr-white text-center"> Serving Businesses Across Texas</h4>
				</div>
			</div>
		</div>
	</section>

	<section class="pt-100 pb-50 secWalk">
		<div class="container">
			<div class="txt_head">
				<h2 class="ft-urban text-center">Book Your Cleaning Walkthrough</h2>
			</div>
			<form class="form" method="POST" action="{{ route('contact.detailed') }}" enctype="multipart/form-data">
    		@csrf
				<fieldset>
					<h3 class="ft-urban">
						<span class="nbr">01</span>
						Contact Information
					</h3>
					<div class="row">
						<div class="col-12 col-md-6">
							<label>Contact Name*</label>
							<input type="text" class="form-control" name="name" placeholder="Contact Name">
						</div>
						<div class="col-12 col-md-6">
							<label>Company Name*</label>
							<input type="text" class="form-control" name="company_name" placeholder="Company Name">
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-md-6">
							<label>Email Address*</label>
							<input type="email" class="form-control" name="email" placeholder="Email Address">
						</div>
						<div class="col-12 col-md-6">
							<label>Phone Number*</label>
							<input type="tel" class="form-control" name="phone" placeholder="Phone Number">
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<label>Decision Maker</label>
							<select class="form-control" name="maker">
								<option>Who are You?</option>
								<option>Owner</option>
								<option>Property Manager</option>
								<option>Facility Manager</option>
								<option>Office Manager</option>
								<option>Operations Manager</option>
								<option>Other</option>
							</select>
						</div>
					</div>
				</fieldset>
				<fieldset>
					<h3 class="ft-urban">
						<span class="nbr">02</span>
						Property Information
					</h3>
					<div class="row">
						<div class="col-12">
							<label>Property Address</label>
							<input type="text" class="form-control" name="address" placeholder="Property Address">
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-md-6">
							<label>City</label>
							<input type="text" class="form-control" name="city" placeholder="City">
						</div>
						<div class="col-12 col-md-6">
							<label>ZIP Code</label>
							<input type="text" class="form-control" name="zip_code" placeholder="ZIP Code">
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<label>Facility Type*</label>
							<select class="form-control" name="facility_type">
								<option>Facility Type</option>
								<option>Office Building</option>
								<option>Warehouse</option>
								<option>Medical Office</option>
								<option>Retail Store</option>
								<option>Industrial Facility</option>
								<option>School / Educational Facility</option>
								<option>Post-Construction</option>
								<option>Other</option>
							</select>
						</div>
					</div>
				</fieldset>
				<fieldset>
					<h3 class="ft-urban">
						<span class="nbr">03</span>
						Property Details
					</h3>
					<div class="row">
						<div class="col-12">
							<label>Approximate Square Footage</label>
							<input type="text" class="form-control" name="square_feet" placeholder="Approximate Square Footage">
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-md-6">
							<label>Number of Floors</label>
							<input type="text" class="form-control" name="floors" placeholder="Number of Floors">
						</div>
						<div class="col-12 col-md-6">
							<label>Number of Restrooms</label>
							<input type="text" class="form-control" name="restrooms" placeholder="Number of Restrooms">
						</div>
					</div>
				</fieldset>
				<fieldset>
					<h3 class="ft-urban">
						<span class="nbr">04</span>
						Services
					</h3>
					<div class="row">
						<div class="col-12">
							<label>Services Needed*</label>
							<select class="form-control" name="service">
								<option>Services Needed</option>
								<option>Commercial Cleaning</option>
								<option>Janitorial Services</option>
								<option>Office Cleaning</option>
								<option>Warehouse Cleaning</option>
								<option>Medical Cleaning</option>
								<option>Floor Care</option>
								<option>Floor Polishing</option>
								<option> Deep Cleaning</option>
								<option>Post-Construction Cleaning</option>
								<option>Move-In / Move-Out Cleaning</option>
								<option>Disinfection Services</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<label>Service Frequency*</label>
							<select class="form-control" name="frequency">
								<option>Service Frequency</option>
								<option>Daily</option>
								<option>Weekly</option>
								<option>Bi-Weekly</option>
								<option>Monthly</option>
								<option>One-Time Service</option>
							</select>
						</div>
					</div>
				</fieldset>
				<fieldset>
					<h3 class="ft-urban">
						<span class="nbr">05</span>
						Additional Information
					</h3>
					<div class="row">
						<div class="col-12 col-md-6">
							<label>Date*</label>
							<input type="text" class="form-control" name="date" placeholder="Date">
						</div>
						<div class="col-12 col-md-6">
							<label>Time*</label>
							<input type="text" class="form-control" name="time" placeholder="Time">
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<label>Additional Notes</label>
							<textarea class="form-control" name="notes" placeholder="Additional Notes"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-12 drop_icon">
							<label>Best Time To Contact</label>
							<select class="form-control" name="best_time">
								<option>Choose Time</option>
								<option>Morning</option>
								<option>Afternoon</option>
								<option>Evening</option>
							</select>
						</div>
						<div class="col-12 field file_upload">
							<div class="upload-container">
								<h4 class="ft-urban clr-blue">
									<span class="icon">												
										<svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 17H13M7 13V1M3.5 4.5L7 1L10.5 4.5" stroke="#004B9E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
									Upload File
								</h4>
							  <p>You can add up to 10 files</p>
							  <input type="file" id="fileInput" name="files[]" multiple>
							</div>

							<div class="preview-container" id="previewContainer"></div>
						</div>
						<div class="col-12">
							<div class="check_ipt">
								<label for="agree">
									<input id="agree" type="checkbox" name="agree">
									 I agree with the terms & conditions and the privacy policy
								</label>
							</div>
						</div>
					</div>
				</fieldset>
				<div class="row">
					
					<div class="col-12 field text-center">
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
				@if(session('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{ session('success') }}
						<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
					</div>
				@endif
			</form>
		</div>
	</section>

	<section class="pt-50 pb-100 main_location">
		<div class="container-fluid">
			<div class="txt_head">
				<h2 class="ft-urban text-center">Our Main Service Locations</h2>
			</div>
			<div class="location-slider">

		        <div class="slide-item">
		            <img src="assets/images/brownsville.png" alt="">
		        </div>

		        <div class="slide-item">
		            <img src="assets/images/mcallen.png" alt="">
		        </div>

		        <div class="slide-item">
		            <img src="assets/images/harlingen.png" alt="">
		        </div>

		        <div class="slide-item">
		            <img src="assets/images/edinburg.png" alt="">
		        </div>

		        <div class="slide-item">
		            <img src="assets/images/laredo.png" alt="">
		        </div>

		        <div class="slide-item">
		            <img src="assets/images/corpus.png" alt="">
		        </div>

		        <div class="slide-item">
		            <img src="assets/images/antonio.png" alt="">
		        </div>

		        <div class="slide-item">
		            <img src="assets/images/houston.png" alt="">
		        </div>

		        <div class="slide-item">
		            <img src="assets/images/dallas.png" alt="">
		        </div>

		        <div class="slide-item">
		            <img src="assets/images/fort-worth.png" alt="">
		        </div>

		    </div>

		    <div class="location-grid">

			    <div class="location-item active" data-slide="0">
			    	<div class="icon">
			    		<img src="assets/images/loct-icon.svg">
			    	</div>
			        Brownsville
			    </div>

			    <div class="location-item" data-slide="1">
			    	<div class="icon">
			    		<img src="assets/images/loct-icon.svg">
			    	</div>
			        McAllen
			    </div>

			    <div class="location-item" data-slide="2">
			    	<div class="icon">
			    		<img src="assets/images/loct-icon.svg">
			    	</div>
			        Harlingen
			    </div>

			    <div class="location-item" data-slide="3">
			    	<div class="icon">
			    		<img src="assets/images/loct-icon.svg">
			    	</div>
			        Edinburg
			    </div>

			    <div class="location-item" data-slide="4">
			    	<div class="icon">
			    		<img src="assets/images/loct-icon.svg">
			    	</div>
			        Laredo
			    </div>

			    <div class="location-item" data-slide="5">
			    	<div class="icon">
			    		<img src="assets/images/loct-icon.svg">
			    	</div>
			        Corpus Christi
			    </div>

			    <div class="location-item" data-slide="6">
			    	<div class="icon">
			    		<img src="assets/images/loct-icon.svg">
			    	</div>
			        San Antonio
			    </div>

			    <div class="location-item" data-slide="7">
			    	<div class="icon">
			    		<img src="assets/images/loct-icon.svg">
			    	</div>
			        Houston
			    </div>

			    <div class="location-item" data-slide="8">
			    	<div class="icon">
			    		<img src="assets/images/loct-icon.svg">
			    	</div>
			        Dallas
			    </div>

			    <div class="location-item" data-slide="9">
			    	<div class="icon">
			    		<img src="assets/images/loct-icon.svg">
			    	</div>
			        Fort Worth
			    </div>

			</div>


		</div>
	</section>


<script type="text/javascript">
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


  $(document).ready(function () {

    // Main Slider
    $('.location-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        adaptiveHeight: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-arrow-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-arrow-right"></i></button>'
    });

    // Grid Item Click
    $('.location-item').on('click', function () {

        let slideIndex = $(this).data('slide');

        // Active class update
        $('.location-item').removeClass('active');
        $(this).addClass('active');

        // Go to selected slide
        $('.location-slider').slick('slickGoTo', slideIndex);

    });

    // Update active grid item when slider changes
    $('.location-slider').on('afterChange', function (event, slick, currentSlide) {

        $('.location-item').removeClass('active');

        $('.location-item[data-slide="' + currentSlide + '"]')
            .addClass('active');

    });

});

</script>

@endsection