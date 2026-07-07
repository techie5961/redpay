@extends('layout.users.app')
@section('title')
    Buy RPC
@endsection
@section('main')
    <section x-data="{ 
        ShowNav : false,
        ShowConfirmation : false
     }" class="w-full column g-10px p-20px">

    
    <section x-init="
    $watch('ShowNav', (value) => {
        if(ShowNav){
            document.dody.classList.add('overflow-hidden');
        }else{
            document.dody.classList.remove('overflow-hidden');

        }
    })
    " x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end"   x-on:click="ShowNav = false" x-show="ShowNav" class="pos-fixed column g-10px align-center justify-center p-20px transition-all inset-0 z-index-1000 bg-black-transparent backdrop-blur-10px">
        <div x-on:click.stop="" class="w-w-full br-5px p-15px w-full max-w-500px column g-10px bg-light border-width-1px border-style-solid border-color-rgt-02">
            {{-- new row --}}
            <div class="row align-center g-5px space-between">
                <div class="h-40 w-40 no-shrink circle bg-gold-transparent c-gold column align-center justify-center">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11 15H13V17H11V15ZM11 7H13V13H11V7Z"></path></svg>

                </div>
                <strong class="font-weight-900 font-size-1 block m-right-auto">Important Payment Notice</strong>
                <i x-on:click="ShowNav = false" class="row h-fit m-bottom-auto">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z"></path></svg>

                </i>
            </div>
            {{-- new row --}}
            <div class="row w-full g-10px">
                <span>&bull;</span>
                <span>Transfer the <strong>exact amount</strong> shown on this page.</span>
            </div>
              {{-- new row --}}
            <div class="row w-full g-10px">
                <span>&bull;</span>
                <span>Upload a clear <strong>payment screenshot</strong> immediately after transfer.</span>
            </div>
              {{-- new row --}}
            <div class="row w-full g-10px">
                <span class="c-gold">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M15 4H5V20H19V8H15V4ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H16L20.9997 7L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918ZM11 15H13V17H11V15ZM11 7H13V13H11V7Z"></path></svg>
                </span>
                <span><strong class="c-orange">Avoid using Opay microfinance bank.</strong> Due to temporary network issues from Opay servers, payments made with Opay mey not be confirmed. Please use <strong>any other Nigeria bank</strong> for instant payment confirmation.</span>
            </div>
             {{-- new row --}}
            <div class="row w-full g-10px">
                <span class="c-green">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12ZM12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM17.4571 9.45711L16.0429 8.04289L11 13.0858L8.20711 10.2929L6.79289 11.7071L11 15.9142L17.4571 9.45711Z"></path></svg>
                </span>
                <span>Payments made with other banks are confirmed within minutes.</span>
            </div>
             {{-- new row --}}
            <div class="row w-full g-10px">
                <span class="c-coral">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z"></path></svg>
                </span>
                <span>Do not dispute your payment undr any circumstances &mdash; disputes delay confirmation.</span>
            </div>
            <button x-on:click="ShowNav = false" class="btn-primary-3d w-full">I Understand</button>
        </div>
    </section>
    {{-- contents --}}
 <div class="w-full column g-10px">
    <div class="w-full column g-5px text-center">
           <strong class="font-size-1-5 font-weight-900">Payment Instructions</strong>
    <span class="opacity-07">Transfer to the account below</span>
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
   " action="{{ url('users/post/submit/payment/proof/process') }}" class="w-full g-10px column p-20px br-10px bg-10px border-width-1px border-color-rgt-02 border-style-solid">
      {{-- csrf token --}}
      <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
      <div x-data="{ 
            Copied : false
         }" class="w-full br-10px p-15px bg-primary-01 border-width-1px border-style-solid border-color-primary-02 row align-center space-between">
            {{-- column --}}
            <div class="column g-5px">
                <small class="opacity-07">Amount to Pay</small>
                <strong class="font-weight-900 font-size-1-5rem c-primary">
                &#8358;{{ number_format($general_settings->rpc_price,2) }}
                </strong>
            </div>
            {{-- new --}}
           <template x-if="Copied">
             <div class="p-10px border-width-1px c-green border-style-solid border-color-green h-40px w-40pc no-shrink br-5px bg-green-transparent">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>

            </div>
           </template>
             <template x-if="!Copied">
             <div x-on:click="
             copy('{{ $general_settings->rpc_price }}');
             Copied = true;
             setTimeout(() => {
                Copied = false;
             }, 500);
             " class="p-10px border-width-1px border-style-solid border-color-rgt-02 h-40px w-40pc no-shrink br-5px bg-black-transparent">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

            </div>
           </template>
        </div>
        {{-- new item --}}
        <div x-data="{ 
            Copied : false
         }" class="w-full br-10px p-15px bg-black-transparent row align-center space-between">
            {{-- column --}}
            <div class="column g-5px">
                <small class="opacity-07">Account Number</small>
                <strong class="font-weight-900 font-size-1-1rem">
               {{ $bank_details->account_number }}
                </strong>
            </div>
            {{-- new --}}
           <template x-if="Copied">
             <div class="p-10px border-width-1px c-green border-style-solid border-color-green h-40px w-40pc no-shrink br-5px bg-green-transparent">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>

            </div>
           </template>
             <template x-if="!Copied">
             <div x-on:click="
             copy('{{ $bank_details->account_number }}');
             Copied = true;
             setTimeout(() => {
                Copied = false;
             }, 500);
             " class="p-10px border-width-1px border-style-solid border-color-rgt-02 h-40px w-40pc no-shrink br-5px bg-black-transparent">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

            </div>
           </template>
        </div>
        {{-- new item --}}
        <div class="w-full br-10px p-15px bg-black-transparent row align-center space-between">
            {{-- column --}}
            <div class="column g-5px">
                <small class="opacity-07">Bank Name</small>
                <strong class="font-weight-900 font-size-1-1rem">
               {{ $bank_details->bank_name }}
                </strong>
            </div>
          
        </div>
         {{-- new item --}}
        <div class="w-full br-10px p-15px bg-black-transparent row align-center space-between">
            {{-- column --}}
            <div class="column g-5px">
                <small class="opacity-07">Account Name</small>
                <strong class="font-weight-900 font-size-1-1rem">
               {{ $bank_details->account_name }}
                </strong>
            </div>
          
        </div>
        {{-- new --}}
        <label class="w-full h-150px align-center br-5px backddrop-blur-10px border-width-1px border-style-solid border-color-primary-02 bg-primary-01 p-20px column g-10px text-align-center">
            <svg viewBox="0 0 24 24" fill="var(--primary)" xmlns="http://www.w3.org/2000/svg" height="40" width="40"><path d="M12 12.5858L16.2426 16.8284L14.8284 18.2426L13 16.415V22H11V16.413L9.17157 18.2426L7.75736 16.8284L12 12.5858ZM12 2C15.5934 2 18.5544 4.70761 18.9541 8.19395C21.2858 8.83154 23 10.9656 23 13.5C23 16.3688 20.8036 18.7246 18.0006 18.9776L18.0009 16.9644C19.6966 16.7214 21 15.2629 21 13.5C21 11.567 19.433 10 17.5 10C17.2912 10 17.0867 10.0183 16.8887 10.054C16.9616 9.7142 17 9.36158 17 9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9C7 9.36158 7.03838 9.7142 7.11205 10.0533C6.91331 10.0183 6.70879 10 6.5 10C4.567 10 3 11.567 3 13.5C3 15.2003 4.21241 16.6174 5.81986 16.934L6.00005 16.9646L6.00039 18.9776C3.19696 18.7252 1 16.3692 1 13.5C1 10.9656 2.71424 8.83154 5.04648 8.19411C5.44561 4.70761 8.40661 2 12 2Z"></path></svg>
            <span>Click to upload payment proof</span>
            <span class="opacity-07">PNG, JPG or WEBP (MAX: 5MB)</span>
            <input x-ref="file" name="proof" x-on:change="PreviewPhoto($el,$el.closest('label'))" type="file" accept="image/*" class="display-none inp input required">
        </label>
        <button class="btn-primary w-full br-10px">I Have made Payment</button>

    </form>
 </div>
 {{-- confirmation section --}}
 <template x-if="ShowConfirmation">
    
        <div class="pos-fixed p-20px inset-0 z-index-1000 bg">
    <div class="w-full g-10px column text-align-center align-center bg-primary-01 border-width-1px border-color-primary-02 border-style-solid br-10px p-40px">
        {{-- new --}}
        <div class="h-70 w-70 no-shrink circle bg-green-transparent c-whatsapp p-5px">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="60" width="60"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

        </div>
        {{-- new --}}
        <strong class="desc font-weight-900 c-whatsapp">Transaction Verification submitted successfully</strong>
        <span class="opacity-07">Your payment has been submitted and is currently being processed, this might take a few minutes. If you have any issues , kindly reach out to our support team</span>
   <div x-on:click="Vitecss.navigate('{{ url('dashboard') }}')" class="w-full br-10px p-10px border-width-1px border-style-solid border-color-rgt-02">
    Go to Dashboard
   </div>
   <button x-on:click="Vitecss.navigate('{{ url('support') }}')" class="btn-telegram p-10px br-10px w-full">
    Contact Support
   </button>
    </div>
</div>
    
 </template>
    </section>
    
@endsection