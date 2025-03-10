@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="section-title">
                    <!-- SECTION TITLE -->
                    <div class="text-center mb-9 mt-9" id="contact-row">
                        <div class="title">
                            <h6><span>{{ __('Privacy Policy') }}</span></h6>
                            <p>{{ __('Last Updated: March 5, 2024') }}</p>
                        </div>
                    </div> <!-- END SECTION TITLE -->
                </div>
            </div>
        </div>
    </div>
    
    <section id="privacy-wrapper">
        <div class="container background-white">
            <div class="row justify-content-center background-white">
                <div class="col-md-8 col-sm-12 policy">                
                    <div class="card-body pt-10">

                        <!-- Our Policy -->
                        <div class="mb-4">
                            <h4>{{ __('Our Policy') }}</h4>
                            <p class="fs-12 text-justify">
                                {{ __('Welcome to the web site(s) (the “Site” or “Sites”) or mobile apps (the “Apps”) of Starzmeet, Inc. (“Company,” “we,” “us,” and/or “our”). This Site is operated by Suki AI and is created to provide information about our physician support services, mobile applications, and related products (together with the Sites and/or Apps, the “Services”). This Privacy Policy outlines the Company’s practices regarding information collection, use, and protection.') }}
                            </p>
                        </div>

                        <!-- What This Policy Covers -->
                        <div class="mb-4">
                            <h4>{{ __('What This Policy Covers') }}</h4>
                            <p class="fs-12 text-justify">
                                {{ __('This Privacy Policy covers the collection, use, and disclosure of information about identifiable individuals (“Personal Data”). It does not include aggregate, non-identifiable information. Customers are responsible for maintaining their own privacy policies and securing necessary authorizations before sharing data with us.') }}
                            </p>
                        </div>

                        <!-- Information We Collect -->
                        <div class="mb-4">
                            <h4>{{ __('Information We Collect') }}</h4>
                            <p class="fs-12 text-justify">
                                <strong>{{ __('Practice Users:') }}</strong> {{ __('We collect contact and registration information to provide Services to medical practices.') }}
                            </p>
                            <p class="fs-12 text-justify">
                                <strong>{{ __('Prospective Customers:') }}</strong> {{ __('We collect business contact information about prospective customers through third-party services.') }}
                            </p>
                            <p class="fs-12 text-justify">
                                <strong>{{ __('Personal Data Provided:') }}</strong> {{ __('When you voluntarily provide data such as name, email, and inquiries, we use it to respond and improve our Services.') }}
                            </p>
                        </div>

                        <!-- Non-Identifiable Data -->
                        <div class="mb-4">
                            <h4>{{ __('Other Information') }}</h4>
                            <p class="fs-12 text-justify">
                                {{ __('We collect non-identifiable data, such as cookies and log files, to analyze trends, administer the Services, and improve quality.') }}
                            </p>
                        </div>

                        <!-- Cookies -->
                        <div class="mb-4">
                            <h4>{{ __('Cookies') }}</h4>
                            <p class="fs-12 text-justify">
                                {{ __('Our cookies enhance functionality and provide analytical insights. You can disable cookies in your browser settings, but doing so may impact your experience.') }}
                            </p>
                        </div>

                        <!-- Use of Data -->
                        <div class="mb-4">
                            <h4>{{ __('Our Use of Your Personal Data and Other Information') }}</h4>
                            <p class="fs-12 text-justify">
                                {{ __('We use your data to authenticate access, improve functionality, personalize content, and send updates. For marketing communications, we provide opt-out options.') }}
                            </p>
                        </div>

                        <!-- Disclosure -->
                        <div class="mb-4">
                            <h4>{{ __('Our Disclosure of Your Personal Data and Other Information') }}</h4>
                            <p class="fs-12 text-justify">
                                {{ __('We may share your data with service providers, business partners, and for legal compliance. Protected Health Information (PHI) is handled under strict HIPAA regulations.') }}
                            </p>
                        </div>

                        <!-- Retention -->
                        <div class="mb-4">
                            <h4>{{ __('Retention') }}</h4>
                            <p class="fs-12 text-justify">
                                {{ __('We retain Personal Data as long as necessary for business, legal, and analytical purposes. Data no longer required is securely deleted.') }}
                            </p>
                        </div>

                        <!-- Children -->
                        <div class="mb-4">
                            <h4>{{ __('Children') }}</h4>
                            <p class="fs-12 text-justify">
                                {{ __('Our Services are not intended for children under 13. If we receive data from a child, we will take steps to delete it.') }}
                            </p>
                        </div>

                        <!-- Security -->
                        <div class="mb-4">
                            <h4>{{ __('Security') }}</h4>
                            <p class="fs-12 text-justify">
                                {{ __('We implement reasonable security measures to protect your data but cannot guarantee complete security for internet transmissions.') }}
                            </p>
                        </div>

                        <!-- Changes -->
                        <div class="mb-4">
                            <h4>{{ __('Changes to This Policy') }}</h4>
                            <p class="fs-12 text-justify">
                                {{ __('This Privacy Policy may be updated periodically. Continued use of our Services constitutes agreement to the updated terms.') }}
                            </p>
                        </div>

                        <!-- Contact -->
                        <div class="mb-4">
                            <h4>{{ __('Contact Us') }}</h4>
                            <p class="fs-12 text-justify">
                                {{ __('For questions or concerns about this Privacy Policy, contact us at info@medvoiz.com.') }}
                            </p>
                        </div>

                        <!-- Call to Action -->
                        <div class="form-group mt-6 text-center">                        
                            <a href="{{ route('register') }}" class="btn btn-primary mr-2">{{ __('I Agree, Let\'s Sign Up') }}</a> 
                            <a href="{{ route('login') }}" class="btn btn-primary mr-2">{{ __('I Agree, Let\'s Login') }}</a>                               
                        </div>
                    
                    </div>        
                </div>
            </div>
        </div>
    </section>
@endsection
