@extends('layouts.guest')

@section('css')
	<!-- Data Table CSS -->
	<link href="{{URL::asset('plugins/awselect/awselect.min.css')}}" rel="stylesheet" />
@endsection

@section('content')

    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="section-title">
                    <!-- SECTION TITLE -->
                    <div class="text-center mb-9 mt-9" id="contact-row">

                        <div class="title">
                            <h6><span>{{ __('Medical Speech to Text') }}</span> {{ __('Blogs') }}</h6>
                            <p>{{ __('Read our unique blog articles about various speech to text use cases and secrets') }}</p>
                        </div>

                    </div> <!-- END SECTION TITLE -->
                </div>
            </div>
        </div>
    </div>

    <section id="blog-wrapper">

        <div class="container pt-9">

            <div class="row justify-content-md-center">

                @if ($blog_exists)

                    @foreach ( $blogs as $blog )
                        <div class="col-md-4 col-sm-12 mb-6">
                            <div class="blog-box">
                                <a href="{{ route('blogs.show', $blog->url) }}"><img src="{{ URL::asset($blog->image) }}" alt="Blog Image"></a>
                                <div class="blog-info">
                                    <h6 class="fs-12"><i class="mdi mdi-account-edit mr-2"></i>{{ $blog->created_by }}</h6>
                                    <h6 class="fs-12"><i class="mdi mdi-alarm mr-2"></i>{{ date('F j, Y', strtotime($blog->created_at)) }}</h6>
                                    <h6 class="fs-14 font-weight-bold">{{ $blog->title }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @else
                    <div class="row text-center">
                        <div class="col-sm-12 mt-6 mb-6">
                            <h6 class="fs-12 font-weight-bold text-center">{{ __('No blog articles were published yet') }}</h6>
                        </div>
                    </div>
                @endif
     
            </div>        
        </div>

    </section>
@endsection

@section('js')
	<!-- Awselect JS -->
	<script src="{{URL::asset('plugins/awselect/awselect.min.js')}}"></script>
	<script src="{{URL::asset('js/awselect.js')}}"></script>

    @if (config('services.google.recaptcha.enable') == 'on')
         <!-- Google reCaptcha JS -->
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.google.recaptcha.site_key') }}"></script>
        <script>
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ config('services.google.recaptcha.site_key') }}', {action: 'contact'}).then(function(token) {
                    if (token) {
                    document.getElementById('recaptcha').value = token;
                    }
                });
            });
        </script>
    @endif
   
@endsection
