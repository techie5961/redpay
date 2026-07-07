<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UsersDashboardController extends Controller
{
    // register
    public function Register(){
        return view('users.auth.register',[
           'ref' => request('ref')
        ]);
    }

    // login
    public function Login(){
        return view('users.auth.login');
    }

    // dashboard
    public function dashboard(){
      
$lastClaim = Carbon::parse(Auth::guard('users')->user()->updated);
$nextClaimTime = $lastClaim->copy()->addMinutes(15);
$now = Carbon::now();

if ($now->greaterThanOrEqualTo($nextClaimTime)) {
    $minutesRemaining = 0;
    $secondsRemaining = 0;
} else {
    $totalRemainingSeconds = $now->diffInSeconds($nextClaimTime);
    $minutesRemaining = floor($totalRemainingSeconds / 60);
    $secondsRemaining = $totalRemainingSeconds % 60;
}


        return view('users.dashboard',[
          'general_settings' => json_decode(DB::table('settings')->where('key','general_settings')->first()->value ?? '{}'),
          'seconds' => $secondsRemaining,
          'minutes' => $minutesRemaining
        ]);
    }

    // support
    public function Support(){
        return view('users.support',[
            'social_settings' => json_decode(DB::table('settings')->where('key','social_settings')->first()->value ?? '{}')
        ]);
    }

    // community
    public function Community(){
        return view('users.community',[
            'social_settings' => json_decode(DB::table('settings')->where('key','social_settings')->first()->value ?? '{}')
        ]);
    }

    // payment
    public function Payment(){
        return view('users.payment',[
            'general_settings' =>  json_decode(DB::table('settings')->where('key','general_settings')->first()->value ?? '{}'),
            'bank_details' =>  json_decode(DB::table('settings')->where('key','bank_details')->first()->value ?? '{}')
        ]);
    }

    // broadcast
    public function Broadcast(){
        return view('users.broadcast');
    }

    // refer & earn
    public function Refer(){
        return view('users.refer',[
            'general_settings' =>  json_decode(DB::table('settings')->where('key','general_settings')->first()->value ?? '{}'),
            'total_referred' => DB::table('users')->where('ref',Auth::guard('users')->user()->uniqid)->count(),
            'total_referral_earnings' => DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('type','Referral Bonus')->sum('amount')
        ]);
    }

    // profile
    public function Profile(){
        return view('users.profile');
    }

    // withdraw
    public function Withdraw(){
        return view('users.withdraw',[
            'banks' => json_decode(file_get_contents(database_path('data/banks.json')))
        ]);
    }

    // history
    public function History(){
        $trx=DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->limit(50)->get();
        $trx->transform(function($each){
    $each->frame=Carbon::parse($each->date)->diffForHumans();
    return $each;
        });
        return view('users.history',[
            'trx' => $trx
        ]);
    }
    // claim bonus
    public function ClaimBonus(){
        $general_settings=json_decode(DB::table('settings')->where('key','general_settings')->first()->value ?? '{}');

        DB::transaction(function() use($general_settings){
            DB::table('users')->where('id',Auth::guard('users')->user()->id)->increment('balance',$general_settings->check_in,[
                'updated' => carbon::now()
            ]);

     DB::table('transactions')->insert([
            'user_id' => Auth::guard('users')->user()->id,
            'amount' => $general_settings->check_in,
            'class' => 'credit',
            'type' => 'Daily Claim',
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);

        });
        return response()->json([
            'message' => number_format(DB::table('users')->where('id',Auth::guard('users')->user()->id)->first()->balance,2),
            'status' => 'success'
        ]);
    }
}
