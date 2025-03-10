@extends('layouts.app')


@section('content')
    <!-- Remove container padding and set full height -->
    <div class="container-fluid p-0 h-100 d-flex flex-column">
        <!-- Flex container for iframe -->
        <div class="row flex-grow-1 m-0">
            <div class="col-12 p-0 h-100">
                <iframe id="transcribeIframe"
                        class="w-100 border-0"
                        allow="microphone; display-capture">
                </iframe>
            </div>
        </div>
    </div>

    <!-- Dynamic URL with email parameter -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const userEmail = "{{ auth()->user()->email }}";
            const iframe = document.getElementById('transcribeIframe');
            iframe.src = `https://largeinfra.com?doctor_email=${encodeURIComponent(userEmail)}`;
            
            // Function to adjust iframe height based on header height
            function adjustIframeHeight() {
                const header = document.querySelector('.page-header');
                const headerHeight = header ? header.offsetHeight : 0;
                iframe.style.height = `calc(100vh - ${headerHeight}px)`;
            }

            // Adjust height on initial load and window resize
            adjustIframeHeight();
            window.addEventListener('resize', adjustIframeHeight);
        });
    </script>
@endsection