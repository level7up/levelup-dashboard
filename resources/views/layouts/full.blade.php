<html lang="en">
@include('dashboard::partials.head')

<body id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled">

    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page flex-row flex-column-fluid">
            @include('dashboard::sections.full.sidebar')
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('dashboard::sections.full.navbar')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div class="container-xxl">
                        @include('dashboard::sections.full.alerts')

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard::partials.logout')

    @include('dashboard::partials.scripts')
</body>

</html>
