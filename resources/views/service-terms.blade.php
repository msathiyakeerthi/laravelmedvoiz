@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="section-title">
                    <!-- SECTION TITLE -->
                    <div class="text-center mb-9 mt-9" id="contact-row">
                        <div class="title">
                            <h6><span>{{ __('Terms of Service') }}</span></h6>
                            <p>{{ __('Please carefully review the terms and conditions for using the Medvoiz Platform.') }}</p>
                        </div>
                    </div> <!-- END SECTION TITLE -->
                </div>
            </div>
        </div>
    </div>

    <section id="terms-wrapper">
        <div class="container">
            <div class="row justify-content-center background-white">
                <div class="col-md-10 col-sm-12 policy">                
                    <div class="card-body pt-10">            

                        <!-- HEADER -->
                        <div class="mb-4">
                            <h5>TERMS OF SERVICE</h5>
                            <p>
                                These Terms of Service (this “Agreement”) are entered into by and between Medvoiz, Inc., a [State of Incorporation] corporation (“Medvoiz”), 
                                and the entity or person accessing or using the Medvoiz Platform (“Customer”). This Agreement consists of the terms and conditions 
                                set forth below and any Order Forms that reference this Agreement. If you are accessing or using the Medvoiz Platform on behalf of your 
                                company, you represent that you are authorized to accept this Agreement on behalf of your company, and all references to “you” reference your company.
                            </p>
                            <p>
                                BY INDICATING YOUR ACCEPTANCE OF THIS AGREEMENT OR ACCESSING OR USING THE MEDVOIZ PLATFORM, YOU ARE AGREEING TO BE BOUND BY ALL TERMS, CONDITIONS AND NOTICES CONTAINED OR REFERENCED IN THIS AGREEMENT. IF YOU DO NOT AGREE TO THIS AGREEMENT, PLEASE DO NOT USE THE MEDVOIZ PLATFORM.
                            </p>
                        </div>

                        <!-- SECTION 1: DEFINITIONS -->
                        <div class="mb-4">
                            <h6>1. Definitions</h6>
                            <p>
                                <strong>“Affiliates”</strong> means an entity that directly or indirectly Controls, is Controlled by, or is under common Control with another entity...
                            </p>
                            <p>
                                <strong>“Confidential Information”</strong> means any information or data disclosed by either party that is marked or otherwise designated as confidential or proprietary...
                            </p>
                            <p>
                                <strong>“Documentation”</strong> refers to printed and digital instructions, help files, and technical guides provided by Medvoiz for its platform.
                            </p>
                        </div>

                        <!-- SECTION 2: PLATFORM USAGE -->
                        <div class="mb-4">
                            <h6>2. Medvoiz Platform Usage</h6>
                            <p>
                                <strong>2.1 Provision of Services:</strong> Medvoiz will provide access to its platform as described in the relevant order forms, and grants the Customer a non-exclusive, non-transferable right to use the services.
                            </p>
                            <p>
                                <strong>2.2 Data Security:</strong> Medvoiz maintains industry-standard security measures to protect Customer data.
                            </p>
                            <p>
                                <strong>2.3 Customer Responsibilities:</strong> Customers are responsible for ensuring compliance with applicable laws and ensuring the accuracy of any data they input into the platform.
                            </p>
                        </div>

                        <!-- SECTION 3: FEES -->
                        <div class="mb-4">
                            <h6>3. Fees</h6>
                            <p>
                                <strong>3.1 Payment:</strong> Fees must be paid according to the terms outlined in the applicable order form. Payments are non-refundable unless specified otherwise.
                            </p>
                            <p>
                                <strong>3.2 Taxes:</strong> Customers are responsible for any applicable taxes, except for taxes based on Medvoiz's income.
                            </p>
                        </div>

                        <!-- SECTION 4: PROPRIETARY RIGHTS -->
                        <div class="mb-4">
                            <h6>4. Proprietary Rights</h6>
                            <p>
                                Medvoiz retains all rights, title, and interest in its platform and associated technologies. Customers retain ownership of their data but grant Medvoiz a license to use the data solely to provide the services.
                            </p>
                        </div>

                        <!-- SECTION 5: WARRANTIES AND DISCLAIMERS -->
                        <div class="mb-4">
                            <h6>5. Warranties and Disclaimers</h6>
                            <p>
                                Medvoiz provides its services "as is" and disclaims all implied warranties, including but not limited to fitness for a particular purpose and non-infringement.
                            </p>
                        </div>

                        <!-- SECTION 6: INDEMNIFICATION -->
                        <div class="mb-4">
                            <h6>6. Indemnification</h6>
                            <p>
                                <strong>6.1 By Medvoiz:</strong> Medvoiz will indemnify the Customer against claims that the platform infringes on intellectual property rights, subject to certain limitations.
                            </p>
                            <p>
                                <strong>6.2 By Customer:</strong> Customers will indemnify Medvoiz against claims arising from the misuse of the platform or violation of applicable laws.
                            </p>
                        </div>

                        <!-- SECTION 7: LIMITATION OF LIABILITY -->
                        <div class="mb-4">
                            <h6>7. Limitation of Liability</h6>
                            <p>
                                Neither party will be liable for indirect, consequential, or incidental damages. Direct damages will be limited to the fees paid by the Customer in the last 12 months.
                            </p>
                        </div>

                        <!-- SECTION 8: TERMINATION -->
                        <div class="mb-4">
                            <h6>8. Termination</h6>
                            <p>
                                Either party may terminate the agreement for cause or non-renewal. Upon termination, the Customer will lose access to the platform, and data will be handled as per the agreement.
                            </p>
                        </div>

                        <!-- SECTION 9: GENERAL TERMS -->
                        <div class="mb-4">
                            <h6>9. General Terms</h6>
                            <p>
                                <strong>9.1 Governing Law:</strong> This agreement is governed by the laws of [State].
                            </p>
                            <p>
                                <strong>9.2 Force Majeure:</strong> Neither party will be liable for failure to perform due to circumstances beyond their control.
                            </p>
                        </div>

                        <!-- ACCEPTANCE -->
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
