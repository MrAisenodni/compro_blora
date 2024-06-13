<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="keywords" content="RS PKU Muhammadiyah Blora">
	<meta property="title" content="Rumah Sakit PKU Muhammadiyah Blora | Company Profile">
	<meta name="google-site-verification" content="lgFUyLnFtcZtoBln3oT45vvZiu0_6bIBRTIYXT1tnSM" />
	<meta name="description" content="@yield('meta-description')">
	<link href="{{ asset('/storage/'.$provider->logo) }}" rel="icon">
	<title>@yield('title') | {{ $provider->title }}</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Roboto:wght@400;700&display=swap">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
	@yield('styles')
	<link rel="stylesheet" href="{{ asset('/css/libraries.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body>
	<div class="wrapper">
		<div class="preloader">
			<div class="loading"><span></span><span></span><span></span><span></span></div>
		</div><!-- /.preloader -->

		<!-- =========================
			Header
		=========================== -->
		<header class="header header-layout2">
			@include('layouts.header')

			@include('layouts.navbar')
		</header><!-- /.Header -->

		@yield('content')

		<!-- ========================
		Footer
		========================== -->
		<footer class="footer">
			<div class="footer-primary">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-3">
							<div class="footer-widget-about">
								<img src="{{ asset('/storage/'.$provider->logo_footer) }}" alt="{{ $provider->title }}" class="mb-30">
								<p class="color-gray">
									{!! $provider->description !!}
								</p>
								<a href="/doctor-schedule" class="btn btn__primary btn__primary-style2 btn__link">
									<span>Make Appointment</span> <i class="icon-arrow-right"></i>
								</a>
							</div><!-- /.footer-widget__content -->
						</div><!-- /.col-xl-2 -->
						<div class="col-sm-6 col-md-6 col-lg-2 offset-lg-1">
							<div class="footer-widget-nav">
								<h6 class="footer-widget__title">Departments</h6>
								<nav>
									@if ($services)
										<ul class="list-unstyled">
											@foreach ($services as $service)
												<li><a href="/fasilitas-pelayanan/{{ $service->slug }}">{{ $service->title }}</a></li>
											@endforeach
										</ul>
									@endif
								</nav>
							</div><!-- /.footer-widget__content -->
						</div><!-- /.col-lg-2 -->
						<div class="col-sm-6 col-md-6 col-lg-2">
							<div class="footer-widget-nav">
								<h6 class="footer-widget__title">Links</h6>
								<nav>
									<ul class="list-unstyled">
										@if ($menus)
											@foreach ($menus as $menu)
												<li><a href="{{ $menu->url }}" data-id="{{ $menu->id }}">{{ $menu->title }}</a></li>
											@endforeach
										@endif
									</ul>
								</nav>
							</div><!-- /.footer-widget__content -->
						</div><!-- /.col-lg-2 -->
						<div class="col-sm-12 col-md-6 col-lg-4">
							<div class="row">
								<div class="col-sm-12 mb-n3">
									<div class="footer-widget-contact" style="padding: 0px">
										<!-- ========================= 
												Google Map
										=========================  -->
										{!! $provider->maps !!}
									</div><!-- /.footer-widget__content -->
								</div>
								<div class="col-sm-12">
									<ul class="social-icons-white list-unstyled mb-0 mr-30">
										@if ($sosmeds)
											@foreach ($sosmeds as $sosmed)
												<li><a href="{{ $sosmed->url }}" data-title="{{ $sosmed->title }}"><i class="{{ $sosmed->icon }}"></i></a></li>
											@endforeach
										@endif
									</ul><!-- /.social-icons -->
								</div>
							</div>
						</div><!-- /.col-lg-2 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.footer-primary -->
			<div class="footer-secondary">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-sm-12 col-md-6 col-lg-6">
							<span class="fz-14">&copy; 2024, All Rights Reserved. Copyright by </span>
							<a class="fz-14 color-primary" href="https://lawuit.com/">LAWU IT Consultant</a>
						</div><!-- /.col-lg-6 -->
						<div class="col-sm-12 col-md-6 col-lg-6">
						<nav>
							<ul class="list-unstyled footer__copyright-links d-flex flex-wrap justify-content-end mb-0">
								{{-- <li><a href="#">Terms & Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Cookies</a></li> --}}
							</ul>
						</nav>
						</div><!-- /.col-lg-6 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.footer-secondary -->
		</footer><!-- /.Footer -->
		<button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>
	</div><!-- /.wrapper -->

	@yield('scripts')
	<script src="{{ asset('/js/jquery-3.5.1.min.js') }}"></script>
	<script src="{{ asset('/js/plugins.js') }}"></script>
	<script src="{{ asset('/js/main.js') }}"></script>

	<!-- Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', '{{ env('GA_TRACKING_ID') }}');
	</script>
</body>

</html>