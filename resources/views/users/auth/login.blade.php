@extends('layout.users.auth')
@section('title')
    login
@endsection
@section('css')
  
@endsection
@section('main')
    <section class="w-full p-20px flex-auto column g-10px align-center justify-center">
        {{-- logo --}}
            <img src="{{ asset(config('app.logo')) }}" alt="" class="w-70px no-select no-pointer">
            <span class="opacity-07 font-weight-600 font-size-09">Your gateway to seamless payments</span>
       
        <form x-on:submit="PostRequest(event,$el,function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
              window.location.href='{{ url('dashboard') }}'
            }
        })" method="POST" action="{{ url('users/post/login/process') }}" class="w-full column g-10px bg-light max-w-500px br-10px p-20px border-width-1px border-style-solid border-color-rgt-01 align-center">
          {{-- csrf token --}}
          <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
            {{-- new --}}
           <strong class="desc no-select font-weight-900">Sign In</strong>
           <span class="opacity-07">Sign in to your account to continue</span>
           {{-- new row --}}
           <div class="row m-bottom-20px w-full p-5px opacity-07 no-select align-center bg-rgt-01 br-10px">
            <div  x-on:click="Vitecss.navigate('{{ url('register') }}')" class="p-10px w-full br-inherit row align-center justify-center">
                Sign Up
            </div>
             <div x-on:click="Vitecss.navigate('{{ url('login') }}')" class="p-10px w-full bg br-inherit row align-center justify-center">
                Sign In
            </div>
           </div>
          
           
             {{-- new input --}}
            <div class="column g-5px w-full">
                <span>Email Address</span>
                <div class="cont">
                    <input name="email" type="email" placeholder="david@example.com" class="inp input required">
                </div>
            </div>
            
              {{-- new input --}}
            <div class="column g-5px w-full">
                <span>Password</span>
                <div class="cont">
                    <input name="password" type="password" placeholder="********" class="inp input required">
                </div>
            </div>
            {{-- submit btn --}}
            <button class="post">Login</button>
        </form>
    </section>
@endsection