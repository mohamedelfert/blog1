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

//Route::pattern('id','[0-9]+');

Route::get('/', function () {
    return view('welcome');
});

Route::get('users','UsersController@all_users');
Route::post('insert/user','UsersController@insert_new');
Route::delete('delete/user/{id?}','UsersController@delete')->where('id','[0-9]+');

//Route::resource('users' , 'UsersController');
//Route::get('test', 'NewsController@index');
//Route::post('test/1', function (Illuminate\Http\Request $request){
//    return $request->all();
//});

/*
Route::get('user/{id?}/{name?}', function ($id = null , $name = null){
    return 'Welcome From User Route Your Id Is : ' . $id . ' And UserName Is ' . $name;
});
*/

/*
Route::get('user/{id?}/{name?}', function ($id = null , $name = null){
    return 'Welcome From User Route Your Id Is : ' . $id . ' And UserName Is ' . $name;
})->where(['id' => '[0-9]+' , 'name'=> '[a-zA-Z]+']);
*/
/*
Route::get('test', function (){
    return '
        <form method="post" action="">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <input type="text" name="foo">
            <input type="submit" name="send">
            <input type="hidden" name="_method" value="delete">
        </form>
    ';
});

Route::any('test', function (){
    return 'Welcome From any route ' . request('foo');
});
/*
Route::post('test', function (){
    return 'Welcome From Test ' . request('foo');
});

Route::put('test', function (){
    return 'Welcome From PUT ' . request('foo');
});

Route::patch('test', function (){
    return 'Welcome From PATCH ' . request('foo');
});

Route::delete('test', function (){
    return 'Welcome From DELETE ' . request('foo');
});

get
post
put
patch
delete
any
*/