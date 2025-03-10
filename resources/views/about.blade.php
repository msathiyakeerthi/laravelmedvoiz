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
                            <h6><span>{{ __('About') }}</span> {{ __('Us') }}</h6>
                            <p>{{ __('Who we are?') }}</p>
                        </div>

                    </div> <!-- END SECTION TITLE -->
                </div>
            </div>
        </div>
    </div>

    <section id="about-wrapper">

        <div class="container pt-9">         

                
            <!-- ABOUT US-->
            <div class="row d-flex" id="about-us">
                

                <!-- ABOUT TITLE -->
                <div class="col-md-6" id="about-title">
                    
                    <div class="title">
                        <h6>{{ __('Transcribe Audio with') }} <span>{{ config('app.name') }}</span></h6>
                        <p class="p-about">{{ __('We make to text to speech conversion easier and quicker') }}</p>
                    </div>

                    <img class="w-70" src="{{ URL::asset('img/files/home-1.jpg') }}" alt="">

                </div> <!-- END ABOUT TITLE -->


<!-- ABOUT INFORMATION -->
<div class="col-md-6" id="about-info">

    <p>Our platform leverages cutting-edge AI technology to transform physician-patient conversations into accurate, structured medical documentation. Designed to handle complex medical terminology, it streamlines the transcription process, saving time and improving efficiency for healthcare professionals.</p>
    
    <p>We prioritize precision, flexibility, and ease of use, ensuring that medical practitioners can focus on delivering exceptional care while we handle the transcription complexities. Whether for clinical documentation, specialty care notes, or multi-speaker scenarios, our solution adapts to your unique needs.</p>

    <a href="{{ route('contact.show') }}">{{ __('Contact Us') }}</a>

</div> <!-- END ABOUT INFORMATION -->

            

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
