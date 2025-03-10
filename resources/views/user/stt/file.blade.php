@extends('layouts.app')
@section('css')
	<!-- Data Table CSS -->
	<link href="{{URL::asset('plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
	<!-- Awselect CSS -->
	<link href="{{URL::asset('plugins/awselect/awselect.min.css')}}" rel="stylesheet" />
	<!-- FilePond CSS -->
	<link href="{{URL::asset('plugins/filepond/filepond.css')}}" rel="stylesheet" />
	<!-- Green Audio Players CSS -->
	<link href="{{ URL::asset('plugins/audio-player/green-audio-player.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
<!-- PAGE HEADER -->
<div class="page-header mt-5-7">
	<div class="page-leftheader">
		<h4 class="page-title mb-0">{{ __('Upload & Transcribe') }}</h4>
		<ol class="breadcrumb mb-2">
			<li class="breadcrumb-item"><a href="{{route('user.stt.file')}}"><i class="fa fa-magic mr-2 fs-12"></i>{{ __('User') }}</a></li>
			<li class="breadcrumb-item" aria-current="page"><a href="{{url('#')}}"> {{ __('Speech-to-Text') }}</a></li>
			<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('Upload & Transcribe') }}</a></li>
		</ol>
	</div>
</div>
<!-- END PAGE HEADER -->
@endsection
@section('content')
	<div class="row">
		<div class="col-lg-3 col-md-12 col-sm-12">
			<form id="transcribe-audio" action="{{ route('user.stt.transcribe') }}" method="POST" enctype="multipart/form-data">
				@csrf
				
				<div class="card border-0">
					<div class="card-body p-0">
					
						<!-- CONTAINER FOR AUDIO FILE UPLOADS-->
						<div id="upload-container">							
							
							<!-- DRAG & DROP MEDIA FILES -->
							<div class="select-file">
								<input type="file" name="filepond" id="filepond" class="filepond" required  />	
							</div>
							@error('audiofile')
								<p class="text-danger">{{ $errors->first('audiofile') }}</p>
							@enderror	

						</div> <!-- END CONTAINER FOR AUDIO FILE UPLOADS-->							
						
					</div>
				</div>

				<div class="card border-0">
					<div class="card-body p-5 pb-0">

						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">	
									<h6 class="task-heading">{{ __('Audio File Language') }}:</h6>								
									<select id="languages" name="language" data-placeholder="{{ __('Select audio language') }}">	
											<option value="us-EN" data-img="{{ URL::asset('/img/flags/us.svg') }}" selected> US English</option>										
									</select>
									@error('language')
										<p class="text-danger">{{ $errors->first('language') }}</p>
									@enderror	
								</div>
							</div>
							
							@if (auth()->user()->group != 'user')
								<div class="col-sm-12" id="removable-type">									
									<h6 class="task-heading">{{ __('Speech Type') }}:</h6>
									<select id="type" name="type" data-placeholder="Select Speech Type" onchange="displaySpeakerIdentification()">			
										<option value="CONVERSATION" @if (config('stt.speech_type') == 'CONVERSATION') selected @endif>Conversation</option>
										<option value="DICTATION" @if (config('stt.speech_type') == 'DICTATION') selected @endif>Dictation</option>
									</select>	
									@error('type')
										<p class="text-danger">{{ $errors->first('type') }}</p>
									@enderror								
								</div>

								<div class="col-sm-12" id="removable-speaker">
									<div id="speakers-box">
										<h6 class="task-heading">{{ __('Number of Speakers') }}:</h6>
										<select id="speakers" name="speakers" data-placeholder="Select max number of speakers in the audio file">
											<option value="2" selected="selected">2 People</option>
											<option value="3">3 People</option>
											<option value="4">4 People</option>
											<option value="5">5 People</option>											
											<option value="6">6 People</option>											
											<option value="7">7 People</option>																						
										</select>
									</div>
								</div>
							@elseif ((auth()->user()->group == 'user') && (config('stt.speech_type_user') == 'enable'))
								<div class="col-sm-12" id="removable-type">									
									<h6 class="task-heading">{{ __('Speech Type') }}:</h6>
									<select id="type" name="type" data-placeholder="Select Speech Type" onchange="displaySpeakerIdentification()">			
										<option value="CONVERSATION" @if (config('stt.speech_type') == 'CONVERSATION') selected @endif>Conversation</option>
										<option value="DICTATION" @if (config('stt.speech_type') == 'DICTATION') selected @endif>Dictation</option>
									</select>	
									@error('type')
										<p class="text-danger">{{ $errors->first('type') }}</p>
									@enderror								
								</div>

								<div class="col-sm-12" id="removable-speaker">
									<div id="speakers-box">
										<h6 class="task-heading">{{ __('Number of Speakers') }}:</h6>
										<select id="speakers" name="speakers" data-placeholder="Select max number of speakers in the audio file">
											<option value="2" selected="selected">2 People</option>
											<option value="3">3 People</option>
											<option value="4">4 People</option>
											<option value="5">5 People</option>											
											<option value="6">6 People</option>											
											<option value="7">7 People</option>																						
										</select>
									</div>
								</div>
							@endif

							<div class="col-sm-12">					
								<h6 class="task-heading">{{ __('Patient or Case Name') }}:</h6>
								<div class="input-box">
									<div class="form-group">							    
										<input type="text" class="form-control @error('name') is-danger @enderror" id="name" name="name" required>
										@error('name')
											<p class="text-danger">{{ $errors->first('name') }}</p>
										@enderror
									</div> 	
								</div>
							</div>
						</div>						

						<div class="card-footer border-0 text-center p-0">
							<span id="processing"><img src="{{ URL::asset('/img/svgs/processing.svg') }}" alt=""></span>
							<button type="submit" class="btn btn-primary main-action-button" id="transcribe">{{ __('transcribe') }}</button>							
						</div>							
				
					</div>
				</div>

			</form>
		</div>
	
		<div class="col-lg-9 col-md-12 col-sm-12">
			<div class="card border-0">
				<div class="card-header">
					<h3 class="card-title">{{ __('Upload & Transcribe Tasks') }} <span class="text-muted">({{ __('Current Day') }})</span></h3>
					<a id="refresh-button" href="#" data-toggle="tooltip" data-placement="top" title="Refresh Table"><i class="fa fa-refresh transcribe-action-buttons transcribe-result"></i></a>
				</div>
				<div class="card-body pt-2">
					<!-- SET DATATABLE -->
					<table id='audioResultsTable' class='table' width='100%'>
							<thead>
								<tr>
									<th width="1%"></th>
									<th width="5%">{{ __('Created On') }}</th> 
									<th width="10%">{{ __('Patient or Case Name') }}</th>
									<th width="6%">{{ __('Status') }}</th>		
									<th width="3%"><i class="fa fa-music fs-14"></i></th>							
									<th width="2%"><i class="fa fa-cloud-download fs-14"></i></th>
									<th width="2%">{{ __('Duration') }}</th>									
									<th width="2%">{{ __('Format') }}</th>        																										           	   						           	
									<th width="3%">{{ __('Actions') }}</th>
								</tr>
							</thead>
					</table> <!-- END SET DATATABLE -->
				</div>
			</div>
		</div>
		
	</div>


	<!-- MODAL -->
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel"><i class="mdi mdi-alert-circle-outline color-red"></i> {{ __('Confirm Result Deletion') }}</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="deleteModalBody">
					<div>
						<!-- DELETE CONFIRMATION -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END MODAL -->

	<!-- NOTIFICATION MODAL -->
	<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true" data-keyboard="false">
		<div class="modal-dialog modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-circle color-red"></i> {{ __('Speech-to-Text Notification') }}</h4>
					<button type="button" class="close" data-dismiss="modal" id="modal-close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body pb-4 pl-6">        
					<span id="notificationMessage" class="fs-13"></span>
				</div>
				<div class="modal-footer pr-6">
					<button type="button" class="btn btn-cancel mb-5" data-dismiss="modal" id="listen-close">{{ __('Close') }}</button>
				</div>				
			</div>
		</div>
	</div>
	<!-- END NOTIFICATION MODAL -->

</div>
@endsection
@section('js')
	<!-- Green Audio Players JS -->
	<script src="{{ URL::asset('plugins/audio-player/green-audio-player.js') }}"></script>
	<script src="{{ URL::asset('js/audio-player.js') }}"></script>
	<!-- FilePond JS -->
	<script src={{ URL::asset('plugins/flipclock/moment.min.js') }}></script>
	<script src={{ URL::asset('plugins/filepond/filepond.min.js') }}></script>
	<script src={{ URL::asset('plugins/filepond/filepond-plugin-file-validate-size.min.js') }}></script>
	<script src={{ URL::asset('plugins/filepond/filepond-plugin-file-validate-type.min.js') }}></script>
	<script src={{ URL::asset('plugins/filepond/filepond.jquery.js') }}></script>
	<!-- Data Tables JS -->
	<script src="{{URL::asset('plugins/datatable/datatables.min.js')}}"></script>
	<script src="{{URL::asset('js/results.js')}}"></script>
	<!-- Awselect JS -->
	<script src="{{URL::asset('plugins/awselect/awselect-custom.js')}}"></script>
	<script src="{{URL::asset('js/dashboard.js')}}"></script>
	<script src="{{URL::asset('js/transcribe-file.js')}}"></script>
	<script type="text/javascript">
		$(function () {

			"use strict";
			
			function format(d) {
				// `d` is the original data object for the row
				return '<div class="slider">'+
							'<table class="details-table">'+
								'<tr>'+
									'<td class="details-title" width="10%">Transcript:</td>'+
									'<td>'+ ((d.text == null) ? '' : d.text) +'</td>'+
								'</tr>'+
								'<tr>'+
									'<td class="details-result" width="10%">Audio File:</td>'+
									'<td><audio controls preload="none">' +
										'<source src="'+ d.result +'" type="'+ d.audio_type +'">' +
									'</audio></td>'+
								'</tr>'+
							'</table>'+
						'</div>';
			}

			// INITILIZE DATATABLE
			var table = $('#audioResultsTable').DataTable({
				"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
				responsive: {
					details: {type: 'column'}
				},
				colReorder: true,
				language: {
					"emptyTable": "<div><img id='no-results-img' src='{{ URL::asset('img/files/no-result.png') }}'><br>No transcribe tasks submitted yet</div>",
					search: "<i class='fa fa-search search-icon'></i>",
					lengthMenu: '_MENU_ ',
					paginate : {
						first    : '<i class="fa fa-angle-double-left"></i>',
						last     : '<i class="fa fa-angle-double-right"></i>',
						previous : '<i class="fa fa-angle-left"></i>',
						next     : '<i class="fa fa-angle-right"></i>'
					}
				},
				pagingType : 'full_numbers',
				processing: true,
				serverSide: true,
				ajax: "{{ route('user.stt.file') }}",
				columns: [{
						"className":      'details-control',
						"orderable":      false,
						"searchable":     false,
						"data":           null,
						"defaultContent": ''
					},
					{
						data: 'created-on',
						name: 'created-on',
						orderable: true,
						searchable: true
					},							
					{
						data: 'name',
						name: 'name',
						orderable: true,
						searchable: true
					},											
					{
						data: 'custom-status',
						name: 'custom-status',
						orderable: true,
						searchable: true
					},	
					{
						data: 'single',
						name: 'single',
						orderable: true,
						searchable: true
					},				
					{
						data: 'download',
						name: 'download',
						orderable: true,
						searchable: true
					},
					{
						data: 'custom-length',
						name: 'custom-length',
						orderable: true,
						searchable: true
					},
					{
						data: 'format',
						name: 'format',
						orderable: true,
						searchable: true
					},					
					{
						data: 'actions',
						name: 'actions',
						orderable: false,
						searchable: false
					},
				]
			});
							

			$('#audioResultsTable tbody').on('click', 'td.details-control', function () {
				var tr = $(this).closest('tr');
				var row = table.row( tr );
		
				if ( row.child.isShown() ) {
					// This row is already open - close it
					$('div.slider', row.child()).slideUp( function () {
						row.child.hide();
						tr.removeClass('shown');
					} );
				}
				else {
					// Open this row
					row.child( format(row.data()), 'no-padding' ).show();
					tr.addClass('shown');
		
					$('div.slider', row.child()).slideDown();
				}
			});


			$('#refresh-button').on('click', function(e){
				e.preventDefault();
				$("#audioResultsTable").DataTable().ajax.reload();
			});

			
			// DELETE CONFIRMATION MODAL
			$(document).on('click', '#deleteResultButton', function(event) {
				event.preventDefault();
				let href = $(this).attr('href');
				$.ajax({
					url: href
					, beforeSend: function() {
						$('#loader').show();
					},
					// return the result
					success: function(result) {
						$('#deleteModal').modal("show");
						$('#deleteModalBody').html(result).show();
					}
					, error: function(jqXHR, testStatus, error) {
						console.log(error);
						alert("Page " + href + " cannot open. Error:" + error);
						$('#loader').hide();
					}
					, timeout: 8000
				})
			});
		

		});		
	</script>
@endsection