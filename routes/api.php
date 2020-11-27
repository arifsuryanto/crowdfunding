<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Auth')->group(function () {
    Route::post('register', 'RegisterController');

    Route::post('verification', 'VerifController');

    Route::post('regenerate-otp', 'GenerateOtpController');

    Route::post('update-password', 'UpdatePasswordController');

    Route::post('login', 'LoginController');

    Route::post('logout', 'LogoutController');
});

Route::namespace('Profile')->middleware('auth:api')->group(function () {
    Route::get('profile/get-profile', 'RetrieveProfileController');
    Route::post('profile/update-profile', 'UpdateProfileController');
});

Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'campaign',
    ],
    function () {
        Route::get('random/{count}', 'CampaignController@random');
        Route::post('store', 'CampaignController@store');
        Route::get('/', 'CampaignController@index');
        Route::get('/{id}', 'CampaignController@show');
        Route::get('/search/{keyword}', 'CampaignController@search');
    }
);
Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'blog',
    ],
    function () {
        Route::get('random/{count}', 'BlogController@random');
        Route::post('store', 'BlogController@store');
        Route::get('/', 'CampaignController@index');
        Route::get('/{id}', 'CampaignController@show');
    }
);
