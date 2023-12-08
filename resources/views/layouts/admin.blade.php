<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- inject:css-->

    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">

    <!-- endinject -->

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/img/favicon.png') }}">

    @livewireStyles
</head>
<body>

    @include('layouts.incl.admin.navbar')
    <main class="main-content">
    @include('layouts.incl.admin.sidebar')

        <div class="contents">

            <div class="container-fluid">
                <div class="social-dash-wrap">
                    @yield('content')
                </div>
            </div>

        </div>

    </main>
    <!-- inject:js-->

    @livewireScripts
    @stack('script')

    <script src="{{ asset('admin/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins.min.js') }}"></script>
    <script src="{{ asset('admin/js/script.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>

    @yield('scripts')

    <!-- endinject-->


</body>
</html>
