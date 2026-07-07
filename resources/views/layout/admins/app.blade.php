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
   <link rel="stylesheet" href="{{ asset('vitecss/css/app.css?v=1.6') }}">
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
    <header x-data="{ 
        DropDown : false
     }" x-init="
     document.querySelector('main').style.marginTop=$el.offsetHeight + 'px';
     " class="w-full g-10px pos-fixed top-0 border-bottom-width-1px border-bottom-color-primary-02 backdrop-blur-10px z-index-1000 border-bottom-style-solid row align-center space-between p-20px">
        <img src="{{ asset(config('app.logo')) }}" alt="" class="w-40px">
        <strong style="background:linear-gradient(to right,orangered,red);background-clip:text;-webkit-background-clip:text;-webkit-text-fill-color:transparent;" class="desc font-weight-900">Admin!</strong>
       <i x-on:click="DropDown = !DropDown" class="row m-left-auto">
        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>

       </i>
        <div class="h-40px capitalize w-40px circle bg-primary primary-text no-select column align-center justify-center">
            @foreach (explode(' ',Auth::guard('admins')->user()->tag,1) as $name)
                {{ substr($name,0,1) }}
            @endforeach
        </div>
        <div x-on:click.outside="DropDown = false;" style="transform-origin:top;" x-transition:enter-start="scale-enter" x-transition:enter-end="scale-enter-end" x-transition:leave-start="scale-leave" x-transition:leave-end="scale-leave-end" x-show="DropDown" class="pos-absolute transition-all right-0 z-index-500 top-full br-5px backdrop-blur-10px border-width-1px border-style-solid border-color-primary-02 column g-5px">
            {{-- new row --}}
            <div class="row border-bottom-width-1px border-bottom-style-solid border-bottom-color-primary-02 w-full p-10px align-center g-20px">
                <i>
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20 22H18V20C18 18.3431 16.6569 17 15 17H9C7.34315 17 6 18.3431 6 20V22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13ZM12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"></path></svg>

                </i>
                <span>My Account</span>
            </div>
             {{-- new row --}}
            <div x-on:click="window.location.href='{{ url('admins/logout') }}'" class="row w-full p-10px align-center g-20px">
                <i>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM17 16L22 12L17 8V11H9V13H17V16Z"></path></svg>

                </i>
                <span>Logout</span>
            </div>
        </div>
    </header>
    <main>
        @yield('main')
    </main>
    @yield('js')
</body>
</html>