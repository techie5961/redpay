@extends('layout.users.app')
@section('main')
    <section x-data="{ 
        Balance : '{{ number_format(Auth::guard('users')->user()->balance,2) }}',
        Claiming : false,
        CanClaim : {{ $minutes }} <= 0 ? true : false ,
        Minutes : {{ $minutes }},
        Seconds : {{ $seconds }}

     }" x-init="
     interval=setInterval(() => {
        Seconds--;
       if(Minutes == 0){
        clearInterval(interval);
       }
     }, 1000);
     $watch('Seconds', (value) => {
        if(value == 0){
            Seconds = 60;
            Minutes--;
        }
     });
     $watch('Minutes', (value) => {
        if(value == 0){
            CanClaim = true;
            Seconds = 0;
            clearInterval(interval);
        }
     })
     " class="w-full p-20px column g-10px">
        <div class="w-full bg-primary primary-text overflow-hidden br-10px pos-relative">
           <div class="pos-relative p-20px column g-5spx inset-0 z-index-500 w-full">
          {{-- new row --}}
            <div class="row m-bottom-5px align-center g-5px">
             <i>
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M22.0049 6.99979H23.0049V16.9998H22.0049V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V6.99979ZM20.0049 16.9998H14.0049C11.2435 16.9998 9.00488 14.7612 9.00488 11.9998C9.00488 9.23836 11.2435 6.99979 14.0049 6.99979H20.0049V4.99979H4.00488V18.9998H20.0049V16.9998ZM21.0049 14.9998V8.99979H14.0049C12.348 8.99979 11.0049 10.3429 11.0049 11.9998C11.0049 13.6566 12.348 14.9998 14.0049 14.9998H21.0049ZM14.0049 10.9998H17.0049V12.9998H14.0049V10.9998Z"></path></svg>
                
            </i>
            <span class="opacity-07 font-weight-600 font-size-09">Total Balance</span>
           </div>
           {{-- new row --}}
           <strong class="font-size-1-7 font-weight-900">&#8358;<span x-text="Balance"></span></strong>
           {{-- new row --}}
           <span class="opacity-07">ID: {{ strtoupper(Auth::guard('users')->user()->uniqid) }}</span>
           {{-- new row --}}
           <div class="row align-center m-top-10px g-10px space-between">
            <div x-on:click="
            Claiming = true;
            $el.classList.add('no-pointer','opacity-07')
            SendGetRequest('{{ url('users/claim/bonus') }}',null,function($response){
                data=JSON.parse($response);
                Claiming = false;
            $el.classList.remove('no-pointer','opacity-07')

                if(data.status == 'success'){

                    Balance = data.message;
                    CanClaim= false;
                    Minutes = 14;
                    Seconds = 60,
                     interval=setInterval(() => {
                       Seconds--;
                        }, 1000);
                }

            })
            " x-init="
               if(CanClaim){
           $el.classList.remove('no-pointer','opacity-07');
           }else{
              $el.classList.add('no-pointer','opacity-07');

           }
          $watch('CanClaim', (value) => {
           
             if(value){
           $el.classList.remove('no-pointer','opacity-07');
           }else{
              $el.classList.add('no-pointer','opacity-07');

           }
          })
            "  style="background:rgba(255,255,255,0.25)" class="w-full h-40 g-10px p-7px br-10px row align-center justify-center">
             <template x-if="CanClaim">
                <div class="row align-center justify-center w-full">
                     <i>
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM11.0049 10.0028H5.00488V19.0028H11.0049V10.0028ZM19.0049 10.0028H13.0049V19.0028H19.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z"></path></svg>

                </i>
                <span x-show="!Claiming">Claim &#8358;{{ number_format($general_settings->check_in) }}</span>
                <span x-show="Claiming">Claiming...</span>
           
                </div>
             </template>
              <template x-if="!CanClaim">
                <div class="row align-center justify-center g-1px w-full">
                    
                    <span>Next Claim in </span>
                    <span x-text="Minutes"></span>:
                    <span x-text="Seconds"></span>
                </div>
             </template>
            </div>
              <div x-on:click="Vitecss.navigate('{{ url('withdraw') }}')" style="background:rgba(255,255,255,0.25)" class="w-full g-10px p-7px h-40 br-10px row align-center justify-center">
                <i>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M21.7267 2.95694L16.2734 22.0432C16.1225 22.5716 15.7979 22.5956 15.5563 22.1126L11 13L1.9229 9.36919C1.41322 9.16532 1.41953 8.86022 1.95695 8.68108L21.0432 2.31901C21.5716 2.14285 21.8747 2.43866 21.7267 2.95694ZM19.0353 5.09647L6.81221 9.17085L12.4488 11.4255L15.4895 17.5068L19.0353 5.09647Z"></path></svg>

                </i>
                <span>Withdraw</span>
            </div>

           </div>
        </div>
        </div>
        {{-- banner --}}
       <img src="{{ asset('banners/20a8a824-233e-4f5d-8691-fc016d71cd62.jpg') }}" alt="" class="w-full border-width-1px border-style-solid border-color-rgt-01 br-10px no-pointer no-select">
        {{-- new --}}
        <div style="grid-template-columns:repeat(auto-fit,minmax(100px,1fr))" class="w-full grid g-10px place-center">
            {{-- new item --}}
            <div  x-on:click="
            Vitecss.navigate('{{ url('payment') }}')
            " class="w-full text-center br-7px column align-center justify-center g-10px border-width-1px p-10px bg-light border-style-solid border-color-rgt-02">
                <div class="p-10px br-5px column bg-primary primary-text align-center justify-center">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.50488 2H17.5049C17.8196 2 18.116 2.14819 18.3049 2.4L21.0049 6V21C21.0049 21.5523 20.5572 22 20.0049 22H4.00488C3.4526 22 3.00488 21.5523 3.00488 21V6L5.70488 2.4C5.89374 2.14819 6.19013 2 6.50488 2ZM18.5049 6L17.0049 4H7.00488L5.50488 6H18.5049ZM9.00488 10H7.00488V12C7.00488 14.7614 9.24346 17 12.0049 17C14.7663 17 17.0049 14.7614 17.0049 12V10H15.0049V12C15.0049 13.6569 13.6617 15 12.0049 15C10.348 15 9.00488 13.6569 9.00488 12V10Z"></path></svg>

                </div>
                <strong class="ws-nowrap text-overflow-ellipsis">Buy RPC</strong>
            </div>
             {{-- new item --}}
            <div x-on:click="
            Vitecss.navigate('{{ url('broadcast') }}')
            " class="w-full text-center br-7px column align-center justify-center g-10px border-width-1px p-10px bg-light border-style-solid border-color-rgt-02">
                <div style="background:rgb(108,92,230)" class="p-10px br-5px column bg-primary primary-text align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4.92893 2.92896L6.34315 4.34317C4.89543 5.79088 4 7.79088 4 10C4 12.2092 4.89543 14.2092 6.34315 15.6569L4.92893 17.0711C3.11929 15.2614 2 12.7614 2 10C2 7.2386 3.11929 4.7386 4.92893 2.92896ZM19.0711 2.92896C20.8807 4.7386 22 7.2386 22 10C22 12.7614 20.8807 15.2614 19.0711 17.0711L17.6569 15.6569C19.1046 14.2092 20 12.2092 20 10C20 7.79088 19.1046 5.79088 17.6569 4.34317L19.0711 2.92896ZM7.75736 5.75738L9.17157 7.1716C8.44771 7.89545 8 8.89545 8 10C8 11.1046 8.44771 12.1046 9.17157 12.8285L7.75736 14.2427C6.67157 13.1569 6 11.6569 6 10C6 8.34317 6.67157 6.84317 7.75736 5.75738ZM16.2426 5.75738C17.3284 6.84317 18 8.34317 18 10C18 11.6569 17.3284 13.1569 16.2426 14.2427L14.8284 12.8285C15.5523 12.1046 16 11.1046 16 10C16 8.89545 15.5523 7.89545 14.8284 7.1716L16.2426 5.75738ZM12 12C10.8954 12 10 11.1046 10 10C10 8.89545 10.8954 8.00002 12 8.00002C13.1046 8.00002 14 8.89545 14 10C14 11.1046 13.1046 12 12 12ZM12 14C12.5798 14 13.0774 14.413 13.1843 14.9829L14.5 22H9.5L10.8157 14.9829C10.9226 14.413 11.4202 14 12 14Z"></path></svg>

                </div>
                <strong class="ws-nowrap text-overflow-ellipsis">Broadcast</strong>
            </div>
             {{-- new item --}}
            <div  x-on:click="
            Vitecss.navigate('{{ url('refer') }}')
            " class="w-full text-center br-7px column align-center justify-center g-10px border-width-1px p-10px bg-light border-style-solid border-color-rgt-02">
                <div style="background:blue;" class="p-10px br-5px column bg-primary primary-text align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M14.5049 2.00281C16.4379 2.00281 18.0049 3.56981 18.0049 5.50281C18.0049 6.04001 17.8839 6.54895 17.6676 7.00385L21.0049 7.00281C21.5572 7.00281 22.0049 7.45052 22.0049 8.00281V12.0028C22.0049 12.5551 21.5572 13.0028 21.0049 13.0028H20.0049V21.0028C20.0049 21.5551 19.5572 22.0028 19.0049 22.0028H5.00488C4.4526 22.0028 4.00488 21.5551 4.00488 21.0028V13.0028H3.00488C2.4526 13.0028 2.00488 12.5551 2.00488 12.0028V8.00281C2.00488 7.45052 2.4526 7.00281 3.00488 7.00281L6.34219 7.00385C6.12591 6.54895 6.00488 6.04001 6.00488 5.50281C6.00488 3.56981 7.57189 2.00281 9.50488 2.00281C10.4849 2.00281 11.3708 2.40557 12.0061 3.05459C12.639 2.40557 13.5249 2.00281 14.5049 2.00281ZM18.0049 13.0028H6.00488V20.0028H18.0049V13.0028ZM20.0049 9.00281H4.00488V11.0028H20.0049V9.00281ZM9.50488 4.00281C8.67646 4.00281 8.00488 4.67438 8.00488 5.50281C8.00488 6.2825 8.59977 6.92326 9.36042 6.99594L9.50488 7.00281H11.0049V5.50281C11.0049 4.72311 10.41 4.08236 9.64934 4.00967L9.50488 4.00281ZM14.5049 4.00281L14.3604 4.00967C13.6473 4.07782 13.0799 4.64524 13.0117 5.35835L13.0049 5.50281V7.00281H14.5049L14.6493 6.99594C15.41 6.92326 16.0049 6.2825 16.0049 5.50281C16.0049 4.72311 15.41 4.08236 14.6493 4.00967L14.5049 4.00281Z"></path></svg>

                </div>
                <strong class="ws-nowrap text-overflow-ellipsis">Refer & earn</strong>
            </div>
            {{-- new item --}}
            <div x-on:click="
            Vitecss.navigate('{{ url('community') }}')
            " class="w-full text-center br-7px column align-center justify-center g-10px bg-light border-width-1px p-10px border-style-solid border-color-rgt-02">
                <div style="background:#4caf50;" class="p-10px br-5px column bg-primary primary-text align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z"></path></svg>

                </div>
                <strong class="ws-nowrap text-overflow-ellipsis">Community</strong>
            </div>
             {{-- new item --}}
            <div  x-on:click="
            Vitecss.navigate('{{ url('history') }}')
            " class="w-full text-center br-7px column align-center justify-center g-10px bg-light border-width-1px p-10px border-style-solid border-color-rgt-02">
                <div style="background:orangered;" class="p-10px br-5px column bg-primary primary-text align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12H4C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C9.53614 4 7.33243 5.11383 5.86492 6.86543L8 9H2V3L4.44656 5.44648C6.28002 3.33509 8.9841 2 12 2ZM13 7L12.9998 11.585L16.2426 14.8284L14.8284 16.2426L10.9998 12.413L11 7H13Z"></path></svg>

                </div>
                <strong class="ws-nowrap text-overflow-ellipsis">History</strong>
            </div>
           {{-- new item --}}
            <div x-on:click="
            Vitecss.navigate('{{ url('support') }}')
            " class="w-full text-center br-7px column align-center justify-center g-10px bg-light border-width-1px p-10px border-style-solid border-color-rgt-02">
                <div style="background:var(--primary);" class="p-10px br-5px column bg-primary primary-text align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 12H7C8.10457 12 9 12.8954 9 14V19C9 20.1046 8.10457 21 7 21H4C2.89543 21 2 20.1046 2 19V12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12V19C22 20.1046 21.1046 21 20 21H17C15.8954 21 15 20.1046 15 19V14C15 12.8954 15.8954 12 17 12H20C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12Z"></path></svg>

                </div>
                <strong class="ws-nowrap text-overflow-ellipsis">Support</strong>
            </div>
        </div>
        {{-- banner --}}
       <img src="{{ asset('banners/IMG_8804.jpg') }}" alt="" class="w-full border-width-1px border-style-solid border-color-rgt-01 br-10px no-pointer no-select">
    </section>
@endsection