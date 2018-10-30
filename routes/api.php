<?php

use Illuminate\Http\Request;
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

Route::group(['middleware' => ['api','cors']], function () {

    Route::post('register', 'APIController@register');
    Route::post('login', 'APIController@login');
    Route::get('get_token', 'APIController@getToken');  //获取token


    /**
     * 要求登录的接口都得写在下面
     */
    Route::group(['middleware' => 'jwt-auth'], function () {
        Route::post('get_user_details', 'APIController@get_user_details'); //个人信息

        Route::post('identity','IdentityController@store');  //实名验证

        Route::put('user','UserController@update'); // 修改个人信息
        Route::get('user', 'UserController@show'); // 获取个人信息


    });


});
    

