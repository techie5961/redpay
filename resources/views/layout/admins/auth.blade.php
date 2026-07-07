<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}" />
    <meta name="apple-mobile-web-app-title" content="RedPay" />
    <link rel="manifest" href="{{ asset('favicon/apple-touch-icon.png') }}" />
   <link rel="stylesheet" href="{{ asset('vitecss/fonts/fonts.css') }}">
   <link rel="stylesheet" href="{{ asset('vitecss/css/app.css?v=1.5') }}">
   <script src="{{ asset('vitecss/js/alpine.bundle.js') }}"></script>
   <script src="{{ asset('vitecss/js/app.js') }}"></script>
    <title>{{ config('app.name') }} - Admin - @yield('title')</title>
    @yield('css')
</head>
<body>
    @yield('main')
    @yield('js')
</body>
</html>