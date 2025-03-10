@extends('layouts.guest')

@section('content')

    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="section-title">
                    <!-- SECTION TITLE -->
                    <div class="text-center mb-9 mt-9" id="contact-row">
                        <div class="title pt-7">
                            <h6><span>{{ __('FAQs') }}</span></h6>
                            <p>{{ __('Got questions? We have all answers for you.') }}</p>
                        </div>
                    </div> <!-- END SECTION TITLE -->
                </div>
            </div>
        </div>
    </div>

    <section id="faq-wrapper">
        <div class="container pt-6">
            <div class="row justify-content-md-center">

                <!-- General Questions -->
                <div class="col-md-10 col-sm-12">
                    <h6 class="faq-category">General Questions</h6>
                    <div id="accordion-general">
                        <div class="card">
                            <div class="card-header" id="heading-general-1">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-general-1" aria-expanded="false" aria-controls="collapse-general-1">
                                        What is the Medvoiz platform?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse-general-1" class="collapse" aria-labelledby="heading-general-1" data-parent="#accordion-general">
                                <div class="card-body">
                                    Medvoiz is an AI-powered transcription and documentation platform designed to assist healthcare professionals in generating accurate medical records from conversations.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-general-2">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-general-2" aria-expanded="false" aria-controls="collapse-general-2">
                                        Who can use Medvoiz?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse-general-2" class="collapse" aria-labelledby="heading-general-2" data-parent="#accordion-general">
                                <div class="card-body">
                                    Medvoiz is intended for healthcare professionals, including doctors, nurses, and administrative staff, who require efficient tools for medical documentation and transcription.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pricing Questions -->
                <div class="col-md-10 col-sm-12">
                    <h6 class="faq-category">Pricing & Subscriptions</h6>
                    <div id="accordion-pricing">
                        <div class="card">
                            <div class="card-header" id="heading-pricing-1">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-pricing-1" aria-expanded="false" aria-controls="collapse-pricing-1">
                                        How much does Medvoiz cost?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse-pricing-1" class="collapse" aria-labelledby="heading-pricing-1" data-parent="#accordion-pricing">
                                <div class="card-body">
                                    Medvoiz offers various subscription plans based on usage and features. Contact our sales team for a customized quote that fits your needs.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-pricing-2">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-pricing-2" aria-expanded="false" aria-controls="collapse-pricing-2">
                                        Are there any free trials available?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse-pricing-2" class="collapse" aria-labelledby="heading-pricing-2" data-parent="#accordion-pricing">
                                <div class="card-body">
                                    Yes, Medvoiz offers a 14-day free trial to help you evaluate our platform's features and benefits.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Technical Questions -->
                <div class="col-md-10 col-sm-12">
                    <h6 class="faq-category">Technical Support</h6>
                    <div id="accordion-technical">
                        <div class="card">
                            <div class="card-header" id="heading-technical-1">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-technical-1" aria-expanded="false" aria-controls="collapse-technical-1">
                                        What devices are compatible with Medvoiz?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse-technical-1" class="collapse" aria-labelledby="heading-technical-1" data-parent="#accordion-technical">
                                <div class="card-body">
                                    Medvoiz is compatible with desktops, laptops, tablets, and smartphones running modern browsers. Mobile apps are also available for Android and iOS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-technical-2">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-technical-2" aria-expanded="false" aria-controls="collapse-technical-2">
                                        How secure is Medvoiz?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse-technical-2" class="collapse" aria-labelledby="heading-technical-2" data-parent="#accordion-technical">
                                <div class="card-body">
                                    Medvoiz employs industry-standard encryption and complies with HIPAA regulations to ensure the security and privacy of your data.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account Management -->
                <div class="col-md-10 col-sm-12">
                    <h6 class="faq-category">Account Management</h6>
                    <div id="accordion-account">
                        <div class="card">
                            <div class="card-header" id="heading-account-1">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-account-1" aria-expanded="false" aria-controls="collapse-account-1">
                                        How do I reset my password?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse-account-1" class="collapse" aria-labelledby="heading-account-1" data-parent="#accordion-account">
                                <div class="card-body">
                                    You can reset your password by clicking "Forgot Password" on the login page and following the instructions sent to your email.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-account-2">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-account-2" aria-expanded="false" aria-controls="collapse-account-2">
                                        Can I change my subscription plan?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse-account-2" class="collapse" aria-labelledby="heading-account-2" data-parent="#accordion-account">
                                <div class="card-body">
                                    Yes, you can upgrade or downgrade your subscription plan at any time through your account settings or by contacting customer support.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Usage Questions -->
                <div class="col-md-10 col-sm-12">
                    <h6 class="faq-category">Using Medvoiz</h6>
                    <div id="accordion-usage">
                        <div class="card">
                            <div class="card-header" id="heading-usage-1">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-usage-1" aria-expanded="false" aria-controls="collapse-usage-1">
                                        How do I start a transcription session?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse-usage-1" class="collapse" aria-labelledby="heading-usage-1" data-parent="#accordion-usage">
                                <div class="card-body">
                                    To start a transcription session, log in, navigate to the "New Transcription" section, and press the "Start Recording" button. The system will guide you from there.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-usage-2">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-usage-2" aria-expanded="false" aria-controls="collapse-usage-2">
                                        Can Medvoiz transcribe multiple speakers?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse-usage-2" class="collapse" aria-labelledby="heading-usage-2" data-parent="#accordion-usage">
                                <div class="card-body">
                                    Yes, Medvoiz can differentiate between multiple speakers and label them in the transcription for clarity.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@endsection
