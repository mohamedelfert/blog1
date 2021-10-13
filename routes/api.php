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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['namespace' => 'api'],function (){

    Route::group(['middleware' => 'auth:api'],function (){
        Route::get('/user', function (Request $request){ return $request->user(); });

        Route::get('all/news','News@all_news');
        Route::get('news/{news_id}','News@news_with_comment');
        Route::post('add/comment','News@add_comment');
    });

    Route::get('login','Users@login');

});
