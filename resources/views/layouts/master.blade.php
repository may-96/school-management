<!doctype html>
<html lang="en">

<head>
    <title>School Management System</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Able Pro is trending dashboard template made using Bootstrap 5 design framework. Able Pro is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies." />
    <meta name="keywords"
        content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard" />
    <meta name="author" content="Phoenixcoded" />

    {{-- Icon School Management System --}}
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />

    {{-- [CSS Files] --}}
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/inter/inter.css') }}" id="main-font-link" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/phosphor/duotone/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" />
    <script src="{{ asset('assets/js/tech-stack.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset(path: 'assets/css/plugins/animate.min.css') }}" />
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr"
    data-pc-theme_contrast="" data-pc-theme="light">

    {{-- loader --}}
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    @if (!in_array(Route::currentRouteName(), ['auth.forget', 'auth.login', 'auth.reset', 'auth.register', 'landing.home']))
        
        @include('components.sidebar')
        @include('components.topbar')

    @endif

    {{-- sidebar --}}
    {{-- @include('components.sidebar') --}}

    {{-- topbar --}}
    {{-- @include('components.topbar') --}}

    {{-- main contents --}}
    @yield('content')


    {{-- js files --}}
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/icon/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/elements/ac-alert.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/widgets/course-report-bar-chart.js') }}"></script>
    <script src="{{ asset('assets/js/widgets/invoice-chart.js') }}"></script>



</body>

</html>
