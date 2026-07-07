<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminsPostRequestController extends Controller
{
    // login
    public function Login(){
        try{
     request()->merge(array_map('trim',request()->all()));
        $validator=Validator::make(request()->all(),[
            'tag' => 'required|string|exists:admins,tag',
            'password' => 'required|string'
        ],[
            'tag.required' => 'Admin tag is required and cannot be empty',
            'tag.string' => 'Admin tag must only contain strings',
            'tag.exists' => 'Admin tag does not exist on our server',
            'password.required' => 'Password is required and cannot be empty',
            'password.string' => 'Password can only contain strings'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }

        $admin=DB::table('admins')->where('tag',request()->input('tag'))->first();
        if(!Hash::check(request()->input('password'),$admin->password)){
            return response()->json([
                'message' => 'Invalid password',
                'status' => 'warning'
            ]);
        }
        Auth::guard('admins')->loginUsingId($admin->id,true);
        return response()->json([
            'message' => 'Admin Login successfull, redirecting...',
            'status' => 'success'
        ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'error'
            ]);
        }
       
    }

    // update bank details
    public function UpdateBankDetails(){
        $validator=Validator::make(request()->all(),[
            'account_number' => 'required|regex:/^[0-9]{10}$/',
            'account_name' => 'required|string',
            'bank_name' => 'required|string'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }
        DB::table('settings')->updateOrInsert([
            'key' => 'bank_details'
        ],[
            'key' => 'bank_details',
            'value' => json_encode([
                'account_number' => request()->input('account_number'),
                'bank_name' => request()->input('bank_name'),
                'account_name' => request()->input('account_name')
            ]),
            'updated' => carbon::now(),
           ...(!DB::table('settings')->where('key','bank_details')->exists() ? ['date' => Carbon::now()] : [])
        ]);
        return response()->json([
            'message' => 'Settings updated successfully',
            'status' => 'success'
        ]);
    }

     // update social settings
    public function UpdateSocialSettings(){
        $validator=Validator::make(request()->all(),[
           'whatsapp_link' => 'required|url',
           'telegram_group' => 'required|url',
           'whatsapp_group' => 'required|url',
           'telegram_link' => 'required|url',
           'email_address' => 'required|email'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }
        DB::table('settings')->updateOrInsert([
            'key' => 'social_settings'
        ],[
            'key' => 'social_settings',
            'value' => json_encode([
                'whatsapp_link' => request()->input('whatsapp_link'),
                'whatsapp_group' => request('whatsapp_group'),
                'telegram_group' => request('telegram_group'),
                'telegram_link' => request()->input('telegram_link'),
                'email_address' => request()->input('email_address')
            ]),
            'updated' => carbon::now(),
           ...(!DB::table('settings')->where('key','social_settings')->exists() ? ['date' => Carbon::now()] : [])
        ]);
        return response()->json([
            'message' => 'Settings updated successfully',
            'status' => 'success'
        ]);
    }

     // update general settings
    public function UpdateGeneralSettings(){
        $validator=Validator::make(request()->all(),[
           'welcome_bonus' => 'required|numeric',
           'referral_bonus' => 'required|numeric',
           'rpc_price' => 'required|numeric',
           'check_in' => 'required|numeric'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 'error'
            ]);
        }
        DB::table('settings')->updateOrInsert([
            'key' => 'general_settings'
        ],[
            'key' => 'general_settings',
            'value' => json_encode([
                'welcome_bonus' => request()->input('welcome_bonus'),
                'referral_bonus' => request('referral_bonus'),
                'rpc_price' => request()->input('rpc_price'),
                'check_in' => request()->input('check_in')
            ]),
            'updated' => carbon::now(),
           ...(!DB::table('settings')->where('key','general_settings')->exists() ? ['date' => Carbon::now()] : [])
        ]);
        return response()->json([
            'message' => 'Settings updated successfully',
            'status' => 'success'
        ]);
    }
}
