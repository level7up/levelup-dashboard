<html lang="en">

@include('dashboard::partials.head')

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid w-100">
            @yield('content')
        </div>
    </div>
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
