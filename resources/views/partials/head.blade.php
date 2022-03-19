<head>
    <title>{{ config('app.name') }} | {{ $title }}</title>

    <meta charset="utf-8" />

    <meta property="og:title"
        content="{{ config('app.name') }} | {{ $title }}" />
    <meta property="og:site_name"
        content="{{ config('app.name') }}" />
    <link rel="canonical"
        href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon"
        href="{{ asset('dashboard/images/logo/60x60.png') }}" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link href="{{ asset('dashboard/plugins/global/plugins.bundle.css') }}"
        rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('dashboard/css/style.bundle.css') }}"
        rel="stylesheet"
        type="text/css" />

    <link href="{{ asset('dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}"
        rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('dashboard/plugins/custom/datatables/datatables.bundle.css') }}"
        rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css"
        integrity="sha512-8doNprLI7BCCBYRH642nRhdzbmgMNERNjaW7rZ2xtKbsgTI1HCqQKpQClTxjMZs/deq6y8OLW8IcV0PXUTgvWw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link href="{{ asset('dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}"
        rel="stylesheet"
        type="text/css" />

    @livewireStyles
</head>
