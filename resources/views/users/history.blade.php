@extends('layout.users.app')
@section('title')
    History
@endsection
@section('main')
    <section class="w-full column p-20px g-10px">
         <div class="w-full column g-5px text-center">
           <strong class="font-size-1-5 font-weight-900">Transaction History</strong>
    <span class="opacity-07">View all your recent transactions</span>
    </div>
    {{-- loop --}}
    @if (!$trx->isEmpty())
        
    @foreach ($trx as $data)
        <div class="w-full row align-center space-between br-10px g-10px p-15px bg-light border-width-1px border-style-solid border-color-rgt-01">
            @if ($data->class == 'credit')
                <div class="h-50px w-50px circle align-center justify-center column bg-green-transparent c-whatsapp">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M9 13.589L17.6066 4.98242L19.0208 6.39664L10.4142 15.0032H18V17.0032H7V6.00324H9V13.589Z"></path></svg>

                </div>
            @else
                <div class="h-50px w-50px circle align-center justify-center column bg-red-transparent c-red">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"></path></svg>

                </div>
            @endif
            {{-- new column --}}
            <div class="column m-right-auto g-5px">
                <strong class="font-size-1 font-weight-800">{{ $data->type }}</strong>
                <small class="opacity-07">{{ $data->frame }}</small>
            </div>
            {{-- new --}}
            <strong class="font-size-1-1 {{ $data->class == 'credit' ? 'c-whatsapp' : '' }} w-fit text-overflow-ellipsis ws-nowrap font-weight-900">{{ $data->class == 'credit' ? '+' : '-' }}&#8358;{{ number_format($data->amount) }}</strong>
        </div>
    @endforeach
    @endif
    </section>
@endsection