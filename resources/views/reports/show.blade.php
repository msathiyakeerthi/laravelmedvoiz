@extends('layouts.app')

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">{{ __('Report Result') }}</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('reports.index')}}"><i class="fa fa-magic mr-2 fs-12"></i>{{ __('Admin') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="#"> {{ __('Report Result') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="card overflow-hidden border-0">
				<div class="card-body pt-4 pb-5">
					<h6 class="mb-3 fs-12 text-primary font-weight-bold">
                        {{ ucfirst($result->speech_type) }}
                    </h6>
					<div class="row">
						<div class="col-sm-12">
							<div class="outer-box">
								<table id="transcript-table" class="table table-hover">
									<tbody>
                                        <tr>
                                            <th>
                                                Question
                                            </th>
                                            <td>
                                                {{ $result->text }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Answer
                                            </th>
                                            <td>
                                                {{ $result->raw }}
                                            </td>
                                        </tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
@endsection
