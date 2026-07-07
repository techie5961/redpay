@extends('layout.admins.app')
@section('title')
    dashboard
@endsection
@section('main')
    <section class="w-full p-20px column g-10px">
       <div class="column">
         <strong class="c-primary desc font-weight-900 capitalize">Hello, {{ Auth::guard('admins')->user()->role }}</strong>
        <span class="opacity-07">Here's what's happening today.</span>
      
       </div>
        <div class="w-full bg-light column g-10px br-2px p-20px border=left-width-5px border-left-style-solid border-left-color-primary-07">
            <strong class="uppercase">Registered users</strong>
            <strong class="font-size-1-5 font-weight-900">{{ number_format($total_users) }}</strong>
            <span>{{ number_format($new_users) }} new user(s) joined today.</span>
        </div>

        {{-- bank form --}}
        <div class="column m-top-10px">
        <strong class="font-weight-900 c-primary desc">Bank Details</strong>
        <span class="opacity-07">Update Payment bank details</span>
        </div>
        <form x-on:submit="PostRequest(event,$el)" method="POST" action="{{ url('admins/post/update/bank/details/process') }}" class="w-full column g-10px bg-light br-10px p-15px border-width-1px border-style-solid border-color-rgt-02">
           {{-- csrf token --}}
           <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
            {{-- new input --}}
            <div class="column g-5px w-full">
                <label>Account Number</label>
                <div class="cont border-color-rgt-01 bg-rgt-003">
                    <input value="{{ $bank_details->account_number ?? '' }}" name="account_number" placeholder="Enter 10 digits account number" type="text" inputmode="numeric" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column g-5px w-full">
                <label>Bank Name</label>
                <div class="cont border-color-rgt-01 bg-rgt-003">
                    <input value="{{ $bank_details->bank_name ?? '' }}" name="bank_name" placeholder="Enter the name of the bank attached to the account number" type="text" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column g-5px w-full">
                <label>Account Name</label>
                <div class="cont border-color-rgt-01 bg-rgt-003">
                    <input value="{{ $bank_details->account_name ?? '' }}"  name="account_name" placeholder="Enter your account name" type="text" class="inp input required">
                </div>
            </div>
            <button class="post">Save Bank Details</button>
        </form>
         {{-- social form --}}
        <div class="column m-top-10px">
        <strong class="font-weight-900 c-primary desc">Social Settings</strong>
        <span class="opacity-07">Update social/support settings</span>
        </div>
        <form x-on:submit="PostRequest(event,$el)" method="POST" action="{{ url('admins/post/update/social/settings/process') }}" class="w-full column g-10px bg-light br-10px p-15px border-width-1px border-style-solid border-color-rgt-02">
           {{-- csrf token --}}
           <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
              {{-- new input --}}
            <div class="column g-5px w-full">
                <label>Platform Whatsapp Group</label>
                <div class="cont border-color-rgt-01 bg-rgt-003">
                    <input value="{{ $social_settings->whatsapp_group ?? '' }}" name="whatsapp_group" placeholder="Eg https://wa.me/....." type="url" class="inp input required">
                </div>
            </div>
           {{-- new input --}}
            <div class="column g-5px w-full">
                <label>Platform Telegram Channel</label>
                <div class="cont border-color-rgt-01 bg-rgt-003">
                    <input value="{{ $social_settings->telegram_group ?? '' }}" name="telegram_group" placeholder="Eg https://t.me/....." type="url" class="inp input required">
                </div>
            </div>
           {{-- new input --}}
            <div class="column g-5px w-full">
                <label>Whatsapp Support Link</label>
                <div class="cont border-color-rgt-01 bg-rgt-003">
                    <input value="{{ $social_settings->whatsapp_link ?? '' }}" name="whatsapp_link" placeholder="Eg https://wa.me/....." type="url" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column g-5px w-full">
                <label>Telegram Support Link</label>
                <div class="cont border-color-rgt-01 bg-rgt-003">
                    <input value="{{ $social_settings->telegram_link ?? '' }}" name="telegram_link" placeholder="Eg https://t.me/....." type="url" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column g-5px w-full">
                <label>Support Email Address</label>
                <div class="cont border-color-rgt-01 bg-rgt-003">
                    <input value="{{ $social_settings->email_address ?? '' }}" name="email_address" placeholder="Eg you@example.com" type="email" class="inp input required">
                </div>
            </div>
           
            <button class="post">Save Social Settings</button>
        </form>
         {{-- general form --}}
        <div class="column m-top-10px">
        <strong class="font-weight-900 c-primary desc">General Settings</strong>
        <span class="opacity-07">Update general settings</span>
        </div>
        <form x-on:submit="PostRequest(event,$el)" method="POST" action="{{ url('admins/post/update/general/settings/process') }}" class="w-full column g-10px bg-light br-10px p-15px border-width-1px border-style-solid border-color-rgt-02">
           {{-- csrf token --}}
           <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
            {{-- new input --}}
            <div class="column g-5px w-full">
                <label>Welcome Bonus</label>
                <div class="cont border-color-rgt-01 bg-rgt-003">
                    <input value="{{ $general_settings->welcome_bonus ?? '' }}" name="welcome_bonus" placeholder="Eg 500" type="number" inputmode="numeric" class="inp input required">
                </div>
            </div>
            {{-- new input --}}
            <div class="column g-5px w-full">
                <label>Referral Bonus</label>
                <div class="cont border-color-rgt-01 bg-rgt-003">
                    <input value="{{ $general_settings->referral_bonus ?? '' }}" name="referral_bonus" placeholder="Eg 3500" type="number" inputmode="numeric" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column g-5px w-full">
                <label>RPC Price</label>
                <div class="cont border-color-rgt-01 bg-rgt-003">
                    <input value="{{ $general_settings->rpc_price ?? '' }}" name="rpc_price" placeholder="Eg 7600" type="number" inputmode="numeric" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column g-5px w-full">
                <label>Daily Check-In</label>
                <div class="cont border-color-rgt-01 bg-rgt-003">
                    <input value="{{ $general_settings->check_in ?? '' }}" name="check_in" placeholder="Eg 2400" type="number" inputmode="numeric" class="inp input required">
                </div>
            </div>
           
           
            <button class="post">Save General Settings</button>
        </form>
    </section>
@endsection