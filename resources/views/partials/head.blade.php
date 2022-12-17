<head>
    <title>{{ config('app.name') }} | {{ $title }}</title>

    <meta charset="utf-8" />
    {{-- <meta name="description" content="{{ setting('general', 'site_description') }}" /> --}}
    {{-- <meta name="keywords" content="{{ setting('general', 'site_description') }}" /> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />

    <meta property="og:title" content="{{ config('app.name') }} | {{ $title }}" />

    {{-- <meta property="og:url" content="https://keenthemes.com/metronic" /> --}}
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    {{-- <link rel="canonical" href="https://preview.keenthemes.com/metronic8" /> --}}
    {{-- <link rel="canonical" href="https://preview.keenthemes.com/metronic8" /> --}}
    <link rel="shortcut icon" href="{{ asset('dashboard/images/logo/60x60.png') }}" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">

    <link href="{{ asset('dashboard/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    @if (app()->getLocale() == 'ar')
        <link href="{{ asset('dashboard/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
        <style>
            .d-flex {
                direction: rtl !important;
            }

            .aside-menu .menu .menu-item .menu-link .menu-title {
                font-size: large;
            }
        </style>
    @else
        <link href="{{ asset('dashboard/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endif
    {{-- <link href="{{ asset('dashboard/css/app.css') }}" rel="stylesheet" type="text/css" /> --}}

    <link href="{{ asset('dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('dashboard/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css"
        integrity="sha512-8doNprLI7BCCBYRH642nRhdzbmgMNERNjaW7rZ2xtKbsgTI1HCqQKpQClTxjMZs/deq6y8OLW8IcV0PXUTgvWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    @stack('styles')

    @livewireStyles
</head>
