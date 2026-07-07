@extends('layout.users.app')
@section('title')
    profile
@endsection
@section('css')
    <style class="css">
        header{
            display:none !important;
        }
    </style>
@endsection
@section('main')
    <section class="w-full flex-auto p-20px column g-10px align-center">
       <div class="w-full row m-bottom-20px align-center space-between">
        <div x-on:click="Vitecss.navigate('{{ url('dashboard') }}')" class="glass h-30px w-30px column align-center circle justify-center">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path></svg>

        </div>
        <strong class="font-weight-800 font-size-1">Profile</strong>
        <span></span>
       </div>
        <div class="h-100 w-100 circle font-size-1-5 column align-center justify-center g-10px bg-primary primary-text no-select">
              @foreach (explode(' ',Auth::guard('users')->user()->name,2) as $name)
                {{ substr($name,0,1) }}
            @endforeach
        </div>
       <div class="column align-center">
         <strong class="desc font-weight-900">{{ Auth::guard('users')->user()->name }}</strong>
        <span class="opacity-07">Active</span>
       </div>
       {{-- new --}}
       <div class="w-full bg-light border-width-1px border-style-solid border-color-rgt-02 p-10px br-5px column g-5px">
        <span class="opacity-07 font-size-07">Email</span>
        <span>{{ Auth::guard('users')->user()->email }}</span>
       </div>
         {{-- new --}}
       <div class="w-full bg-light border-width-1px border-style-solid border-color-rgt-02 p-10px br-5px column g-5px">
        <span class="opacity-07 font-size-07">Phone</span>
        <span>{{ Auth::guard('users')->user()->phone }}</span>
       </div>
         {{-- new --}}
       <div class="w-full bg-light border-width-1px border-style-solid border-color-rgt-02 p-10px br-5px column g-5px">
        <span class="opacity-07 font-size-07">Country</span>
        <span>Nigeria</span>
       </div>
         {{-- new --}}
       <div class="w-full bg-light border-width-1px border-style-solid border-color-rgt-02 p-10px br-5px column g-5px">
        <span class="opacity-07 font-size-07">User ID</span>
        <span>{{ Auth::guard('users')->user()->uniqid }}</span>
       </div>
       <button x-data="{ 
        Copied : false
        }" x-on:click="
       copy('{{ Auth::guard('users')->user()->uniqid }}');
       Copied = true;
       setTimeout(() => {
        Copied = false;
       }, 1000);
       " class="w-full m-top-auto btn-primary p-10px">
        <template x-if="!Copied">
            <div class="row align-center g-5px">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM5.00242 8L5.00019 20H14.9998V8H5.00242ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

        Copy User ID
            </div>
        </template>
         <template x-if="Copied">
            <div class="row align-center g-5px">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12ZM12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM17.4571 9.45711L16.0429 8.04289L11 13.0858L8.20711 10.2929L6.79289 11.7071L11 15.9142L17.4571 9.45711Z"></path></svg>

        Copied
            </div>
        </template>
    </button>
    </section>
@endsection