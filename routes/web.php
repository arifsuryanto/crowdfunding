<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::view('/{any?}', 'app')->where('any', '.*');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'email'])->group(function () {

    Route::get('/cek-email', function () {
        return 'Email Verified';
    });
});

Route::middleware(['auth', 'email', 'admin'])->group(function () {

    Route::get('/cek-admin', function () {
        return 'Welcome Admin';
    });
});
