<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta -->
    @stack('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>Canvas</title>

    <!-- HighlightJS scripts -->
    <script src="{{ url('https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.15.6/build/highlight.min.js') }}"></script>

    <!-- HighlightJS sheets -->
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.15.6/build/styles/default.min.css') }}">

    <!-- Style sheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset(mix(\Canvas\Canvas::$useDarkMode ? 'css/app-dark.css' : 'css/app.css', 'vendor/canvas')) }}">

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ mix('favicon.ico', 'vendor/canvas') }}">

    <!-- Additional style sheets -->
    @stack('styles')
</head>
<body>
    <div id="app">
        @include('canvas::components.nav.navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Localization scripts -->
    <script src="{{ route('canvas.lang') }}"></script>

    <!-- Application scripts -->
    <script type="text/javascript" src="{{ mix('js/app.js', 'vendor/canvas') }}"></script>

    <!-- Additional scripts -->
    @stack('scripts')
</body>
</html>
