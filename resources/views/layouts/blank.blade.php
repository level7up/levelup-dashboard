<html lang="en">

@include('dashboard::partials.head')

<body id="kt_body" class="bg-body">

    @yield('content')

    <script src="{{ asset('dashboard/plugins/global/plugins.bundle.js') }}"></script>
    {{-- <script src="{{asset('dashboard/js/scripts.bundle.js')}}"></script> --}}
    {{-- <script src="{{asset('dashboard/js/custom/authentication/sign-in/general.js')}}"></script> --}}
    <script src="{{ asset('dashboard/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/js/custom/widgets.js') }}"></script>

</body>

</html>
