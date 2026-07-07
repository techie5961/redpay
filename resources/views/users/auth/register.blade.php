@extends('layout.users.auth')
@section('title')
    register
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
                Vitecss.navigate('{{ url('login') }}')
            }
        })" method="POST" action="{{ url('users/post/register/process') }}" class="w-full column g-10px bg-light max-w-500px br-10px p-20px border-width-1px border-style-solid border-color-rgt-01 align-center">
          {{-- csrf token --}}
          <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
            {{-- new --}}
           <strong class="desc no-select font-weight-900">Get Started</strong>
           <span class="opacity-07">Create and account to continue</span>
           {{-- new row --}}
           <div class="row m-bottom-20px w-full p-5px opacity-07 no-select align-center bg-rgt-01 br-10px">
            <div  x-on:click="Vitecss.navigate('{{ url('register') }}')" class="p-10px w-full bg br-inherit row align-center justify-center">
                Sign Up
            </div>
             <div x-on:click="Vitecss.navigate('{{ url('login') }}')" class="p-10px w-full br-inherit row align-center justify-center">
                Sign In
            </div>
           </div>
           {{-- new row --}}
           <div class="row w-full align-center g-10px">
            {{-- new input --}}
            <div class="column g-5px w-full">
                <span>First name</span>
                <div class="cont">
                    <input name="first_name" type="text" placeholder="David" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column g-5px w-full">
                <span>Last name</span>
                <div class="cont">
                    <input name="last_name" type="text" placeholder="James" class="inp input required">
                </div>
            </div>
           </div>
            {{-- new input --}}
            <div class="column g-5px w-full">
                <span>Phone Number</span>
                <div class="cont">
                    <input name="phone" x-mask="999 9999 9999" inputmode="numeric" placeholder="080 0000 0000" class="inp input required">
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
            <div x-data="{ 
                Status : 'individual',
                ShowDropdown : false
             }" x-on:click="ShowDropdown = !ShowDropdown" class="column pos-relative g-5px w-full">
                <span>Status</span>
                <div style="overflow:auto !important;" class="column h-40 border-width-1px border-color-rgt-01 bg-rgt-005 br-5px border-style-solid border-color-rgt-01 overflow-hidden pos-relative">
                    {{-- new row --}}
                    <div class="row p-10px w-full overflow-hidden align-center g-10px space-between">
                        <span class="capitalize" x-text="Status"></span>
                        <input name="status" class="inp input required" x-bind:value="Status" type="hidden">
                        <i class="row h-fit">
                            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>

                        </i>
                    </div>
                    
                    
                </div>
                <div x-on:click.stop="" x-on:click.outside="ShowDropdown = false;" x-show="ShowDropdown" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" class="br-5px transition-all p-5px pos-absolute right-0 top-full left-0 bg-light border-width-1px border-color-rgt-02 border-style-solid z-index-500">
                        <div x-on:click="Status = 'individual'"  x-bind:class="Status == 'individual' ? 'bg-primary primary-text' : ''" class="w-full align-center space-between br-inherit p-10px row align-center g-10px">
                            <span>Individual</span>
                            <template x-if="Status == 'individual';ShowDropdown = false;">
                                <div>
                                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>

                                </div>
                            </template>
                        </div>
                        <div x-on:click="Status = 'business';ShowDropdown = false;"  x-bind:class="Status == 'business' ? 'bg-primary primary-text' : ''" class="w-full align-center space-between br-inherit p-10px row align-center g-10px">
                            <span>Business</span>
                            <template x-if="Status == 'business'">
                                <div>
                                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>

                                </div>
                            </template>
                        </div>
                        <div x-on:click="Status = 'agent';ShowDropdown = false;" x-bind:class="Status == 'agent' ? 'bg-primary primary-text' : ''" class="w-full align-center space-between br-inherit p-10px row align-center g-10px">
                            <span>Agent</span>
                            <template x-if="Status == 'agent'">
                                <div>
                                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>

                                </div>
                            </template>
                        </div>
                    </div>
            </div>
             {{-- new input --}}
            <div class="column g-5px w-full">
                <span>Referral Code(optional)</span>
                <div class="cont">
                    <input value="{{ $ref ?? '' }}" name="ref" type="text" class="inp input" placeholder="Enter code">
                </div>
                <small class="opacity-07">Have a referral code? add it to earn rewards</small>
            </div>
              {{-- new input --}}
            <div class="column g-5px w-full">
                <span>Password</span>
                <div class="cont">
                    <input name="password" type="password" placeholder="********" class="inp input required">
                </div>
            </div>
            {{-- submit btn --}}
            <button class="post">Create Account</button>
        </form>
    </section>
@endsection