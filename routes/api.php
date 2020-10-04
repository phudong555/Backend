<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiThongbaoController;
use App\Http\Controllers\ApiCongviecController;
use App\Http\Controllers\ApiLoginController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::resource('thongbao', 'ApiThongbaoController');
Route::resource('congviec', 'ApiCongviecController');


Route::post('dangnhap','ApiLoginController@login');