@extends('layouts.guest')

@section('css')
	<!-- Data Table CSS -->
	<link href="{{URL::asset('plugins/swiper/swiper.min.css')}}" rel="stylesheet" />
@endsection

@section('content')

        <section id="main-wrapper">
                    
            <div class="home-wrapper">
                <div class="oblique position-absolute h-100">
                    <div class="oblique-image h-100" style="background-image:url({{ URL::asset('img/files/image.jpg') }})"></div>
                </div> 
                
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-sm-12 d-flex justify-content-center flex-column">
                            <div class="text-container">
                                <h2>AI Powered <span>Medical Speech to Text</span> Converter</h2>
                                <p>Use machine learning to accurately transcribe medical terminologies from a various physician-patient conversation audio files </p>

                                <a href="{{ route('register') }}" class="btn btn-primary special-action-button">{{ __('Register Now') }}</a>

<!--                               <div class="vendors text-center">
                                    <h6>Powered By</h6>
                                    <span><img src="{{ URL::asset('img/csp/aws-sm.png') }}" alt=""></span>                                                                           
                                </div>
-->                               
                            </div>
                        </div>
                    </div>             
                </div>
            </div>

<div class="container small-feature-wrapper">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="mb-7">
                <div class="title">
                    <h6>Our <span>Services</span></h6>
                </div>
                <div class="text-container">
                    <h2>{{ __('Accurate Medical Transcription Simplified') }}</h2>
                </div>                            
            </div>
        </div>

        <div class="col-md-8 col-sm-12">
            <div class="row">
                <div class="col-md-6 col-sm-12 small-feature-box">
                    <div class="icon-wrapper">
                        <i class="icon-medical-i-interpreter-services"></i>
                    </div>
                    <h6>Physician-Patient Conversations</h6>
                    <p>Effortlessly convert complex medical discussions between doctors and patients into structured, accurate text for seamless documentation.</p>
                </div>
                <div class="col-md-6 col-sm-12 small-feature-box">
                    <div class="icon-wrapper">
                        <i class="icon-medical-i-medical-library"></i>
                    </div>
                    <h6>Clinical Documentation</h6>
                    <p>Streamline the creation of precise and detailed clinical records, reducing manual efforts and saving time for healthcare professionals.</p>
                </div>
                <div class="col-md-6 col-sm-12 small-feature-box">
                    <div class="icon-wrapper">
                        <i class="icon-medical-i-medical-records"></i>
                    </div>
                    <h6>Comprehensive Transcription Results</h6>
                    <p>Leverage advanced AI models to deliver consistent, reliable transcriptions that handle diverse medical terminologies with ease.</p>
                </div>
                <div class="col-md-6 col-sm-12 small-feature-box">
                    <div class="icon-wrapper">
                        <i class="icon-medical-i-waiting-area"></i>
                    </div>
                    <h6>24/7 Access from Anywhere</h6>
                    <p>Access your transcribed data anytime, from any device, ensuring continuity and flexibility for your medical practice.</p>
                </div>
            </div>
        </div>
    </div>
</div>



        <!-- SECTION - USE CASES
        ========================================================-->
<section id="cases-wrapper">

    <div class="container pt-9">

        <div class="row text-center mb-7">
            <div class="col-md-12 title">
                <h6><span>Diverse</span> {{ __('Use Cases') }}</h6>
                <p>{{ __('Designed to cater to a wide range of medical interactions') }}</p>
            </div>
        </div>

        <div class="row">

            <div class="blog-slider">
                <div class="blog-slider__wrp swiper-wrapper">

                    <div class="blog-slider__item swiper-slide">
                        <div class="blog-slider__img">
                            <img src="{{ URL::asset('img/blogs/image1.png') }}" alt="Primary Care">
                        </div>
                        <div class="blog-slider__content">
                            <span class="blog-slider__code">3 January 2022</span>
                            <div class="blog-slider__title">Primary Care Conversations</div>
                            <div class="blog-slider__text">Accurately transcribe interactions between primary care physicians and patients, ensuring critical information is captured for comprehensive care planning.</div>
                            <a href="#" class="blog-slider__button">READ MORE</a>
                        </div>
                    </div>
                
                    <div class="blog-slider__item swiper-slide">
                        <div class="blog-slider__img">                              
                            <img src="{{ URL::asset('img/blogs/image3.png') }}" alt="Specialty Care">
                        </div>
                        <div class="blog-slider__content">
                            <span class="blog-slider__code">31 August 2021</span>
                            <div class="blog-slider__title">Specialty Care Transcriptions</div>
                            <div class="blog-slider__text">Streamline transcription for specialty consultations such as cardiology, oncology, and neurology, enabling precise documentation of complex medical terms.</div>
                            <a href="#" class="blog-slider__button">READ MORE</a>
                        </div>
                    </div>

                    <div class="blog-slider__item swiper-slide">
                        <div class="blog-slider__img">
                            <img src="{{ URL::asset('img/blogs/image2.jpg') }}" alt="Pediatric Notes">
                        </div>
                        <div class="blog-slider__content">
                            <span class="blog-slider__code">5 September 2021</span>
                            <div class="blog-slider__title">Pediatric Care Notes</div>
                            <div class="blog-slider__text">Capture essential details from pediatric consultations to ensure accurate records and better coordination between healthcare providers and families.</div>
                            <a href="#" class="blog-slider__button">READ MORE</a>
                        </div>
                    </div>                                             
                  
                </div>

                <div class="blog-slider__pagination"></div>

            </div>

        </div>
        
    </div>

</section>



        <!-- SECTION - FEATURES
        ========================================================-->
<!-- SECTION - FEATURES
========================================================-->
<section id="features-wrapper">

    <div class="container">

        <div class="row text-center mb-7">
            <div class="col-md-12 title">
                <h6><span>Medical Speech to Text</span> {{ __('Benefits') }}</h6>
                <p>{{ __('Unlock the full potential of your medical transcription needs with cutting-edge features') }}</p>
            </div>
        </div>
        
        <div class="row">
            
            <!-- LIST OF SOLUTIONS -->
            <div class="row d-flex" id="solutions-list">
                
                <!-- SOLUTION -->
                <div class="col-lg-3 col-md-6 col-sm-12 mb-6">
                    <div class="solution">
                        <div class="solution-content">
                            <div class="solution-logo">
                                <i class="fa fa-magic"></i>
                            </div>
                            <h5>{{ __('Speaker Identification') }}</h5>
                            <p>Accurately distinguish between multiple speakers in physician-patient conversations to ensure seamless and precise documentation.</p>
                        </div>                         
                    </div>
                </div> <!-- END SOLUTION -->

                <!-- SOLUTION -->
                <div class="col-lg-3 col-md-6 col-sm-12 mb-6">
                    <div class="solution">
                        <div class="solution-content">
                            <div class="solution-logo">
                                <i class="mdi mdi-access-point"></i>
                            </div>
                            <h5>{{ __('Transcribe Up to 4 Hours of Audio') }}</h5>
                            <p>Easily process lengthy audio files to accommodate even the most detailed medical consultations and discussions.</p>
                        </div>
                    </div>
                </div> <!-- END SOLUTION -->

                <!-- SOLUTION -->
                <div class="col-lg-3 col-md-6 col-sm-12 mb-6">
                    <div class="solution">
                        <div class="solution-content">
                            <div class="solution-logo">
                                <i class="mdi mdi-audiobook"></i>
                            </div>
                            <h5>{{ __('Support for Various Audio Formats') }}</h5>
                            <p>Compatible with multiple audio file types, including MP3, WAV, and more, to ensure a seamless transcription experience.</p>
                        </div>
                    </div>
                </div> <!-- END SOLUTION -->

                <!-- SOLUTION -->
                <div class="col-lg-3 col-md-6 col-sm-12 mb-6">
                    <div class="solution">
                        <div class="solution-content">
                            <div class="solution-logo">
                                <i class="fa fa-magic"></i>
                            </div>
                            <h5>{{ __('Support for US English') }}</h5>
                            <p>Optimized for accurate transcription of US English medical terminology, ensuring reliable documentation.</p>
                        </div>
                    </div>
                </div> <!-- END SOLUTION -->

                <!-- SOLUTION -->
                <div class="col-lg-3 col-md-6 col-sm-12 mb-6">
                    <div class="solution">
                        <div class="solution-content">
                            <div class="solution-logo">
                                <i class="mdi mdi-upload-network"></i>
                            </div>
                            <h5>{{ __('Easy Transcript Downloads') }}</h5>
                            <p>Quickly download transcribed files in multiple formats for easy sharing and integration into your medical workflows.</p>
                        </div>                                
                    </div>
                </div> <!-- END SOLUTION -->

                <!-- SOLUTION -->
                <div class="col-lg-3 col-md-6 col-sm-12 mb-6">
                    <div class="solution">
                        <div class="solution-content">
                            <div class="solution-logo">
                                <i class="fa fa-google-wallet"></i>
                            </div>
                            <h5>{{ __('Identify Up to 7 Speakers') }}</h5>
                            <p>Effortlessly handle complex multi-speaker scenarios, enabling clear and structured transcriptions for team discussions.</p>
                        </div>
                    </div>
                </div> <!-- END SOLUTION -->

                <!-- SOLUTION -->
                <div class="col-lg-3 col-md-6 col-sm-12 mb-6">
                    <div class="solution">
                        <div class="solution-content">
                            <div class="solution-logo">
                                <i class="fa fa-th-large"></i>
                            </div>
                            <h5>{{ __('Group by Patient and Case Names') }}</h5>
                            <p>Organize transcripts efficiently by associating them with patient details and case names for seamless record management.</p>
                        </div>            
                    </div>
                </div> <!-- END SOLUTION -->

                <!-- SOLUTION -->
                <div class="col-lg-3 col-md-6 col-sm-12 mb-6">
                    <div class="solution">
                        <div class="solution-content">
                            <div class="solution-logo">
                                <i class="mdi mdi-account-alert"></i>
                            </div>
                            <h5>{{ __('Reliable Customer Support') }}</h5>
                            <p>Benefit from dedicated support to assist you with any questions or issues, ensuring uninterrupted usage of the platform.</p>
                        </div>
                    </div>
                </div> <!-- END SOLUTION -->
                
            </div> <!-- END LIST OF SOLUTIONS -->

        </div>

    </div>

</section>

        <!-- SECTION - CUSTOMER FEEDBACKS
        ========================================================-->
        <section id="feedbacks-wrapper">

            <div class="container pt-9 text-center">


                <!-- SECTION TITLE -->
                <div class="row mb-7">

                    <div class="title">
                        <h6>{{ __('Customer') }} <span>{{ __('Reviews') }}</span></h6>
                        <p>{{ __('We guarantee that you will be one of them as well') }}</p>
                    </div>

                </div> <!-- END SECTION TITLE -->

                
                <div class="row text-center">                    
                    

                    <!-- CUSTOMER FEEDBACKS -->
                    <div id="feedbacks">


                        <!-- FEEDBACK -->
                        <div class="feedback">						
                            
                            <!-- COMMENTER -->
                            <div class="feedback-image">
                                <img src="{{ URL::asset('img/feedback/feedback-1.jpg') }}" alt="Feedback" class="rounded-circle"><span class="fa fa-quote-left"></span>
                            </div>	
                            <p class="feedback-reviewer">Stella Mac Smith</p>
                            <p class="fs-12">Los Angeles - California</p>				
                            
                            <!-- MAIN COMMENT -->
                            <p class="comment"><sup><span class="fa fa-quote-left"></span></sup> Everything is perfect, CloudTranscribe saves me a ton of time to create audio for my text content, both for video and for audiobooks. <br /> Thanks so much for all your help! <sub><span class="fa fa-quote-right"></span></sub></p>
                            
                            <span>{{ __('Overall rating of our service') }}</span>
                            <ul>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                            </ul>

                        </div> <!-- END FEEDBACK -->



                        <!-- FEEDBACK -->
                        <div class="feedback">						
                            
                            <!-- COMMENTER -->
                            <div class="feedback-image">
                                <img src="{{ URL::asset('img/feedback/feedback-2.jpg') }}" alt="Feedback" class="rounded-circle"><span class="fa fa-quote-left"></span>
                            </div>	
                            <p class="feedback-reviewer">Tina Kandelaki</p>
                            <p class="fs-12">Campbridge - United Kingdom</p>				
                            
                            <!-- MAIN COMMENT -->
                            <p class="comment"><sup><span class="fa fa-quote-left"></span></sup> My favourite Speech to Text platform! User friendly interface, lot's of languages and voices available plus each one has various voice effects associated with them. <sub><span class="fa fa-quote-right"></span></sub></p>
                            
                            <span>{{ __('Overall rating of our service') }}</span>
                            <ul>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star-half-full"></li>
                            </ul>

                        </div> <!-- END FEEDBACK -->



                        <!-- FEEDBACK -->
                        <div class="feedback">						
                            
                            <!-- COMMENTER -->
                            <div class="feedback-image">
                                <img src="{{ URL::asset('img/feedback/feedback-3.jpg') }}" alt="Feedback" class="rounded-circle"><span class="fa fa-quote-left"></span>
                            </div>	
                            <p class="feedback-reviewer">San Sebastian</p>
                            <p class="fs-12">Bogota - Columbia</p>				
                            
                            <!-- MAIN COMMENT -->
                            <p class="comment"><sup><span class="fa fa-quote-left"></span></sup> One of the best platforms to use Speech to Text services. Availability of voices get's you existed! Highly recommended. <sub><span class="fa fa-quote-right"></span></sub></p>
                            
                            <span>{{ __('Overall rating of our service') }}</span>
                            <ul>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                            </ul>

                        </div> <!-- END FEEDBACK -->



                </div> <!-- END CUSTOMER FEEDBACKS -->


                    
                </div> <!-- END ROW -->
                
            </div> <!-- END CONTAINER -->

            <div class="container">

                <div class="row text-center position-relative action-call-wrapper">

                    <div id="action-call" class="w-100 h-100"></div>

                    <div class="col-md-12 action-content">
                        <h5 class="mb-4">{{ __('Try for Free') }}</h5>
                        <h4>{{ __('Try Medical Speech to Text Synthesize for Free') }}</h4>
                        <p class="mb-5">{{ __('You will receive free credits upon registration') }}</p>

                        <a href="{{ route('register') }}" class="btn btn-primary">{{ __('Sign Up Now') }}</a>
                        <p class="fs-10 mt-2">{{ __('No credit card required') }}</p>
                    </div>
                </div>
            </div>
            
        </section> <!-- END SECTION CUSTOMER FEEDBACK -->


        <!-- SECTION - CUSTOMER LOGO
        ========================================================-->
        <section id="logos-wrapper">
            <div class="container pb-9">

                <div class="row text-center mb-7">
                    <div class="col-md-12 title">
                        <h6>{{ __('We have all our customers trust') }}</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <img src="{{ URL::asset('img/files/customer-logo-1.png') }}" alt="">
                    </div>
                    <div class="col">
                        <img src="{{ URL::asset('img/files/customer-logo-2.png') }}" alt="">
                    </div>
                    <div class="col">
                        <img src="{{ URL::asset('img/files/customer-logo-3.png') }}" alt="">
                    </div>
                    <div class="col">
                        <img src="{{ URL::asset('img/files/customer-logo-4.png') }}" alt="">
                    </div>
                    <div class="col">
                        <img src="{{ URL::asset('img/files/customer-logo-5.png') }}" alt="">
                    </div>
                </div>
                
            </div>
        </section>

@endsection

@section('js')
     <!-- Custom js-->
     <script src="{{URL::asset('plugins/swiper/swiper.min.js')}}"></script>
     <script src="{{URL::asset('js/slick.min.js')}}"></script>
     <script src="{{URL::asset('js/frontend.js')}}"></script>
     
@endsection
        
        
       
        
       
    

