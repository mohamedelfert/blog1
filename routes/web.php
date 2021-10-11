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

//Route::group(['middleware' => 'news'],function (){
    Route::get('news','NewsController@all_news')->middleware('news');
    Route::post('insert/news','NewsController@insert_new')->middleware('news');
    Route::delete('delete/news/{id?}','NewsController@delete')->where('id','[0-9]+')->middleware('news');
//});

//Route::resource('news' , 'NewsController');
//Route::get('test', 'NewsController@index');
//Route::post('test/1', function (Illuminate\Http\Request $request){
//    return $request->all();
//});
//
//
//Route::get('user/{id?}/{name?}', function ($id = null , $name = null){
//    return 'Welcome From User Route Your Id Is : ' . $id . ' And UserName Is ' . $name;
//});
//
//
//
//Route::get('user/{id?}/{name?}', function ($id = null , $name = null){
//    return 'Welcome From User Route Your Id Is : ' . $id . ' And UserName Is ' . $name;
//})->where(['id' => '[0-9]+' , 'name'=> '[a-zA-Z]+']);
//
//
//Route::get('test', function (){
//    return '
//        <form method="post" action="">
//            <input type="hidden" name="_token" value="'.csrf_token().'">
//            <input type="text" name="foo">
//            <input type="submit" name="send">
//            <input type="hidden" name="_method" value="delete">
//        </form>
//    ';
//});
//
//Route::any('test', function (){
//    return 'Welcome From any route ' . request('foo');
//});
//
//Route::post('test', function (){
//    return 'Welcome From Test ' . request('foo');
//});
//
//Route::put('test', function (){
//    return 'Welcome From PUT ' . request('foo');
//});
//
//Route::patch('test', function (){
//    return 'Welcome From PATCH ' . request('foo');
//});
//
//Route::delete('test', function (){
//    return 'Welcome From DELETE ' . request('foo');
//});
//
//get
//post
//put
//patch
//delete
//any

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'guest'],function (){
    Route::get('/manual/login','UsersController@login_get');
    Route::post('/manual/login','UsersController@login_post');
});

Route::get('admin/path',function (){
    return view('admin_area');
})->middleware('AuthAdmin:webAdmin');

Route::group(['middleware' => 'guest:webAdmin'], function (){
    Route::get('/admin/login','AdminController@login_get');
    Route::post('/admin/login','AdminController@login_post');
});

Route::get('admin/logout',function (){
//    auth()->guard('webAdmin')->logout();
    Auth::guard('webAdmin')->logout();
    return redirect('admin/login');
});

Route::get('test/route',function (\Request $request){
//    return $request::segment(2);
    return $request::segments();
});

Route::post('upload/file','UploadController@upload');

Route::get('event/test',function (){
    event(new \App\Events\EventTest('This Data For Test 1'));
});

Route::get('mail/test',function (){
    $job = (new \App\Jobs\sendMailJob())->delay(\Illuminate\Support\Carbon::now()->addSeconds(5));
    dispatch($job);

    return 'Message Send Successfully';
});

Route::get('user/delete/{id}','UsersController@delete_user');
Route::get('news/{id}','NewsController@show');
Route::post('news/{id}','NewsController@add_comment');