@extends('layout.users.app')
@section('title')
    support
@endsection
@section('main')
    <section class="w-full p-20px column text-center g-10px align-center">
        <strong class="font-weight-900 font-size-2">Support</strong>
        <span class="opacity-07">We're here to help! Choose your preferred support channel</span>
        {{-- new --}}
        {{-- new grid --}}
        <section style="grid-template-columns:repeat(auto-fit,minmax(min(400px,100%),1fr))" class="grid w-full g-10px place-center">
           {{-- new --}}
            <div class="w-full bg-light border-width-1px border-style-solid border-color-rgt-01 br-10px column p-20px align-center text-center g-10px">
                <div class="h-70px perfect-square no-shrink column align-center circle justify-center c-white bg-telegram">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M2.14753 11.8099C7.3949 9.52374 10.894 8.01654 12.6447 7.28833C17.6435 5.20916 18.6822 4.84799 19.3592 4.83606C19.5081 4.83344 19.8411 4.87034 20.0567 5.04534C20.2388 5.1931 20.2889 5.39271 20.3129 5.5328C20.3369 5.6729 20.3667 5.99204 20.343 6.2414C20.0721 9.08763 18.9 15.9947 18.3037 19.1825C18.0514 20.5314 17.5546 20.9836 17.0736 21.0279C16.0283 21.1241 15.2345 20.3371 14.2221 19.6735C12.6379 18.635 11.7429 17.9885 10.2051 16.9751C8.42795 15.804 9.58001 15.1603 10.5928 14.1084C10.8579 13.8331 15.4635 9.64397 15.5526 9.26395C15.5637 9.21642 15.5741 9.03926 15.4688 8.94571C15.3636 8.85216 15.2083 8.88415 15.0962 8.9096C14.9373 8.94566 12.4064 10.6184 7.50365 13.928C6.78528 14.4212 6.13461 14.6616 5.55163 14.649C4.90893 14.6351 3.67265 14.2856 2.7536 13.9869C1.62635 13.6204 0.730432 13.4267 0.808447 12.8044C0.849081 12.4803 1.29544 12.1488 2.14753 11.8099Z"></path></svg>

                </div>
                {{-- new row --}}
                <strong class="desc font-weight-900">Telegram</strong>
                <span class="opacity-07">Chat with us on telegram</span>
                <button x-data="{ 
                    Link : '{{ $social_settings->telegram_link }}'
                 }" x-on:click="window.open(Link)" class="btn-telegram p-10px w-full br-10px no-select pointer">Open Telegram</button>
            </div>
             {{-- new --}}
            <div class="w-full bg-light border-width-1px border-style-solid border-color-rgt-01 br-10px column p-20px align-center text-center g-10px">
                <div class="h-70px perfect-square no-shrink column align-center circle justify-center c-white bg-whatsapp">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2ZM8.59339 7.30019L8.39232 7.30833C8.26293 7.31742 8.13607 7.34902 8.02057 7.40811C7.93392 7.45244 7.85348 7.51651 7.72709 7.63586C7.60774 7.74855 7.53857 7.84697 7.46569 7.94186C7.09599 8.4232 6.89729 9.01405 6.90098 9.62098C6.90299 10.1116 7.03043 10.5884 7.23169 11.0336C7.63982 11.9364 8.31288 12.8908 9.20194 13.7759C9.4155 13.9885 9.62473 14.2034 9.85034 14.402C10.9538 15.3736 12.2688 16.0742 13.6907 16.4482C13.6907 16.4482 14.2507 16.5342 14.2589 16.5347C14.4444 16.5447 14.6296 16.5313 14.8153 16.5218C15.1066 16.5068 15.391 16.428 15.6484 16.2909C15.8139 16.2028 15.8922 16.159 16.0311 16.0714C16.0311 16.0714 16.0737 16.0426 16.1559 15.9814C16.2909 15.8808 16.3743 15.81 16.4866 15.6934C16.5694 15.6074 16.6406 15.5058 16.6956 15.3913C16.7738 15.2281 16.8525 14.9166 16.8838 14.6579C16.9077 14.4603 16.9005 14.3523 16.8979 14.2854C16.8936 14.1778 16.8047 14.0671 16.7073 14.0201L16.1258 13.7587C16.1258 13.7587 15.2563 13.3803 14.7245 13.1377C14.6691 13.1124 14.6085 13.1007 14.5476 13.097C14.4142 13.0888 14.2647 13.1236 14.1696 13.2238C14.1646 13.2218 14.0984 13.279 13.3749 14.1555C13.335 14.2032 13.2415 14.3069 13.0798 14.2972C13.0554 14.2955 13.0311 14.292 13.0074 14.2858C12.9419 14.2685 12.8781 14.2457 12.8157 14.2193C12.692 14.1668 12.6486 14.1469 12.5641 14.1105C11.9868 13.8583 11.457 13.5209 10.9887 13.108C10.8631 12.9974 10.7463 12.8783 10.6259 12.7616C10.2057 12.3543 9.86169 11.9211 9.60577 11.4938C9.5918 11.4705 9.57027 11.4368 9.54708 11.3991C9.50521 11.331 9.45903 11.25 9.44455 11.1944C9.40738 11.0473 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.74939 10.663 9.86248 10.5183C9.97128 10.379 10.0652 10.2428 10.125 10.1457C10.2428 9.95633 10.2801 9.76062 10.2182 9.60963C9.93764 8.92565 9.64818 8.24536 9.34986 7.56894C9.29098 7.43545 9.11585 7.33846 8.95659 7.32007C8.90265 7.31384 8.84875 7.30758 8.79459 7.30402C8.66053 7.29748 8.5262 7.29892 8.39232 7.30833L8.59339 7.30019Z"></path></svg>

                </div>
                {{-- new row --}}
                <strong class="desc font-weight-900">Whatsapp</strong>
                <span class="opacity-07">Chat with us on whatsapp</span>
                <button x-data="{ 
                    Link : '{{ $social_settings->whatsapp_link }}'
                 }" x-on:click="window.open(Link)" class="btn-whatsapp p-10px w-full br-10px no-select pointer">Open WhatsApp</button>
            </div>
              {{-- new --}}
            <div class="w-full bg-light border-width-1px border-style-solid border-color-rgt-01 br-10px column p-20px align-center text-center g-10px">
                <div class="h-70px perfect-square no-shrink column align-center circle justify-center c-white bg-primary">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM12.0606 11.6829L5.64722 6.2377L4.35278 7.7623L12.0731 14.3171L19.6544 7.75616L18.3456 6.24384L12.0606 11.6829Z"></path></svg>

                </div>
                {{-- new row --}}
                <strong class="desc font-weight-900">Email</strong>
                <span class="opacity-07">Send us an email</span>
                <button x-data="{ 
                    Link : '{{ $social_settings->email_address }}'
                 }" x-on:click="window.open(Link)" class="btn-primary p-10px w-full br-10px no-select pointer">Send Email</button>
            </div>
            <div class="w-full text-align-start bg-light border-width-1px border-style-solid border-color-rgt-01 br-10px column p-20px g-10px">
           <strong class="font-size-1 text-align-start font-weight-900">Support Hours</strong>
           <span class="opacity-07 text-align-start">24/7 Support - We're here for you around the clock.</span>
           <small class="opacity-07 text-align-start">Average response time: within a few hours via email, or instantly via WhatsApp, and Telegram.</small>
            </div>
        </section>
    </section>
@endsection