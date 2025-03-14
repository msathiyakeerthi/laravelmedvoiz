@extends('layouts.app')

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">{{ __('Show Payment Details') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-google-wallet mr-2 fs-12"></i>{{ __('Admin') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.finance.dashboard') }}"> {{ __('Finance Management') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.finance.payments') }}"> {{ __('All Payments') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="#"> {{ __('Show Payment') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')						
	<div class="row">
		<div class="col-lg-6 col-md-6 col-xm-12">
			<div class="card overflow-hidden border-0">
				<div class="card-header">
					<h3 class="card-title">{{ __('Payment') }} ID: <span class="text-info">{{ $id->order_id }}</span></h3>
				</div>
				<div class="card-body pt-5">		

					<div class="row">
						<div class="col-lg-4 col-md-4 col-12">
							<h6 class="font-weight-bold mb-1">{{ __('Transaction Date') }}: </h6>
							<span class="fs-14">{{ $id->created_at }}</span>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<h6 class="font-weight-bold mb-1">{{ __('Plan Type') }}: </h6>
							<span class="fs-14">{{ ucfirst($id->plan_type) }}</span>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<h6 class="font-weight-bold mb-1">{{ __('Price') }} ({{ config('payment.default_system_currency') }}): </h6>
							<span class="fs-14">{!! config('payment.default_system_currency_symbol') !!}{{ ucfirst($id->amount) }}</span>
						</div>
					</div>

					<div class="row pt-5">
						<div class="col-lg-4 col-md-4 col-12">
							<h6 class="font-weight-bold mb-1">{{ __('Package Name') }}: </h6>
							<span class="fs-14">{{ $id->plan_name }}</span>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<h6 class="font-weight-bold mb-1">{{ __('Minutes Included') }}: </h6>
							<span class="fs-14">{{ number_format($id->minutes) }}</span>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<h6 class="font-weight-bold mb-1">{{ __('Paid By') }}: </h6>
							<span class="fs-14">{{ $id->gateway }}</span>
						</div>
						<div class="col-lg-4 col-md-4 col-12 pt-5">
							<h6 class="font-weight-bold mb-1">{{ __('User Full Name') }}: </h6>
							<span class="fs-14">{{ $user->name }}</span>
						</div>
						<div class="col-lg-4 col-md-4 col-12 pt-5">
							<h6 class="font-weight-bold mb-1">{{ __('User Email') }}: </h6>
							<span class="fs-14">{{ $user->email }}</span>
						</div>
						<div class="col-lg-4 col-md-4 col-12 pt-5">
							<h6 class="font-weight-bold mb-1">{{ __('User Country') }}: </h6>
							<span class="fs-14">{{ $user->country }}</span>
						</div>
						<div class="col-lg-4 col-md-4 col-12 pt-5">
							<h6 class="font-weight-bold mb-1">{{ __('Discount Applied') }} ({{ config('payment.default_system_currency') }}): </h6>
							<span class="fs-14">{!! config('payment.default_system_currency_symbol') !!}{{ $id->discount }}</span>
						</div>
						<div class="col-lg-4 col-md-4 col-12 pt-5">
							<h6 class="font-weight-bold mb-1">{{ __('Status') }}: </h6>
							<span class="fs-14">{{ $id->status }}</span>
						</div>
					</div>	

					<div class="row pt-7">
						<div class="col-12">
							<a href="{{ route('user.payments.invoice.show', $id) }}" class="btn btn-primary w-110">{{ __('Get Invoice') }}</a>						
						</div>
					</div>	

					<!-- SAVE CHANGES ACTION BUTTON -->
					<div class="border-0 text-right mb-2 mt-7">
						<a href="{{ route('admin.finance.payments') }}" class="btn btn-primary">{{ __('Return') }}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

