@extends('layout.users.app')
@section('title')
   refer & earn
@endsection
@section('main')
    <section x-data="{ 
        Toggled : false
     }" class="w-full column g-10px p-20px">

    
   
    {{-- contents --}}
 <div class="w-full column g-10px">
    <div class="w-full column g-5px text-center">
           <strong class="font-size-1-5 font-weight-900">Refer & Earn</strong>
    <span class="opacity-07">Invite friends and earn rewards</span>
    </div>
   {{-- new row --}}
   <div class="row w-full g-10px align-center">
    <div class="w-full column br-10px p-20px align-center g-10px bg-black-transparent border-width-1px border-color-rgt-02 border-style-solid">
        <i class="c-primary">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z"></path></svg>

        </i>
        <strong class="font-size-1-5 font-weight-900">{{ number_format($total_referred) }}</strong>
        <span class="opacity-07">Total Referrals</span>
    </div>
    <div class="w-full overflow-hidden column br-10px p-20px align-center g-10px bg-black-transparent border-width-1px border-color-rgt-02 border-style-solid">
        <i class="c-whatsapp">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM11.0049 10.0028H5.00488V19.0028H11.0049V10.0028ZM19.0049 10.0028H13.0049V19.0028H19.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z"></path></svg>

        </i>
        <strong class="font-size-1-5 font-weight-900 ws-nowrap text-overflow-ellipsis w-fit">&#8358;{{ number_format($total_referral_earnings) }}</strong>
        <span class="opacity-07">Total Earnings</span>
    </div>

   </div>
   {{-- new  --}}
   <div class="w-full overflow-hidden br-10px column g-10px p-20px bg-primary-01 border-width-1px border-style-solid border-color-primary-02 align-center text-align-center">
    <span class="opacity-07">Share your link and earn &#8358;{{ number_format($general_settings->referral_bonus) }} per referral</span>
    <small class="opacity-07">Your Referral Link</small>
   <span x-on:click="copy('{{ url('register?ref='.strtoupper(Auth::guard('users')->user()->uniqid).'') }}')" class="u c-primary break-word max-w-full overflow-hidden">{{ url('register?ref='.strtoupper(Auth::guard('users')->user()->uniqid).'') }}</span>
   </div>
   {{-- new --}}
   <div class="w-full column p-20px br-10px g-10px bg-black-traansparent border-width-1px border-style-solid border-color-rgt-02">
    {{-- new row --}}
    <div class="row align-center">
        <i class="opacity-07">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z"></path></svg>

        </i>
        <span class="opacity-07">Your Referral Code</span>

    </div>
    <div class="w-full row align-center space-between p-10px br-10px bg-primary-01 border-width-1px border-style-solid border-color-primary-02">
        <strong class="font-size-1-3 font-weight-900 c-primary">{{ strtoupper(Auth::guard('users')->user()->uniqid) }}</strong>
    <div x-data="{ 
        Copied : false
     }" x-on:click="
     copy('{{ strtoupper(Auth::guard('users')->user()->uniqid) }}');
     Copied = true;
     setTimeout(()=>{
        Copied = false;
     },500)
     " class="bg-rgb-01 br-10px border-width-1px border-style-solid border-color-rgt-02 h-40px w-40px column align-center justify-center">
        <svg x-show="!Copied" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>
        <svg x-show="Copied" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

    </div>
    </div>
     {{-- new row --}}
    <div class="row align-center">
        <i class="opacity-07">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z"></path></svg>

        </i>
        <span class="opacity-07">Your Referral Link</span>

    </div>
    {{-- new row --}}
    <div class="row align-center g-10px">
          <span style="font-family:monospace;" class="opacity-07 border-style-solid border-width-1px border-color-rgt-02 p-5px font-size-06 ws-nowrap text-overflow-ellipsis max-w-full overflow-hidden">{{ url('register?ref='.strtoupper(Auth::guard('users')->user()->uniqid).'') }}</span>
         <div x-data="{ 
        Copied : false
     }" x-on:click="
     copy('{{ url('register?ref='.strtoupper(Auth::guard('users')->user()->uniqid).'') }}');
     Copied = true;
     setTimeout(()=>{
        Copied = false;
     },500)
     " class="bg-rgb-01 border-width-1px border-style-solid border-color-rgt-02 p-5px column align-center justify-center">
        <svg x-show="!Copied" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>
        <svg x-show="Copied" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

    </div>
    

    </div>
    <button class="btn-primary w-full br-10px">
        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1202 17.0228L8.92129 14.7324C8.19135 15.5125 7.15261 16 6 16C3.79086 16 2 14.2091 2 12C2 9.79086 3.79086 8 6 8C7.15255 8 8.19125 8.48746 8.92118 9.26746L13.1202 6.97713C13.0417 6.66441 13 6.33707 13 6C13 3.79086 14.7909 2 17 2C19.2091 2 21 3.79086 21 6C21 8.20914 19.2091 10 17 10C15.8474 10 14.8087 9.51251 14.0787 8.73246L9.87977 11.0228C9.9583 11.3355 10 11.6629 10 12C10 12.3371 9.95831 12.6644 9.87981 12.9771L14.0788 15.2675C14.8087 14.4875 15.8474 14 17 14C19.2091 14 21 15.7909 21 18C21 20.2091 19.2091 22 17 22C14.7909 22 13 20.2091 13 18C13 17.6629 13.0417 17.3355 13.1202 17.0228ZM6 14C7.10457 14 8 13.1046 8 12C8 10.8954 7.10457 10 6 10C4.89543 10 4 10.8954 4 12C4 13.1046 4.89543 14 6 14ZM17 8C18.1046 8 19 7.10457 19 6C19 4.89543 18.1046 4 17 4C15.8954 4 15 4.89543 15 6C15 7.10457 15.8954 8 17 8ZM17 20C18.1046 20 19 19.1046 19 18C19 16.8954 18.1046 16 17 16C15.8954 16 15 16.8954 15 18C15 19.1046 15.8954 20 17 20Z"></path></svg>

        Share Link
    </button>

   </div>
   <div class="w-full column p-20px br-10px g-10px bg-black-traansparent border-width-1px border-style-solid border-color-rgt-02">
  <strong class="font-weight-800 font-size-1">How it Works</strong>
  {{-- new row --}}
  <div class="row g-10px w-full">
    <div class="h-40px font-weight-900 w-40px no-shrink circle column align-center justify-center no-select bg-primary-02 c-primary">1</div>
  {{-- new column --}}
<div class="column">
    <strong class="font-size-1">Share your link</strong>
    <span class="opacity-07">Send your referral link to your friends & families</span>
</div>
</div>
{{-- new row --}}
  <div class="row g-10px w-full">
    <div class="h-40px font-weight-900 w-40px no-shrink circle column align-center justify-center no-select bg-primary-02 c-primary">2</div>
  {{-- new column --}}
<div class="column">
    <strong class="font-size-1">They sign up</strong>
    <span class="opacity-07">Your friend registers througn your referral link</span>
</div>
</div>
{{-- new row --}}
  <div class="row g-10px w-full">
    <div class="h-40px font-weight-900 w-40px no-shrink circle column align-center justify-center no-select bg-primary-02 c-primary">3</div>
  {{-- new column --}}
<div class="column">
    <strong class="font-size-1">Earn Rewards</strong>
    <span class="opacity-07">get &#8358;{{ number_format($general_settings->referral_bonus) }} credited to your wallet instantly</span>
</div>
</div>

</div>
 </div>
    </section>
    
@endsection