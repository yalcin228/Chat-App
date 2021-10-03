<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\CheckRequestController;
use App\Http\Controllers\MyFriendsController;
use App\Http\Controllers\PersonalMessageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home',[HomeController::class, 'add_message'])->name('home.message');
Route::post('add-mesage', [HomeController::class,'add_message'])->name('add-message');
Route::get('/profile_edit',[ProfileController::class,'index'])->name('profile.index');
Route::put('/profile_edit',[ProfileController::class,'edit']);
Route::get('/user-info/{id}',[UserInfoController::class,'index'])->name('user-info.index');
Route::get('add/{to_id}',[UserInfoController::class,'add_friend'])->name('add');
Route::get('delete/{friend}',[UserInfoController::class,'destroy'])->name('delete');

Route::resource('check-friend', CheckRequestController::class)->only(['edit','update','destroy']);
Route::resource('show_my_friends', MyFriendsController::class)->only(['index']);
Route::resource('personal_message', PersonalMessageController::class);
