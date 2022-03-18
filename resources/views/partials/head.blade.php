<head>
    <title>{{ config('app.name') }} | {{ $title }}</title>

    <meta charset="utf-8" />
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1" />
    <meta property="og:locale"
        content="en_US" />
    <meta property="og:type"
        content="article" />

    <meta property="og:title"
        content="{{ config('app.name') }} | {{ $title }}" />

    <meta property="og:url"
        content="https://keenthemes.com/metronic" />
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
