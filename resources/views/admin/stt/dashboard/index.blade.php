@extends('layouts.app')

@section('page-header')
	<!--PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">{{ __('Medical Transcribe Dashboard') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-magic mr-2 fs-12"></i>{{ __('Admin') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.stt.dashboard') }}"> {{ __('Transcribe Management') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="#"> {{ __('Medical Transcribe Dashboard') }}</a></li>
			</ol>
		</div>
	</div>
	<!--END PAGE HEADER -->
@endsection

@section('content')	
	<!-- TOP CSP BOX INFO -->
	<div class="row">				
		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class="card overflow-hidden border-0 mt-2">
				<div class="card-body">
					<div class="d-flex align-items-end justify-content-between">
						<div>
							<p class=" mb-3 fs-12 font-weight-bold">{{ __('AWS Minutes Used') }} <span class="text-muted">({{ __('Current Month') }})</span></p>
							<h2 class="mb-0"><span class="number-font-chars">{{ number_format((float)$vendor_data['aws_month'][0]['data'] / 60, 2) }}</span></h2>									
						</div>
						<img src="{{URL::asset('img/csp/aws-lg.png')}}" class="csp-brand-img" alt="AWS Logo">
					</div>
					<div class="d-flex mt-2">
						<div>
							<span class="text-muted fs-12 mr-1">{{ __('Current Year') }} ({{ __('Total Usage') }}):</span>
							<span class="number-font fs-12"><i class="fa fa-bookmark mr-1 text-info"></i>{{ number_format((float)$vendor_data['aws_year'][0]['data'] / 60, 2) }}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class="card overflow-hidden border-0 mt-2">
				<div class="card-body">
					<p class=" mb-3 mt-1 fs-12 font-weight-bold">{{ __('Free Minutes Used') }} <span class="text-muted">({{ __('Current Month') }})</span></p>
					<h2 class="mb-2 number-font-chars">{{ number_format((float)$tts_data_monthly['free_minutes'][0]['data'] / 60, 2) }}</h2>
					<small class="fs-12 text-muted">{{ __('Compared to Last Month') }} (<span id="free_minutes_past"></span>): </small>
					<span class="fs-12" id="free_minutes"></span>
				</div>									
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class="card overflow-hidden border-0 mt-2">
				<div class="card-body">
					<p class=" mb-3 mt-1 fs-12 font-weight-bold">{{ __('Paid Minutes Used') }} <span class="text-muted">({{ __('Current Month') }})</span></p>
					<h2 class="mb-2 number-font-chars">{{ number_format((float)$tts_data_monthly['paid_minutes'][0]['data'] / 60, 2) }}</h2>
					<small class="fs-12 text-muted">{{ __('Compared to Last Month') }} (<span id="paid_minutes_past"></span>): </small>
					<span class="fs-12" id="paid_minutes"></span>
				</div>
			</div>
		</div>
		
	</div>
	<!-- END TOP CSP BOX INFO -->

    <!-- CURRENT YEAR USAGE ANALYTICS -->
	<div class="row mt-4">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="card overflow-hidden border-0">
				<div class="card-header">
					<h3 class="card-title">{{ __('Speect to Text Metrics') }} <span class="text-muted">({{ __('Current Year') }})</span></h3>
				</div>
				<div class="card-body">
					<div class="row mb-5 mt-2">
						<div class="col-md col-sm-12">
							<p class=" mb-1 fs-12">{{ __('Total Upload & Transcribe Tasks') }}</p>
							<h3 class="mb-0 fs-20 number-font">{{ number_format($tts_data_yearly['total_file_transcribe'][0]['data']) }}</h3>
						</div>
						<div class="col-md col-sm-12">
							<p class=" mb-1 fs-12">{{ __('Total Record & Transcribe Tasks') }}</p>
							<h3 class="mb-0 fs-20 number-font">{{ number_format($tts_data_yearly['total_recording_transcribe'][0]['data']) }}</h3>
						</div>
						<div class="col-md col-sm-12">
							<p class=" mb-1 fs-12">{{ __('Total Words Generated') }}</p>
							<h3 class="mb-0 fs-20 number-font">{{ number_format($tts_data_yearly['total_words'][0]['data']) }}</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="">
								<canvas id="chart-stt-audio" class="h-330"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- CURRENT YEAR USAGE ANALYTICS -->


	<!-- CURRENT YEAR USAGE ANALYTICS -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="card overflow-hidden border-0">
				<div class="card-header">
					<h3 class="card-title">{{ __('Minutes Usage') }} <span class="text-muted">({{ __('Current Year') }})</span></h3>
				</div>
				<div class="card-body">
					<div class="row mb-5 mt-2">
						<div class="col-md-3 col-sm-12">
							<p class="mb-1 fs-12">{{ __('Total Free Minutes Used') }}</p>
							<h3 class="mb-0 fs-20 number-font">{{ number_format((float)$tts_data_yearly['total_free_minutes'][0]['data'] / 60, 2) }}</h3>
						</div>
						<div class="col-md-3 col-sm-12">
							<p class=" mb-1 fs-12">{{ __('Total Paid Minutes Used') }}</p>
							<h3 class="mb-0 fs-20 number-font">{{ number_format((float)$tts_data_yearly['total_paid_minutes'][0]['data'] / 60, 2) }}</h3>
						</div>						
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="">
								<canvas id="chart-stt-minutes" class="h-330"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- CURRENT YEAR USAGE ANALYTICS -->

@endsection

@section('js')
	<!-- Chart JS -->
	<script src="{{URL::asset('plugins/chart/chart.bundle.js')}}"></script>
	<script type="text/javascript">
		$(function() {
	
			'use strict';

			var fileData = JSON.parse(`<?php echo $chart_data['file_minutes']; ?>`);
			var fileDataset = Object.values(fileData);
			var recordData = JSON.parse(`<?php echo $chart_data['record_minutes']; ?>`);
			var recordDataset = Object.values(recordData);

			var ctx = document.getElementById('chart-stt-audio');
			new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
					datasets: [{
						label: 'Upload & Transcribe Minutes ',
						data: fileDataset,
						backgroundColor: '#735fd4',
						borderWidth: 1,
						fill: true
					}, {
						label: 'Record & Transcribe Minutes ',
						data: recordDataset,
						backgroundColor:  '#1e1e2d',
						borderWidth: 1,
						fill: true
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false,
						labels: {
							display: false
						}
					},
					responsive: true,
					scales: {
						yAxes: [{
							stacked: true,
							ticks: {
								beginAtZero: true,
								fontSize: 11,
								stepSize: 100,
							},
							gridLines: {
								borderDash: [3, 2]                            
							}
						}],
						xAxes: [{
							barPercentage: 0.5,
							stacked: true,
							ticks: {
								fontSize: 11
							},
							gridLines: {
								borderDash: [3, 2]                            
							}
						}]
					},
					tooltips: {
						cornerRadius: 0,
						xPadding: 10,
						yPadding: 10
					},
					legend: {
						position: 'bottom',
						labels: {
						boxWidth: 10,
						fontSize: 10
						}
					}
				}
			});
			
			var freeData = JSON.parse(`<?php echo $chart_data['free_minutes']; ?>`);
			var freeDataset = Object.values(freeData);
			var paidData = JSON.parse(`<?php echo $chart_data['paid_minutes']; ?>`);
			var paidDataset = Object.values(paidData);

			var ctx = document.getElementById('chart-stt-minutes');
			new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
					datasets: [{
						label: 'Free Minutes Used ',
						data: freeDataset,
						backgroundColor: '#735fd4',
						borderWidth: 1,
						fill: true
					}, {
						label: 'Paid Minutes Used ',
						data: paidDataset,
						backgroundColor:  '#1e1e2d',
						borderWidth: 1,
						fill: true
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false,
						labels: {
							display: false
						}
					},
					responsive: true,
					scales: {
						yAxes: [{
							stacked: true,
							ticks: {
								beginAtZero: true,
								fontSize: 11,
								stepSize: 100,
							},
							gridLines: {
								borderDash: [3, 2]                            
							}
						}],
						xAxes: [{
							barPercentage: 0.5,
							stacked: true,
							ticks: {
								fontSize: 11
							},
							gridLines: {
								borderDash: [3, 2]                            
							}
						}]
					},
					tooltips: {
						cornerRadius: 0,
						xPadding: 10,
						yPadding: 10
					},
					legend: {
						position: 'bottom',
						labels: {
						boxWidth: 10,
						fontSize: 10
						}
					}
				}
			});


			// Percentage Difference
			var free_current_month = JSON.parse(`<?php echo $percentage['free_current']; ?>`);				
			var paid_current_month = JSON.parse(`<?php echo $percentage['paid_current']; ?>`);			

			(free_current_month[0]['data'] == null) ? free_current_month = 0 : free_current_month = free_current_month[0]['data'];
			(paid_current_month[0]['data'] == null) ? paid_current_month = 0 : paid_current_month = paid_current_month[0]['data'];

			var free_current_total = parseInt(free_current_month);	
			var paid_current_total = parseInt(paid_current_month);	

			var free_past_month = JSON.parse(`<?php echo $percentage['free_past']; ?>`);				
			var paid_past_month = JSON.parse(`<?php echo $percentage['paid_past']; ?>`);			

			(free_past_month[0]['data'] == null) ? free_past_month = 0 : free_past_month = free_past_month[0]['data'];
			(paid_past_month[0]['data'] == null) ? paid_past_month = 0 : paid_past_month = paid_past_month[0]['data'];

			var free_past_total = parseInt(free_past_month);	
			var paid_past_total = parseInt(paid_past_month);	

			var free_view = free_past_total / 60;
			var paid_view = paid_past_total / 60;

			document.getElementById('free_minutes_past').innerHTML = free_view.toFixed(2);
			document.getElementById('paid_minutes_past').innerHTML = paid_view.toFixed(2);

			var free_change = vendorPercentageDifference(free_past_total, free_current_total);
			var paid_change = vendorPercentageDifference(paid_past_total, paid_current_total);

			document.getElementById('free_minutes').innerHTML = free_change;
			document.getElementById('paid_minutes').innerHTML = paid_change;

			function vendorPercentageDifference(past, current) {
				if (past == 0) {
					var change = (current == 0) ? '<span class="text-muted"> 0% No Change</span>' : '<span class="text-success"> 100% Increase</span>';   					
					return change;
				} else if(current == 0) {
					var change = (past == 0) ? '<span class="text-muted"> 0% No Change</span>' : '<span class="text-danger"> 100% Decrease</span>';
					return change;
				} else if(past == current) {
					var change = '<span class="text-muted"> 0% No Change</span>';
					return change; 
				}

				var difference = current - past;
    			var difference_value;
				var result;
    			
				var totalDifference = Math.abs(difference);
				var change = (totalDifference/past) * 100;				

				if (difference > 0) {
					result = '<span class="text-success">' + change.toFixed(1) + '% Increase</span>';
				} else if(difference < 0) {
					result = '<span class="text-danger">' + change.toFixed(1) + '% Decrease</span>';
				} else {
					difference_value = '<span class="text-muted">' + change.toFixed(1) + '% No Change</span>';
				}

				return result;
			}
		});		
	</script>
@endsection