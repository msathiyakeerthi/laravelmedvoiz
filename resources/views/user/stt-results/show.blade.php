@extends('layouts.app')

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">{{ __('Medical Transcribe Result') }}</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('user.stt.file')}}"><i class="fa fa-magic mr-2 fs-12"></i>{{ __('User') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{route('user.stt.results')}}"> {{ __('Transcribe Results') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('Medical Transcribe Result') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')						
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="card border-0">
				<div class="card-header">
					<h3 class="card-title">{{ __('Patient or Case Name') }}: <span class="text-primary">{{ ucfirst($id->name) }}</span></h3>
					<span id="create-category" class="card-title text-muted">File Name: <span class="text-info">{{ $id->file_name }}</span></span>
				</div>
				<div class="card-body pt-5 pb-5">
					<div class="row">
						<div class="col-sm-12">
							<div id="waveform"></div>
							<div id="wave-timeline"></div>
						</div>
						<div class="col-sm-12 text-center">
							<div id="controls" class="mt-5">
								<img src="{{ URL::asset('/img/svgs/controls/unmute.svg') }}" class="control-button-left mr-2" id="muteBtn" alt="">
								<img src="{{ URL::asset('/img/svgs/controls/left.svg') }}" class="control-button mr-2" id="backwardBtn" alt="">
								<img src="{{ URL::asset('/img/svgs/controls/play.svg') }}" class="control-button mr-2" id="playBtn" alt="">
								<img src="{{ URL::asset('/img/svgs/controls/stop.svg') }}" class="control-button mr-2" id="stopBtn" alt="">
								<img src="{{ URL::asset('/img/svgs/controls/right.svg') }}" class="control-button mr-2" id="forwardBtn" alt="">

								<button data-toggle="tooltip" data-placement="top" title="Download Transcript Results" class="btn btn-primary control-button-right" id="download-now">Download</button>	
								<a href="{{ route('user.stt.results') }}" class="btn btn-primary pl-5 pr-5 mr-2 control-button-right">{{ __('Return') }}</a>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12 col-sm-12">
			<div class="card overflow-hidden border-0">
				<div class="card-body pt-4 pb-5">
					<h6 class="mb-3 fs-12 text-primary font-weight-bold">{{ $id->speech_type }}</h6>
					<div class="row">
						<div class="col-sm-12">
							<div class="outer-box">
								<table id="transcript-table" class="table table-hover">
									<thead>
									  <tr>
										<th scope="col" class="transcript-table-column" width="20%">Timeframe</th>
										<th scope="col" class="transcript-table-column" width="80%">Transcript</th>
									  </tr>
									</thead>
									<tbody>
									</tbody>
								</table>
								<span class="text-muted ml-3 fs-10 font-weight-bold">{{ number_format($id->length / 60, 2, '.', '') }} minutes</span> <span class="text-muted ml-3 fs-10 font-weight-bold">{{ $id->words }} words</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script src="{{ URL::asset('js/results.js') }}"></script>
	<script src="{{ URL::asset('plugins/wavesurfer/wavesurfer.js') }}"></script>
	<script src="{{ URL::asset('plugins/wavesurfer/wavesurfer.cursor.min.js') }}"></script>
	<script src="{{ URL::asset('plugins/wavesurfer/wavesurfer.timeline.min.js') }}"></script>
	<script type="text/javascript">
		$(function() {

			"use strict";

			var playBtn = document.getElementById('playBtn');
			var stopBtn = document.getElementById('stopBtn');
			var forwardBtn = document.getElementById('forwardBtn');
			var backwardBtn = document.getElementById('backwardBtn');
			var muteBtn = document.getElementById('muteBtn');
			var settingsBtn = document.getElementById('settingsBtn');

			var wavesurfer = WaveSurfer.create({
				container: '#waveform',
				waveColor: '#735fd4',
				progressColor: '#1e1e2d',
				selectionColor: '#d0e9c6',
				backgroundColor: '#F7F7F7',
				barWidth: 2,
				barHeight: 1.7,
				barMinHeight: 1,
				height: 100,
				responsive: true,				
				barRadius: 1,
				plugins: [
					WaveSurfer.timeline.create({
						container: "#wave-timeline"
					}),
					WaveSurfer.cursor.create({
						showTime: true,
						opacity: 1,
						customShowTimeStyle: {
							'background-color': '#000',
							color: '#fff',
							padding: '2px',
							'font-size': '10px'
						}
					}),
				]
			});

			var url = JSON.parse(`<?php echo $data['url']; ?>`);
			wavesurfer.load(url);

			playBtn.onclick = function() {
				wavesurfer.playPause();
				if (playBtn.src.includes('play.svg')) {
					playBtn.src = '/img/svgs/controls/pause.svg';
				} else {
					playBtn.src = '/img/svgs/controls/play.svg';
				}
			}

			stopBtn.onclick = function() {
				wavesurfer.stop();	
				playBtn.src = '/img/svgs/controls/play.svg';
			}

			forwardBtn.onclick = function() {
				wavesurfer.skipForward(5);	
			}

			backwardBtn.onclick = function() {
				wavesurfer.skipBackward(5);	
			}

			muteBtn.onclick = function() {
				wavesurfer.toggleMute();
				if (muteBtn.src.includes('unmute.svg')) {
					muteBtn.src = '/img/svgs/controls/mute.svg';
				} else {
					muteBtn.src = '/img/svgs/controls/unmute.svg';
				}	
			}

			wavesurfer.on('finish', function() {
				playBtn.src = '/img/svgs/controls/play.svg';
				wavesurfer.stop();	
			});

			var type = JSON.parse(`<?php echo $data['type']; ?>`);
			var text = JSON.parse(`<?php echo $data['text']; ?>`);
			var raw = JSON.parse(<?php echo $data['raw']; ?>);
			
			
			if (type == 'CONVERSATION') {
				processConversation(raw, text);
			} else if(type == 'DICTATION') {
				processDictation(raw, text);
			}

		});
	</script>
@endsection
