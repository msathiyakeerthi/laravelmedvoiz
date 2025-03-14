@extends('layouts.app')

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">3D Secure Verification</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{ route('user.stt.file') }}"><i class="fa fa-google-wallet mr-2 fs-12"></i>{{ __('User') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.subscriptions') }}"> {{ __('Subscriptions') }} </a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('Subscribe Now / Checkout') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')	
	<div class="row">
		<div class="col-md-6">
			<div class="card border-0 pt-2">
				<div class="card-body">			
					<div class="text-center">						
						<h6 class="mt-2">{{ __('Complete') }} <span class="text-info font-weight-bold">3D Secure</span> Verification</h6>

						<p class="fs-12 mt-3">{{ __('Please follow your bank additional security steps to complete the order') }}.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
		// Create a Stripe client.
		var stripe = Stripe('{{ config('services.stripe.api_key') }}');

		stripe.handleCardAction("{{ $clientSecret }}")
			.then(function(result){
				if (result.error) {
					window.location.replace("{{ route('user.payments.cancelled') }}");
				} else {
					window.location.replace("{{ route('user.payments.approved') }}");
				}
			});
	</script>
@endsection



