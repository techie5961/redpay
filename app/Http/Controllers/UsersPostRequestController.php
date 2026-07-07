<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UsersPostRequestController extends Controller
{
    // register
    public function Register(){
        try{
          
            request()->merge([
                'phone' => str_replace(' ','',request()->input('phone'))
            ]);
            //   return response()->json([
            //     'message' => request()->input('phone'),
            //     'status' => 'info'
            // ]);
              request()->merge(array_map('trim',request()->all()));
        $validator=Validator::make(request()->all(),[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/^[0-9]{11}$/',
            'status' => 'required|string',
            'ref' => 'string|exists:users,uniqid',
            'password' => 'required'
        ],[
            'first_name.required' => 'First name is required and cannot be empty',
            'first_name.string' => 'First name must only consist of strings',
            'last_name.required' => 'Last name is required and cannot be empty',
            'last_name.string' => 'Last name must only consist if strings',
            'email.required' => 'Email is required and cannot be empty',
            'email.email' => 'Please enter a valid email',
            'email.unique' => 'Email already exists on our server',
            'phone.required' => 'Phone number is required and cannot be empty',
            'phone.regex' => 'Please enter a valid phone number',
            'status.required' => 'Account status is required and cannot be empty',
            'status.string' => 'Account status must only contain strings',
            'ref.string' => 'Referral code must only contain strings',
            'ref.exists' => 'Invalid referral code',
            'password.required' => 'Password is required and cannot be empty'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }
        $general_settings=json_decode(DB::table('settings')->where('key','general_settings')->first()->value ?? '{}');
       DB::transaction(function() use($general_settings){
    $user_id=DB::table('users')->insertGetId([
            'uniqid' => Str::random(10),
            'name' => request()->input('first_name').' '.request()->input('last_name'),
            'balance' => $general_settings->welcome_bonus,
            'email' => request()->input('email'),
            'phone' => request()->input('phone'),
            'type' => request()->input('status'),
            'ref' => request()->input('ref',NULL),
            'password' => Hash::make(request()->input('password')),
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        DB::table('transactions')->insert([
            'user_id' => $user_id,
            'amount' => $general_settings->welcome_bonus,
            'class' => 'credit',
            'type' => 'Welcome Bonus',
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        if(request()->input('ref','') != ''){
            DB::table('users')->where('uniqid',request('ref'))->increment('balance',$general_settings->referral_bonus);
            DB::table('transactions')->insert([
            'user_id' => DB::table('users')->where('uniqid',request('ref'))->first()->id,
            'amount' => $general_settings->referral_bonus,
            'class' => 'credit',
            'type' => 'Referral Bonus',
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        }
       });
        return response()->json([
            'message' => 'Registration successfull, redirecting...',
            'status' => 'success'
        ]);
        
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'error'
            ]);
        }
      
    }

    // login
    public function Login(){
        request()->merge(array_map('trim',request()->all()));
        $validator=Validator::make(request()->all(),[
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ],[
            'email.required' => 'Email is required and cannot be empty',
            'email.email' => 'Please enter a valid email',
            'email.exists' => 'Email does not exist on our server',
            'password.required' => 'Password is required and cannot be empty'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }
        $user=DB::table('users')->where('email',request()->input('email'))->first();
        if(!Hash::check(request()->input('password'),$user->password)){
            return response()->json([
                'message' => 'Invalid account password',
                'status' => 'error'
            ]);
        }

        Auth::guard('users')->loginUsingId($user->id,true);
        return response()->json([
            'message' => 'Login successfull, redirecting to dashboard...',
            'status' => 'success'
        ]);
    }

    // submit payment proof
    public function SubmitPaymentProof(){
        return response()->json([
            'message' => 'Payment submitted successfully',
            'status' => 'success'
        ]);
    }

    // withdraw
    public function Withdraw(){
        request()->merge([
            'amount' => str_replace(',','',request('amount'))
        ]);
        $validator=Validator::make(request()->all(),[
            'account_number' => 'required|regex:/^[0-9]{10}$/',
            'bank_name' => 'required|string',
            'account_name' => 'required|string',
            'amount' => 'numeric|min:1000',
            'RPC_code' => 'required|string'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }
        return response()->json([
            'message' => 'Invalid RPC code, please purchase a valid RPC code to continue',
            'status' => 'error'
        ]);
    }
}
