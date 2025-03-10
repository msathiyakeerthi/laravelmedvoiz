@extends('layouts.app')

@section('css')
	<!-- Data Table CSS -->
	<link href="{{URL::asset('plugins/awselect/awselect.min.css')}}" rel="stylesheet" />
@endsection

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">{{ __('Medical Transcribe Configuration') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-magic mr-2 fs-12"></i>{{ __('Admin') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.stt.dashboard') }}"> {{ __('Transcribe Management') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="#"> {{ __('Medical Transcribe Configuration') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection
@section('content')	
	<!-- ALL CSP CONFIGURATIONS -->					
	<div class="row">
		<div class="col-lg-8 col-md-12 col-xm-12">
			<div class="card overflow-hidden border-0">
				<div class="card-header">
					<h3 class="card-title">{{ __('Setup STT Configuration') }}</h3>
				</div>
				<div class="card-body">

					<!-- STT SETTINGS FORM -->					
					<form action="{{ route('admin.stt.configs.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						
						<div class="row">	
							<div class="col-lg-6 col-md-6 col-sm-12">							
								<div class="input-box">	
									<h6>{{ __('Speech Type') }} <span class="text-muted">({{ __('Default Mode') }})</span></h6>
			  						<select id="speaker-identification" name="speech-type" data-placeholder="Change speech type default mode">			
										<option value='DICTATION' @if ( config('stt.speech_type')  == 'DICTATION') selected @endif>Dictation</option>
										<option value='CONVERSATION' @if ( config('stt.speech_type')  == 'CONVERSATION') selected @endif>Conversation</option>
									</select>
								</div> 						
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="input-box">								
									<h6>{{ __('Allowed Audio File Formats') }} <span class="text-muted">({{ __('Comma Separated') }})</span> <i class="ml-2 fa fa-info info-notification" data-toggle="tooltip" data-placement="top" title="Supported audio formats: MP3 | MP4 | FLAC | WAV | OGG | WEBM | AMR."></i></h6>
									<div class="form-group">							    
										<input type="text" class="form-control @error('set-file-format') is-danger @enderror" id="set-file-format" name="set-file-format" placeholder="Ex: 10" value="{{ config('stt.file_format') }}" required>
										@error('set-file-format')
											<p class="text-danger">{{ $errors->first('set-file-format') }}</p>
										@enderror
									</div> 
								</div> 						
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="input-box">								
									<h6>{{ __('Maximum Audio File Size') }} <span class="text-muted">({{ __('in MB') }})</span> <span class="text-muted">({{ __('for User Group') }})</span> <i class="ml-2 fa fa-info info-notification" data-toggle="tooltip" data-placement="top" title="Maximum supported audio file size is 2GB. It is a hard limit set by AWS."></i></h6>
									<div class="form-group">							    
										<input type="text" class="form-control @error('set-max-size-user') is-danger @enderror" id="set-max-size-user" name="set-max-size-user" placeholder="Ex: 10" value="{{ config('stt.max_size_limit_user') }}" required>
										@error('set-max-size-user')
											<p class="text-danger">{{ $errors->first('set-max-size-user') }}</p>
										@enderror
									</div> 
								</div>						
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="input-box">								
									<h6>{{ __('Maximum Audio File Size') }} <span class="text-muted">({{ __('in MB') }})</span> <span class="text-muted">({{ __('for Subscriber & Admin Groups') }})</span> <i class="ml-2 fa fa-info info-notification" data-toggle="tooltip" data-placement="top" title="Maximum supported audio file size is 2GB. It is a hard limit set by AWS."></i></h6>
									<div class="form-group">							    
										<input type="text" class="form-control @error('set-max-size-subscriber') is-danger @enderror" id="set-max-size-subscriber" name="set-max-size-subscriber" placeholder="Ex: 10" value="{{ config('stt.max_size_limit_subscriber') }}" required>
										@error('set-max-size-subscriber')
											<p class="text-danger">{{ $errors->first('set-max-size-subscriber') }}</p>
										@enderror
									</div> 
								</div>						
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">	
								<div class="input-box">								
									<h6>{{ __('Maximum Audio File Length') }} <span class="text-muted">({{ __('in Minutes') }}) ({{ __('for User Group') }})</span> <i class="ml-2 fa fa-info info-notification" data-toggle="tooltip" data-placement="top" title="Maximum supported audio length is 240 minutes. It is a hard limit set by AWS."></i></h6>
									<div class="form-group">							    
										<input type="text" class="form-control @error('set-max-length-file-user') is-danger @enderror" id="set-max-length-file-user" name="set-max-length-file-user" placeholder="Ex: 10" value="{{ config('stt.max_length_limit_file_user') }}" required>
										@error('set-max-length-file-user')
											<p class="text-danger">{{ $errors->first('set-max-length-file-user') }}</p>
										@enderror
									</div> 
								</div> 						
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">	
								<div class="input-box">								
									<h6>{{ __('Maximum Audio File Length') }} <span class="text-muted">({{ __('in Minutes') }}) ({{ __('for Subscriber & Admin Groups') }})</span> <i class="ml-2 fa fa-info info-notification" data-toggle="tooltip" data-placement="top" title="Maximum supported audio length is 240 minutes. It is a hard limit set by AWS."></i></h6>
									<div class="form-group">							    
										<input type="text" class="form-control @error('set-max-length-file-subscriber') is-danger @enderror" id="set-max-length-file-subscriber" name="set-max-length-file-subscriber" placeholder="Ex: 10" value="{{ config('stt.max_length_limit_file_subscriber') }}" required>
										@error('set-max-length-file-subscriber')
											<p class="text-danger">{{ $errors->first('set-max-length-file-subscriber') }}</p>
										@enderror
									</div> 
								</div> 						
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">	
								<div class="input-box">								
									<h6>{{ __('Maximum Audio Record Length') }} <span class="text-muted">({{ __('in Minutes') }}) ({{ __('for User Group') }})</span> <i class="ml-2 fa fa-info info-notification" data-toggle="tooltip" data-placement="top" title="Maximum supported audio length is 240 minutes. It is a hard limit set by AWS."></i></h6>
									<div class="form-group">							    
										<input type="text" class="form-control @error('set-max-length-record-user') is-danger @enderror" id="set-max-length-record-user" name="set-max-length-record-user" placeholder="Ex: 10" value="{{ config('stt.max_length_limit_record_user') }}" required>
										@error('set-max-length-record-user')
											<p class="text-danger">{{ $errors->first('set-max-length-record-user') }}</p>
										@enderror
									</div> 
								</div> 						
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">	
								<div class="input-box">								
									<h6>{{ __('Maximum Audio Record Length') }} <span class="text-muted">({{ __('in Minutes') }}) ({{ __('for Subscriber & Admin Groups') }})</span> <i class="ml-2 fa fa-info info-notification" data-toggle="tooltip" data-placement="top" title="Maximum supported audio length is 240 minutes. It is a hard limit set by AWS."></i></h6>
									<div class="form-group">							    
										<input type="text" class="form-control @error('set-max-length-record-subscriber') is-danger @enderror" id="set-max-length-record-subscriber" name="set-max-length-record-subscriber" placeholder="Ex: 10" value="{{ config('stt.max_length_limit_record_subscriber') }}" required>
										@error('set-max-length-record-subscriber')
											<p class="text-danger">{{ $errors->first('set-max-length-record-subscriber') }}</p>
										@enderror
									</div> 
								</div> 						
							</div>															
						</div>

						<div class="card border-0 special-shadow">							
							<div class="card-body">
								<h6 class="fs-12 font-weight-bold mb-4"><i class="fa fa-gift text-info fs-14 fw-2"></i>Free Tier Options <span class="text-muted">({{ __('User Group') }})</span></h6>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6>{{ __('Allow Speaker Identification') }}</h6>
											<div class="form-group">							    
												<select id="speech-type" name="speech-type-user" data-placeholder="Allow or Speaker Identification Feature">			
													<option value="enable" @if ( config('stt.speech_type_user')  == 'enable') selected @endif>Enable</option>
													<option value="disable" @if ( config('stt.speech_type_user')  == 'disable') selected @endif>Disable</option>
												</select>
											</div> 
										</div> 						
									</div>		

									<div class="col-lg-6 col-md-6 col-sm-12">	
										<!-- FREE TIER MINUTES -->
										<div class="input-box">								
											<h6>{{ __('Free Welcome Minutes') }} <span class="text-muted">({{ __('For New Registered Users') }})</span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('free-minutes') is-danger @enderror" id="free-minutes" name="free-minutes" placeholder="Ex: 2000" value="{{ config('stt.free_minutes') }}" required>
												@error('free-minutes')
													<p class="text-danger">{{ $errors->first('free-minutes') }}</p>
												@enderror
											</div> 
										</div> <!-- END FREE TIER MINUTES -->							
									</div>
								</div>
							</div>
						</div>


						<div class="card border-0 special-shadow">							
							<div class="card-body">
								<h6 class="fs-12 font-weight-bold mb-4"><img src="{{URL::asset('img/csp/aws-sm.png')}}" class="fw-2 mr-2" alt="">Amazon Web Services</h6>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">								
										<!-- ACCESS KEY -->
										<div class="input-box">								
											<h6>AWS Access Key</h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('set-aws-access-key') is-danger @enderror" id="aws-access-key" name="set-aws-access-key" value="{{ config('services.aws.key') }}" autocomplete="off">
												@error('set-aws-access-key')
													<p class="text-danger">{{ $errors->first('set-aws-access-key') }}</p>
												@enderror
											</div> 
										</div> <!-- END ACCESS KEY -->
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<!-- SECRET ACCESS KEY -->
										<div class="input-box">								
											<h6>AWS Secret Access Key</h6> 
											<div class="form-group">							    
												<input type="text" class="form-control @error('set-aws-secret-access-key') is-danger @enderror" id="aws-secret-access-key" name="set-aws-secret-access-key" value="{{ config('services.aws.secret') }}" autocomplete="off">
												@error('set-aws-secret-access-key')
													<p class="text-danger">{{ $errors->first('set-aws-secret-access-key') }}</p>
												@enderror
											</div> 
										</div> <!-- END SECRET ACCESS KEY -->
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">								
										<!-- ACCESS KEY -->
										<div class="input-box">								
											<h6>Amazon S3 Bucket Name</small></h6>
											<div class="form-group">							    
												<input type="text" class="form-control @error('set-aws-bucket') is-danger @enderror" id="aws-bucket" name="set-aws-bucket" value="{{ config('services.aws.bucket') }}" autocomplete="off">
												@error('set-aws-bucket')
													<p class="text-danger">{{ $errors->first('set-aws-bucket') }}</p>
												@enderror
											</div> 
										</div> <!-- END ACCESS KEY -->
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<!-- AWS REGION -->
										<div class="input-box">	
											<h6>Set AWS Region</h6>
											  <select id="set-aws-region" name="set-aws-region" data-placeholder="Select Default AWS Region:">			
												<option value="us-east-1" @if ( config('services.aws.region')  == 'us-east-1') selected @endif>US East (N. Virginia) us-east-1</option>
												<option value="us-east-2" @if ( config('services.aws.region')  == 'us-east-2') selected @endif>US East (Ohio) us-east-2</option>
												<option value="us-west-1" @if ( config('services.aws.region')  == 'us-west-1') selected @endif>US West (N. California) us-west-1</option>
												<option value="us-west-2" @if ( config('services.aws.region')  == 'us-west-2') selected @endif>US West (Oregon) us-west-2</option>
												<option value="ap-east-1" @if ( config('services.aws.region')  == 'ap-east-1') selected @endif>Asia Pacific (Hong Kong) ap-east-1</option>
												<option value="ap-south-1" @if ( config('services.aws.region')  == 'ap-south-1') selected @endif>Asia Pacific (Mumbai) ap-south-1</option>
												<option value="ap-northeast-3" @if ( config('services.aws.region')  == 'ap-northeast-3') selected @endif>Asia Pacific (Osaka-Local) ap-northeast-3</option>
												<option value="ap-northeast-2" @if ( config('services.aws.region')  == 'ap-northeast-2') selected @endif>Asia Pacific (Seoul) ap-northeast-2</option>
												<option value="ap-southeast-1" @if ( config('services.aws.region')  == 'ap-southeast-1') selected @endif>Asia Pacific (Singapore) ap-southeast-1</option>
												<option value="ap-southeast-2" @if ( config('services.aws.region')  == 'ap-southeast-2') selected @endif>Asia Pacific (Sydney) ap-southeast-2</option>
												<option value="ap-northeast-1" @if ( config('services.aws.region')  == 'ap-northeast-1') selected @endif>Asia Pacific (Tokyo) ap-northeast-1</option>
												<option value="eu-central-1" @if ( config('services.aws.region')  == 'eu-central-1') selected @endif>Europe (Frankfurt) eu-central-1</option>
												<option value="eu-west-1" @if ( config('services.aws.region')  == 'eu-west-1') selected @endif>Europe (Ireland) eu-west-1</option>
												<option value="eu-west-2" @if ( config('services.aws.region')  == 'eu-west-2') selected @endif>Europe (London) eu-west-2</option>
												<option value="eu-south-1" @if ( config('services.aws.region')  == 'eu-south-1') selected @endif>Europe (Milan) eu-south-1</option>
												<option value="eu-west-3" @if ( config('services.aws.region')  == 'eu-west-3') selected @endif>Europe (Paris) eu-west-3</option>
												<option value="eu-north-1" @if ( config('services.aws.region')  == 'eu-north-1') selected @endif>Europe (Stockholm) eu-north-1</option>
												<option value="me-south-1" @if ( config('services.aws.region')  == 'me-south-1') selected @endif>Middle East (Bahrain) me-south-1</option>
												<option value="sa-east-1" @if ( config('services.aws.region')  == 'sa-east-1') selected @endif>South America (São Paulo) sa-east-1</option>
												<option value="ca-central-1" @if ( config('services.aws.region')  == 'ca-central-1') selected @endif>Canada (Central) ca-central-1</option>
												<option value="af-south-1" @if ( config('services.aws.region')  == 'af-south-1') selected @endif>Africa (Cape Town) af-south-1</option>
											</select>
										</div> <!-- END AWS REGION -->									
									</div>									
		
								</div>
	
							</div>
						</div>	

						<!-- SAVE CHANGES ACTION BUTTON -->
						<div class="border-0 text-right mb-2 mt-1">
							<a href="{{ route('admin.stt.dashboard') }}" class="btn btn-cancel mr-2">{{ __('Cancel') }}</a>
							<button type="submit" class="btn btn-primary">{{ __('Save') }}</button>							
						</div>				

					</form>
					<!-- END STT SETTINGS FORM -->
				</div>
			</div>
		</div>
	</div>
	<!-- END ALL CSP CONFIGURATIONS -->	
@endsection

@section('js')
	<!-- Awselect JS -->
	<script src="{{URL::asset('plugins/awselect/awselect-custom.js')}}"></script>
	<script src="{{URL::asset('js/awselect.js')}}"></script>
@endsection