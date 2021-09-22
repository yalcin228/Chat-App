<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserInfoController;
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
Route::post('/home',[HomeController::class, 'add_message']);
Route::get('/profile_edit',[ProfileController::class,'index'])->name('profile.index');
Route::put('/profile_edit',[ProfileController::class,'edit']);
Route::get('/user-info/{id}',[UserInfoController::class,'index'])->name('user-info.index');
Route::get('/user-info/addfriend/{id}',[UserInfoController::class,'addfriend'])->name('user-info.addfriend');
Route::get('/user-info/deletefriend/{id}',[UserInfoController::class,'deletefriend'])->name('user-info.delete');