<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <title>{{ config('app.name', 'Laravel') }} - Manager</title>

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">

    @yield('styles')


</head>
<body>
    <div id="app">

        @include('lerova.layouts.partials.navigation')

        @yield('content')

        @include('lerova.layouts.partials.footer')

    </div>

    <script charset="utf-8" src="{{ asset('assets/js/app.js') }}"></script>

    @yield('scripts')

</body>
</html>
