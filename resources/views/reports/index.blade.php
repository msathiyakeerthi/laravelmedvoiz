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
		<h4 class="page-title mb-0">{{ __('Reports') }}</h4>
		<ol class="breadcrumb mb-2">
			<li class="breadcrumb-item"><a href="{{route('reports.index')}}"><i class="fa fa-magic mr-2 fs-12"></i>{{ __('Reports') }}</a></li>
			<li class="breadcrumb-item" aria-current="page"><a href="{{url('#')}}"> {{ __('Speech-to-Text') }}</a></li>
			<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('Reports') }}</a></li>
		</ol>
	</div>
</div>
<!-- END PAGE HEADER -->
@endsection
@section('content')
	<div class="row">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group
                        -item">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


		<div class="col-lg-3 col-md-12 col-sm-12">


			<form action="{{ route('reports.store') }}" method="POST">
				@csrf

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

                            <div class="col-sm-12">
								<div class="form-group">
									<h6 class="task-heading">{{ __('Question') }}:</h6>

                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="question" rows="3"></textarea>
									@error('language')
										<p class="text-danger">{{ $errors->first('language') }}</p>
									@enderror
								</div>
							</div>



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
							<button type="submit" class="btn btn-primary main-action-button" id="report-submit">
                                {{ __('transcribe') }}
                            </button>
						</div>

					</div>
				</div>

			</form>
		</div>

		<div class="col-lg-9 col-md-12 col-sm-12">
			<div class="card border-0">
				<div class="card-header">
					<h3 class="card-title">{{ __('Reports') }}</h3>
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
                                <th width="3%">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $audioResult)
                                <tr>
                                    <td></td>
                                    <td>{{ $audioResult->created_at }}</td>
                                    <td>{{ $audioResult->name }}</td>
                                    <td>{{ $audioResult->status }}</td>
                                    <td>
                                        <a href="{{ route('reports.show', ['id' => $audioResult->id]) }}" class="transcribe-action-buttons transcribe-result" data-toggle="tooltip" data-placement="top" title="View Transcription">
                                            <i class="fa fa-eye fs-14"></i>
                                        </a>
                                        {{-- <a href="#" class="transcribe-action-buttons transcribe-result" data-toggle="tooltip" data-placement="top" title="Delete Transcription">
                                            <i class="fa fa-trash"></i>
                                        </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
					</table> <!-- END SET DATATABLE -->
				</div>
			</div>
		</div>

	</div>






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
			$('#slider-table').DataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": true,
                "bsearch": true,
                "bAutoWidth": false,
            });
		});
	</script>
@endsection
