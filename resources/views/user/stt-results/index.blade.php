@extends('layouts.app')
@section('css')
	<!-- Data Table CSS -->
	<link href="{{URL::asset('plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
<!-- PAGE HEADER -->
<div class="page-header mt-5-7">
	<div class="page-leftheader">
		<h4 class="page-title mb-0">{{ __('Medical Transcribe Results Data') }}</h4>
		<ol class="breadcrumb mb-2">
			<li class="breadcrumb-item"><a href="{{route('user.stt.file')}}"><i class="mdi mdi-audiobook mr-2 fs-12"></i>{{ __('User') }}</a></li>
			<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('Medical Transcribe Results') }}</a></li>
		</ol>
	</div>
</div>
<!-- END PAGE HEADER -->
@endsection
@section('content')	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="card border-0">
				<div class="card-header">
					<h3 class="card-title">{{ __('My Medical Transcribe Results') }}</h3>
					<a id="refresh-button" href="#" data-toggle="tooltip" data-placement="top" title="Refresh Table"><i class="fa fa-refresh transcribe-action-buttons transcribe-result"></i></a>
				</div>
				<div class="card-body pt-2">
					<!-- SET DATATABLE -->
					<table id='userResultTable' class='table' width='100%'>
							<thead>
								<tr>
									<th width="1%"></th>
									<th width="6%">{{ __('Created On') }}</th> 
									<th width="9%">{{ __('Patient or Case Name') }}</th>
									<th width="6%">{{ __('Status') }}</th>		
									<th width="2%"><i class="fa fa-music fs-14"></i></th>							
									<th width="2%"><i class="fa fa-cloud-download fs-14"></i></th>								
									<th width="3%">{{ __('Duration') }}</th>									
									<th width="2%">{{ __('Format') }}</th> 																           	     						           	
									<th width="2%">{{ __('Words') }}</th> 																           	     						           	
									<th width="4%">{{ __('Speech Type') }}</th> 																           	     						           	
									<th width="4%">{{ __('Mode') }}</th> 																           	     						           	
									<th width="3%">{{ __('Actions') }}</th>
								</tr>
							</thead>
					</table> <!-- END SET DATATABLE -->
				</div>
			</div>
		</div>
	</div>

	<!-- DELETE MODAL -->
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
	<!-- END DELETE MODAL -->
@endsection

@section('js')
<!-- Data Tables JS -->
<script src="{{URL::asset('plugins/datatable/datatables.min.js')}}"></script>
<script src="{{URL::asset('js/results.js')}}"></script>
<!-- Green Audio Players JS -->
<script src="{{ URL::asset('plugins/audio-player/green-audio-player.js') }}"></script>
<script src="{{ URL::asset('js/audio-player.js') }}"></script>
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
		var table = $('#userResultTable').DataTable({
			"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
			responsive: {
				details: {type: 'column'}
			},
			colReorder: true,
			language: {
				"emptyTable": "<div><img id='no-results-img' src='{{ URL::asset('img/files/no-result.png') }}'><br>No trascribe tasks created yet</div>",
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
			ajax: "{{ route('user.stt.results') }}",
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
					data: 'words',
					name: 'words',
					orderable: true,
					searchable: true
				},
				{
					data: 'speech_type',
					name: 'speech_type',
					orderable: true,
					searchable: true
				},
				{
					data: 'custom-mode',
					name: 'custom-mode',
					orderable: true,
					searchable: true
				},		
				{
					data: 'actions',
					name: 'actions',
					orderable: false,
					searchable: false
				}
			]
		});
		
		$('#userResultTable tbody').on('click', 'td.details-control', function () {
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
			$("#userResultTable").DataTable().ajax.reload();
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