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
   <link rel="stylesheet" href="{{ asset('vitecss/css/app.css?v=1.7') }}">
   <script src="{{ asset('vitecss/js/alpine.bundle.js') }}"></script>
   <script src="{{ asset('vitecss/js/app.js') }}"></script>
    <title>{{ config('app.name') }} - @yield('title')</title>
    <style>
        main{
           background-image: 
  radial-gradient(circle at center, var(--primary-03) 0%, transparent 70%),
  linear-gradient(to right, var(--primary-01) 1px, transparent 1px),
  linear-gradient(to bottom, var(--primary-01) 1px, transparent 1px);
background-size: 
  100% 100%,
  40px 40px,
  40px 40px;
  padding:0; 
        }
       @media(min-width:800px){
        main{
            padding:20px 10vw;
        }
       }
    </style>
    @yield('css')
</head>
<body>
    <header class="w-full row align-center space-between p-20px">
        <img src="{{ asset(config('app.logo')) }}" alt="" class="w-40px">
        <div x-on:click="
        Vitecss.navigate('{{ url('profile') }}')
        " class="h-40px w-40px circle bg-primary primary-text no-select column align-center justify-center">
            @foreach (explode(' ',Auth::guard('users')->user()->name,2) as $name)
                {{ substr($name,0,1) }}
            @endforeach
        </div>
    </header>
    <main>
        @yield('main')
    </main>
    @yield('js')
</body>
</html>