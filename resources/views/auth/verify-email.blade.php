@extends('layouts.auth')

@section('content')
<div class="container-fluid justify-content-center">
    <div class="row h-100vh align-items-center background-white">
        <div class="col-md-6 col-sm-12 text-center background-special h-100 align-middle">
            <img class="img-fluid" src="https://www.pixinvent.com/demo/frest-bootstrap-laravel-admin-dashboard-template/demo-1/images/pages/login.png" alt="branding logo">
        </div>

        <div class="col-md-6 col-sm-12 h-100">      
            <div class="row justify-content-center">
                <div class="col-md-8 col-sm-10">           
                    <div class="card-body pt-10">               
                        
                        <h3 class="text-center font-weight-bold mb-8">Welcome to <span class="text-info">{{ config('app.name') }}</span></h3>
                        
                        <form method="POST" action="{{ route('verification.send') }}" id="verify-email">
                            @csrf                      
                            
                            @if (session('status') == 'verification-link-sent')
                                <div class="alert alert-login alert-success mb-8"> 
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{ __('A new verification link has been sent to the email address.') }}
                                </div>
                            @endif

                            <div class="mb-6 fs-14">
                                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                            </div>

                            <div class="form-group mb-0 text-center">                        
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Resend Verification Email') }}</button>                                                                         
                            </div>
                        
                        </form>
                        
                        <div class="text-center">
                            <p class="fs-10 text-muted mt-2">or <a class="text-info" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></p> 
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                    </div>  
                </div>
            </div>

            <footer class="footer" id="login-footer">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-sm-12 fs-10 text-muted text-center">
                            Copyright © {{ date("Y") }} <a href="{{ config('app.url') }}">{{ config('app.name') }}</a>. All rights reserved
                        </div>
                    </div>
                </div>
            </footer>       
        </div>
    </div>
</div>
@endsection
