<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- Jquery js-->
<script src="{{URL::asset('js/jquery-3.6.0.min.js')}}"></script>

<!-- Bootstrap4 js-->
<script src="{{URL::asset('plugins/bootstrap/popper.min.js')}}"></script>
<script src="{{URL::asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!--Sidemenu js-->
<script src="{{URL::asset('plugins/sidemenu/sidemenu.js')}}"></script>

<!-- P-scroll js-->
<script src="{{URL::asset('plugins/p-scrollbar/p-scrollbar.js')}}"></script>
<script src="{{URL::asset('plugins/p-scrollbar/p-scroll.js')}}"></script>

@yield('js')

<!-- Simplebar JS -->
<script src="{{URL::asset('plugins/simplebar/js/simplebar.min.js')}}"></script>

<!-- Flash JS -->
<script src="{{ URL::asset('plugins/flashjs/dist/flash.min.js') }}"></script>

<!-- Custom js-->
<script src="{{URL::asset('js/custom.js')}}"></script>

<!-- Google Analytics -->
@if (config('services.google.analytics.enable') == 'on')
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google.analytics.id') }}"></script>
    <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ config('services.google.analytics.id') }}');
    </script>
@endif

<!-- Mark as Read JS-->
<script type="text/javascript">

    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('user.notifications.mark') }}", {
            method: 'POST',
            data: {"_token": "{{ csrf_token() }}", id}
        });
    }

    var totalNotifications;
    var totalNotifications_a;
    var totalNotifications_b;

    $(function() {     

        $('.mark-as-read').click(function() {
            let request = sendMarkRequest($(this).data('id'));
            request.done(() => {
                $(this).parents('div.dropdown-item').remove();
            });

            document.getElementById("total-notifications").innerHTML = --totalNotifications;
            document.getElementById("total-notifications-a").innerHTML = --totalNotifications_a;
            document.getElementById("total-notifications-b").innerHTML = --totalNotifications_b;
        });
        $('#mark-all').click(function() {
            let request = sendMarkRequest();
            request.done(() => {
                $('div.notify-menu').remove();
            })

            document.getElementById("total-notifications").innerHTML = 0;
        });
    });        

    $(document).ready(function(){
       
        if (document.getElementById("total-notifications")) {
            totalNotifications = "{{ auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count() }}";
            document.getElementById("total-notifications").innerHTML = totalNotifications;
        }  
        if (document.getElementById("total-notifications-a")) {
            totalNotifications_a = "{{ auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count() }}";
            document.getElementById("total-notifications-a").innerHTML = totalNotifications_a;
        }
        if (document.getElementById("total-notifications-b")) {
            totalNotifications_b = "{{ auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count() }}";
            document.getElementById("total-notifications-b").innerHTML = totalNotifications_b;
        }                  
        
    });

</script>