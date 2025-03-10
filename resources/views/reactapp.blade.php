@extends('layouts.app')

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">{{ __('Record & Transcribe Result') }}</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('user.stt.file')}}"><i class="fa fa-magic mr-2 fs-12"></i>{{ __('User') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{route('user.stt.record')}}"> {{ __('Record & Transcribe') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('Medical Transcribe Result') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')
    <div class="container">
       
        <!-- Iframe embedding largeinfra.com with display-capture, microphone, and camera permissions -->
        <iframe src="https://largeinfra.com"
                width="100%"
                height="600"
                frameborder="0"
                allow="microphone; camera; display-capture"></iframe>

        <!-- Optional JavaScript to check microphone, camera, and display capture permissions -->
        <script>
            // Function to check and request microphone, camera, and display capture access
            function checkMediaPermissions() {
                navigator.mediaDevices.getUserMedia({ audio: true, video: true })
                .then(function(stream) {
                    console.log("Microphone and camera access granted.");
                })
                .catch(function(err) {
                    console.error("Error accessing microphone and camera: ", err.message);
                });

                // Optional: You can request display capture using getDisplayMedia
                navigator.mediaDevices.getDisplayMedia({ video: true })
                .then(function(stream) {
                    console.log("Display capture access granted.");
                })
                .catch(function(err) {
                    console.error("Error accessing display capture: ", err.message);
                });
            }

            // Call the function to check permissions
            checkMediaPermissions();
        </script>
    </div>
@endsection
