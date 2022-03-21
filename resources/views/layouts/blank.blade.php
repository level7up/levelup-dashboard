<html lang="en">

@include('dashboard::partials.head')

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid w-100">
            @yield('content')
        </div>
    </div>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('dashboard/plugins/global/plugins.bundle.js') }}"></script>
    {{-- <script src="{{asset('dashboard/js/scripts.bundle.js')}}"></script> --}}
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    {{-- <script src="{{asset('dashboard/js/custom/authentication/sign-in/general.js')}}"></script> --}}
    <script src="{{ asset('dashboard/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/js/custom/widgets.js') }}"></script>

    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>

</html>
