<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminsDashboardController extends Controller
{
    // login
    public function Login(){
       return view('admins.login');
    }

    // dashboard
    public function Dashboard(){
        return view('admins.dashboard',[
            'total_users' => DB::table('users')->count(),
            'new_users' => DB::table('users')->whereDate('date',Carbon::today())->count(),
            'bank_details' => json_decode(DB::table('settings')->where('key','bank_details')->first()->value ?? '{}'),
            'social_settings' => json_decode(DB::table('settings')->where('key','social_settings')->first()->value ?? '{}'),
            'general_settings' => json_decode(DB::table('settings')->where('key','general_settings')->first()->value ?? '{}')
        ]);
    }

    // logout
    public function Logout(){
        Auth::guard('admins')->logout();
        return redirect('admins/login');
    }
}
