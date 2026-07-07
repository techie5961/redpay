@extends('layout.users.auth')
@section('title')
    login
@endsection
@section('css')
  
@endsection
@section('main')
    <section class="w-full p-20px flex-auto column g-10px align-center justify-center">
       
        <form x-on:submit="PostRequest(event,$el,function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
              window.location.href='{{ url('admins/dashboard') }}'
            }
        })" method="POST" action="{{ url('admins/post/login/process') }}" class="w-full column g-10px bg-light max-w-500px br-10px p-20px border-width-1px border-style-solid border-color-rgt-01 align-center">
          {{-- csrf token --}}
          <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
            {{-- new --}}
            <img src="{{ asset(config('app.logo')) }}" alt="" class="w-70px no-select no-pointer">

           <strong class="desc no-select font-weight-900">Admin Login</strong>
           <span class="opacity-07 text-center">Sign in with your account details to continue to your admin dashboard</span>
         
          
           
             {{-- new input --}}
            <div class="column g-5px w-full">
                <span>Admin Tag</span>
                <div class="cont">
                    <input name="tag" type="text" placeholder="exampleadmin" class="inp input required">
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
            <button class="post">Login Safely</button>
        </form>
    </section>
@endsection