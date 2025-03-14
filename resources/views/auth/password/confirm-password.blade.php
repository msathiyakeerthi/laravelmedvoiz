@extends('layouts.auth')

@section('content')
<div class="container-fluid justify-content-center">
    <div class="row h-100vh align-items-center background-white">
        <div class="col-md-6 col-sm-12 text-center background-special h-100 align-middle pl-0 pr-0" id="login-background">
            <div class="login-bg">
                <div class="container">
                    <div class="row h-100vh align-items-center">
                        <div class="col-md-12">
                            <h4>Make Audio Transcription Fun & Easy</h4>
                            <h4>Get Started Now</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 h-100" id="login-responsive"> 
            <div class="row justify-content-center auth">
                <div class="col-md-8 col-sm-10">                
                    <div class="card-body pt-10">

                        <h3 class="text-center font-weight-bold mb-8">Welcome to <span class="text-info"><a href="{{ url('/') }}">{{ config('app.name') }}</a></span></h3>
                        
                        @if ($message = Session::get('success'))
                            <div class="alert alert-login alert-success"> 
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong><i class="fa fa-check-circle"></i> {{ $message }}</strong>
                            </div>
                            @endif

                            @if ($message = Session::get('error'))
                            <div class="alert alert-login alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong><i class="fa fa-exclamation-triangle"></i> {{ $message }}</strong>
                            </div>
                        @endif

                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                        </div>

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf       

                            <div class="input-box">                            
                                <label for="password" class="fs-12 font-weight-bold text-md-right">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror                            
                            </div>
                            
                            <div class="form-group mb-0 text-center">                        
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Confirm') }}</button>                                                     
                            </div>

                        </form>
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
