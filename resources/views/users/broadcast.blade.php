@extends('layout.users.app')
@section('title')
    broadcast
@endsection
@section('main')
    <section x-data="{ 
        Toggled : false
     }" class="w-full column g-10px p-20px">

    
   
    {{-- contents --}}
 <div class="w-full column g-10px">
    <div class="w-full column g-5px text-center">
           <strong class="font-size-1-5 font-weight-900">Broadcast</strong>
    <span class="opacity-07">Purchase airtime or data</span>
    </div>
    {{-- new --}}
    <form method="POST" x-on:submit.prevent="
   
    if($refs.file.value == ''){
        CreateNotify('error','Please upload payment proof');
    }else{

 PostRequest(event,$el,function(){
    ShowConfirmation = true;
 });
    }
   " action="{{ url('users/post/submit/payment/proof/process') }}" class="w-full align-center g-10px column p-20px br-10px bg-10px border-width-1px border-color-rgt-02 border-style-solid">
        <div class="w-full br-10 column g-3px p-20px align-center bg-primary-01 border-width-1px border-style-solid border color-primary-02">
            <small class="opacity-07">Available Balance</small>
            <strong class="font-size-1-5 font-weight-900 c-primary">{{ number_format(Auth::guard('users')->user()->balance,2) }}</strong>
        </div>
        {{-- new --}}
        <div class="w-full br-10px p-10px bg-rgt-01 row g-10px align-center space-between">
            <div class="row align-center g-5px">
                <i>
                    <svg x-show="!Toggled" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z"></path></svg>
                    <svg x-show="Toggled" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6 2H18C18.5523 2 19 2.44772 19 3V21C19 21.5523 18.5523 22 18 22H6C5.44772 22 5 21.5523 5 21V3C5 2.44772 5.44772 2 6 2ZM12 17C11.4477 17 11 17.4477 11 18C11 18.5523 11.4477 19 12 19C12.5523 19 13 18.5523 13 18C13 17.4477 12.5523 17 12 17Z"></path></svg>

                </i>
                <span class="font-weight-600 font-size-1"x-text="Toggled ? 'Data' : 'Airtime'">Airtime</span>
            </div>
            <div class="row align-center g-5px">
                <span class="opacity-07"> Airtime</span>
                <div x-ref="toggle" class="toggle" x-bind:class="Toggled ? 'active' : ''">
                    <div x-on:click="
                   Toggled = !Toggled
                    " class="child"></div>
                </div>
                <span class="opacity-07">Data</span>
            </div>
        </div>
        <div class="h-100 w-100 circle bg-primary-01 c-primary column align-center justify-center">
            <svg x-show="!Toggled" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="40" width="40"><path d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z"></path></svg>
            <svg x-show="Toggled" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="40" width="40"><path d="M6 2H18C18.5523 2 19 2.44772 19 3V21C19 21.5523 18.5523 22 18 22H6C5.44772 22 5 21.5523 5 21V3C5 2.44772 5.44772 2 6 2ZM12 17C11.4477 17 11 17.4477 11 18C11 18.5523 11.4477 19 12 19C12.5523 19 13 18.5523 13 18C13 17.4477 12.5523 17 12 17Z"></path></svg>

        </div>
    <template x-if="!Toggled">
        <div class="column w-full g-10px">
               <div class="w-full column g-10px">
          {{-- new input --}}
       <div class="column w-full g-5px">
         <label>Phone Number</label>
        <div class="cont bg-black-transparent">
            <input placeholder="090 1234 5678" x-mask="999 9999 9999" type="text" inputmode="numeric" class="inp input required">
        </div>
       </div>
         {{-- new input --}}
       <div class="column w-full g-5px">
         <label>Amount</label>
        <div class="cont bg-black-transparent">
            <input placeholder="1,000" type="number" inputmode="numeric" class="inp input required">
        </div>
       </div>
        {{-- new input --}}
       <div class="column w-full g-5px">
         <label>RPC Code</label>
        <div class="cont bg-black-transparent">
            <input placeholder="**** **** **** ****" type="text" class="inp input required">
        </div>
        <small class="c-red">⚠RPC code is required to proceed</small>
       </div>
        <button class="btn-primary m-top-10px w-full br-10px">Purchase Airtime</button>
      </div>
        </div>
    </template>
     <template x-if="Toggled">
        <div class="column w-full g-10px">
               <div class="w-full column g-10px">
          {{-- new input --}}
       <div class="column w-full g-5px">
         <label>Phone Number</label>
        <div class="cont bg-black-transparent">
            <input placeholder="090 1234 5678" x-mask="999 9999 9999" type="text" inputmode="numeric" class="inp input required">
        </div>
       </div>
         {{-- new input --}}
       <div class="column w-full g-5px">
         <label>Data Plan</label>
        <div class="cont bg-black-transparent">
       <select name="" id="" class="inp input">
        <option value="" selected disable>Select data plan</option>
        <option value="500mb">500MB - &#8358;500</option>
        <option value="1000mb">1GB - &#8358;1,000</option>
        <option value="2000mb">2GB - &#8358;2,000</option>
        <option value="5000mb">5GB - &#8358;5,000</option>
        <option value="10000mb">10GB - &#8358;10,000</option>
    </select>     
        </div>
       </div>
        {{-- new input --}}
       <div class="column w-full g-5px">
         <label>RPC Code</label>
        <div class="cont bg-black-transparent">
            <input placeholder="**** **** **** ****" type="text" class="inp input required">
        </div>
        <small class="c-red">⚠RPC code is required to proceed</small>
       </div>
        <button class="btn-primary m-top-10px w-full br-10px">Purchase Data</button>
      </div>
        </div>
    </template>
    </form>
 </div>
    </section>
    
@endsection