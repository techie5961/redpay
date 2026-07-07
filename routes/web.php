<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersDashboardController;
use App\Http\Controllers\UsersPostRequestController;
use App\Http\Middleware\UsersDashboardMiddleware;
use App\Http\Controllers\AdminsDashboardController;
use App\Http\Controllers\AdminsPostRequestController;
use App\Http\Middleware\AdminsDashboardMiddleware;
use App\Http\Middleware\UsersAuthMiddleware;



// user (not authenticated)
Route::middleware([UsersAuthMiddleware::class])->group(function(){
Route::get('register',[
    UsersDashboardController::class,'Register'
]);
// login
Route::get('login',[
    UsersDashboardController::class,'Login'
]);
Route::get('/',[
    UsersDashboardController::class,'Login'
]);
});

// user post (not authenticated)
Route::post('users/post/register/process',[
    UsersPostRequestController::class,'Register'
]);
// login
Route::post('users/post/login/process',[
    UsersPostRequestController::class,'Login'
]);

// users (authenticated)
Route::middleware([UsersDashboardMiddleware::class])->group(function(){
    // dashboard
Route::get('dashboard',[
    UsersDashboardController::class,'Dashboard'
]);
// support
Route::get('support',[
    UsersDashboardController::class,'Support'
]);
// payment
Route::get('payment',[
    UsersDashboardController::class,'Payment'
]);
// broadcast
Route::get('broadcast',[
    UsersDashboardController::class,'Broadcast'
]);
// refer & earn
Route::get('refer',[
    UsersDashboardController::class,'Refer'
]);
// profile
Route::get('profile',[
    UsersDashboardController::class,'Profile'
]);
// withdraw
Route::get('withdraw',[
    UsersDashboardController::class,'Withdraw'
]);
// history
Route::get('history',[
    UsersDashboardController::class,'History'
]);
// community
Route::get('community',[
    UsersDashboardController::class,'Community'
]);
// claim bonus
Route::get('users/claim/bonus',[
    UsersDashboardController::class,'ClaimBonus'
]);

// users post (authenticated)
Route::post('users/post/submit/payment/proof/process',[
    UsersPostRequestController::class,'SubmitPaymentProof'
]);
// withdraw
Route::post('post/withdraw/process',[
    UsersPostRequestController::class,'Withdraw'
]);

});

// admins (not authenticated)
Route::get('admins/login',[
    AdminsDashboardController::class,'Login'
]);

// admins post (not authenticated)
Route::post('admins/post/login/process',[
    AdminsPostRequestController::class,'Login'
]);

// admins (authenticated)
Route::middleware([AdminsDashboardMiddleware::class])->group(function(){
// dashboard
Route::get('admins/dashboard',[
    AdminsDashboardController::class,'Dashboard'
]);
// logout
Route::get('admins/logout',[
    AdminsDashboardController::class,'Logout'
]);

// admins post (authenticated)
// update bank
Route::post('admins/post/update/bank/details/process',[
    AdminsPostRequestController::class,'UpdatebankDetails'
]);
// update social settings
Route::post('admins/post/update/social/settings/process',[
    AdminsPostRequestController::class,'UpdateSocialSettings'
]);
// update bank settings
Route::post('admins/post/update/general/settings/process',[
    AdminsPostRequestController::class,'UpdateGeneralSettings'
]);


});


