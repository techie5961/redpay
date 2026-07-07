@extends('layout.users.app')
@section('title')
    withdraw
@endsection
@section('main')
    <section class="w-full p-20px column g-10px">
 <div class="w-full column g-5px text-center">
           <strong class="font-size-1-5 font-weight-900">Withdraw Funds</strong>
    <span class="opacity-07">Transfer money straight into your bank account</span>
    </div>
    <form x-on:submit.prevent="
    PostRequest(event,$el)
    " action="{{ url('post/withdraw/process') }}" class="w-full column p-20px g-10px border-width-1px border-style-solid border-color-rgt-02 br-10px">
      <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
      <div class="w-full br-10 column g-3px p-20px align-center bg-primary-01 border-width-1px border-style-solid border color-primary-02">
            <small class="opacity-07">Available Balance</small>
            <strong class="font-size-1-5 font-weight-900 c-primary">{{ number_format(Auth::guard('users')->user()->balance,2) }}</strong>
        </div>
         {{-- new input --}}
       <div class="column w-full g-5px">
         <label>User ID</label>
        <div class="cont bg-black-transparent">
            <input type="text" readonly value="{{ strtoupper(Auth::guard('users')->user()->uniqid) }}" class="inp input required">
        </div>
       </div>
        {{-- new input --}}
       <div class="column w-full g-5px">
         <label>Account Number</label>
        <div class="cont bg-black-transparent">
            <input name="account_number" placeholder="0123456789" type="number" inputmode="numeric" class="inp input required">
        </div>
       </div>
        {{-- new input --}}
       <div class="column w-full g-5px">
         <label>Bank Name</label>
        <div class="cont bg-black-transparent">
            <select name="bank_name" class="inp input required">
                <option value="" selected disabled>Click to select...</option>
                @foreach ($banks as $data)
                    <option value="{{ $data->name }}">{{ $data->name }}</option>
                @endforeach
            </select>
        </div>
       </div>

        {{-- new input --}}
       <div class="column w-full g-5px">
         <label>Account Name</label>
        <div class="cont bg-black-transparent">
            <input name="account_name" placeholder="David James" type="text" class="inp input required">
        </div>
       </div>

        {{-- new input --}}
       <div class="column w-full g-5px">
         <label>Amount(&#8358;)</label>
        <div class="cont bg-black-transparent">
            <input placeholder="1,000" type="number" inputmode="numeric" class="inp input required">
        </div>
       </div>
        {{-- new input --}}
       <div class="column w-full g-5px">
         <label>RPC Code</label>
        <div class="cont bg-black-transparent">
            <input name="RPC_code" placeholder="**** **** **** ****" type="text" class="inp input required">
        </div>
        <small class="c-red">⚠RPC code is required to proceed</small>
       </div>
        <button class="btn-primary m-top-10px w-full br-10px">Withraw Funds</button>
    </form>
    </section>
@endsection