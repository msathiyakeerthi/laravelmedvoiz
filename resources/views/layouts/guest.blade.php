<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<!-- Meta data -->
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="{{ $information['author'] }}">
	    <meta name="keywords" content="{{ $information['keywords'] }}">
	    <meta name="description" content="{{ $information['description'] }}">
		
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Title -->
        <title>{{ $information['title'] }}</title>

        <!--CSS Files -->
        <link href="{{URL::asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{URL::asset('css/slick.css')}}" rel="stylesheet">
        <link href="{{URL::asset('css/slick-theme.css')}}" rel="stylesheet">
	    <link href="{{URL::asset('plugins/awselect/awselect.min.css')}}" rel="stylesheet">

		@include('layouts.header')

		<!--Custom User CSS File -->
		<link href="{{URL::asset($information['css'])}}" rel="stylesheet">

	</head>

	<body class="app sidebar-mini frontend-body {{ Request::path() != '/' ? 'blue-background' : '' }}">

        <!-- LOADER -->
		<div id="global-loader" >
			<img src="{{URL::asset('img/svgs/loader.gif')}}" alt="loader">           
		</div>
		<!-- END LOADER -->

		@if (config('frontend.maintenance') == 'on')
			
			<div class="container h-100vh">
				<div class="row text-center h-100vh align-items-center">
					<div class="col-md-12">
						<img src="{{ URL::asset('img/files/maintenance.png') }}" alt="Maintenance Image">
						<h2 class="mt-4 font-weight-bold">We are just tuning up a few things.</h2>
						<h5>We apologize for the inconvenience but <span class="font-weight-bold text-info">{{ config('app.name') }}</span> is currently undergoing planned maintenance.</h5>
					</div>
				</div>
			</div>
		@else

			<!-- Page -->
			@if (config('frontend.frontend_page') == 'on')
						
				<div class="page">
					<div class="page-main">

						<section id="main-wrapper">
					
							<div class="relative flex items-top justify-center min-h-screen">
				
								<div class="container-fluid">
				
									<div class="container">
										<div class="row">
				
											<nav class="navbar navbar-expand-lg navbar-light w-100 navbar-special">
												<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ URL::asset('img/brand/logo.png') }}" alt=""></a>
												<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
													<span class="navbar-toggler-icon"></span>
												</button>
												<div class="collapse navbar-collapse" id="navbarNav">
													<ul class="navbar-nav">
														<li class="nav-item">
															<a class="nav-link scroll {{ Request::path() === '/' ? 'active' : '' }}" href="{{ url('/') }}">{{ __('Home') }} <span class="sr-only">(current)</span></a>
														</li>
														@if (config('frontend.about_page') == 'on')
															<li class="nav-item">
																<a class="nav-link scroll {{ Request::path() === 'about' ? 'active' : '' }}" href="{{ route('about') }}">{{ __('About') }}</a>
															</li>
														@endif									
														@if (config('frontend.blog_page') == 'on')
															<li class="nav-item">
																<a class="nav-link scroll {{ Request::path() === 'blogs' ? 'active' : '' }}" href="{{ route('blogs') }}">{{ __('Blog') }}</a>
															</li>
														@endif
														@if (config('frontend.faq_page') == 'on')
															<li class="nav-item">
																<a class="nav-link scroll {{ Request::path() === 'faqs' ? 'active' : '' }}" href="{{ route('faqs') }}">{{ __('FAQ') }}</a>
															</li>
														@endif
														@if (config('frontend.pricing_page') == 'on')
															<li class="nav-item">
																<a class="nav-link scroll {{ Request::path() === 'pricing' ? 'active' : '' }}" href="{{ route('pricing') }}">{{ __('Pricing') }}</a>
															</li>
														@endif
														@if (config('frontend.contact_page') == 'on')
															<li class="nav-item">
																<a class="nav-link {{ Request::path() === 'contact' ? 'active' : '' }}" href="{{ route('contact.show') }}">{{ __('Contact Us') }}</a>
															</li>
														@endif
														
														<li class="nav-item ml-8">
															@if (Route::has('login'))
																<div>
																	@auth
																		<a href="{{ route('user.stt.file') }}" class="action-button dashboard-button pl-5 pr-5">{{ __('Dashboard') }}</a>
																	@else
																		<a href="{{ route('login') }}" class="action-button" id="login-button">{{ __('Login') }}</a>
				
																		@if (config('settings.registration') == 'enabled')
																			@if (Route::has('register'))
																				<a href="{{ route('register') }}" class="ml-2 action-button register-button pl-5 pr-5">{{ __('Sign Up') }}</a>
																			@endif
																		@endif
																	@endauth
																</div>
															@endif
														</li>
													</ul>
												</div>
											</nav>
				
										</div>
									</div>
				
									@include('layouts.flash')
				
								</div>
				
							</div>  
						</section>

						<!-- App-Content -->			
						<div class="main-content">
							<div class="side-app">

								@yield('content')

							</div>                   
						</div>
				
				</div><!-- End Page -->
			
				<!-- FOOTER SECTION
				========================================================-->
				<footer id="welcome-footer" >

					<!-- FOOTER MAIN CONTENT -->
					<div id="footer" class="container text-center">
								
						<div class="row">    

							<img src="{{ URL::asset('img/brand/logo-white.png') }}" alt="Brand Logo">

							<!-- FOOTER LINKS -->
							<div class="col-md-12 col-sm-12" id="footer-links">
								
								<div class="row w-100">

									<!-- COMPANY LINKS -->
									<div class="col-md-3 col-sm-12">
										
										<h5>{{ __('Company') }}</h5>
										
										<ul class="list-unstyled">
											<li><a href="{{ route('about') }}">Who we are?</a></li>
											<li><a href="{{ route('blogs') }}">Textract Info</a></li>						
											<li><a href="{{ route('pricing') }}">Our Packages</a></li>
											<li><a href="https://aws.amazon.com" target="_blank">AWS Cloud</a></li>						
										</ul>		         

									</div> <!-- COMPANY LINKS -->

									<!-- INFORMATION LINKS -->
									<div class="col-md-3 col-sm-12">
									
										<h5>{{ __('Site Pages') }}</h5>

										<ul class="list-unstyled">											
											<li><a href="{{ route('about') }}">About</a></li>
											<li><a href="{{ route('pricing') }}">Prices</a></li>
											<li><a href="{{ route('blogs') }}">Blogs</a></li>
											<li><a href="{{ route('faqs') }}">FAQ</a></li>
											<li><a href="{{ route('contact.show') }}">Contact Us</a></li>
											<li><a href="{{ route('login') }}">Login</a></li>
											<li><a href="{{ route('register') }}">Register</a></li>	
											                            
										</ul>

									</div> <!-- END INFORMATION LINKS -->


									<!-- SOLUTIONS LINKS -->
									<div class="col-md-3 col-sm-12">				
											
										<h5>{{ __('Legal Information') }}</h5>

										<ul class="list-unstyled">
											<li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
											<li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
											<li><a href="{{ route('contact.show') }}">Customer Complains</a></li>																	
										</ul>				

									</div> <!-- END SOLUTIONS LINKS -->									

									
									<!-- CONNECTION & NEWS LINKS -->
									<div class="col-md-3 col-sm-12 footer-connect pr-0">
																
										<h5>{{ __('Social Media') }}</h5>

										<h6>Follow up on social media to find out the latest updates on our progress.</h6>

										<ul id="footer-icons" class="list-inline">
											@if (config('frontend.social_linkedin'))
												<a href="{{ config('frontend.social_linkedin') }}" target="_blank"><li class="list-inline-item"><i class="footer-icon fa fa-linkedin"></i></li></a>
											@endif
											@if (config('frontend.social_twitter'))
												<a href="{{ config('frontend.social_twitter') }}" target="_blank"><li class="list-inline-item"><i class="footer-icon fa fa-twitter"></i></li></a>
											@endif
											@if (config('frontend.social_instagram'))
												<a href="{{ config('frontend.social_instagram') }}" target="_blank"><li class="list-inline-item"><i class="footer-icon fa fa-instagram"></i></li></a>
											@endif
											@if (config('frontend.social_facebook'))
												<a href="{{ config('frontend.social_facebook') }}" target="_blank"><li class="list-inline-item"><i class="footer-icon fa fa-facebook"></i></li></a>
											@endif											
											
											@if (config('frontend.social_youtube'))
												<a href="{{ config('frontend.social_youtube') }}" target="_blank"><li class="list-inline-item"><i class="footer-icon fa fa-youtube"></i></li></a>
											@endif
											
										</ul>

										<h5 class="mt-6 mb-4">{{ __('Get Started For Free') }}</h5>

										<a href="{{ route('register') }}" class="btn btn-primary pl-5 pr-5">{{ __('Sign Up Now') }}</a>

									</div> <!-- END CONNECTION & NEWS LINKS -->
								
								</div>


							</div> <!-- END FOOTER LINKS -->
							

						</div> <!-- END ROW -->

					</div> <!-- END CONTAINER-->



					<!-- COPYRIGHT INFORMATION -->
					<div id="copyright" class="container">
						
						<p class="copyright-left">Copyright © {{ date("Y") }} <a href="{{ config('app.url') }}">{{ config('app.name') }}</a> {{ __(' All rights reserved') }}</p>
						
						<div class="copyright-right">
							
								<div class="dropdown header-locale" id="frontend-local">
									<a class="nav-link icon" data-toggle="dropdown">
										<span class="header-icon fa fa-globe pr-2"></span><span class="fs-12">{{ Config::get('locale')[App::getLocale()]['code'] }}</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
										<div class="local-menu">
											@foreach (Config::get('locale') as $lang => $language)
												@if ($lang != App::getLocale())
													<a href="{{ route('locale', $lang) }}" class="dropdown-item d-flex">
														<div class="text-info"><i class="flag flag-{{ $language['flag'] }} mr-3"></i></div>
														<div>
															<span class="font-weight-normal fs-12">{{ $language['display'] }}</span>
														</div>
													</a>                                        
												@endif
											@endforeach
										</div>
									</div>
								</div>
							
						</div>

						<!-- SCROLL TO TOP -->
						<a href="#top" id="back-to-top"><i class="fa fa-angle-double-up"></i></a>

					</div>
					
				</footer> <!-- END FOOTER -->  

				@include('cookieConsent::index') 

			@endif
		
		@endif

		@include('layouts.footer-scripts-guest')

		<!-- Custom User JS File -->
		@if ($information['js'])
			<script src="{{URL::asset($information['js'])}}"></script>
		@endif
		
            
	</body>
</html>


