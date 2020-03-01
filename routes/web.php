<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::view('/', 'home')->name('home');
Route::permanentRedirect('/home', '/');
Route::view('/admin', 'admin')->middleware('admin');
Route::prefix('admin')->group(function () {
    Route::post('login', 'Admin\AdminController@login');
});