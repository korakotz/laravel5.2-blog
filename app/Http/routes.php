<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::controller('admin/index','Admins\DashboardController');
Route::controller('admin/login','Admins\LoginController');

// Start Online Page
Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'Admins'],function(){
 Route::get('index',function(){
 return 'Login Success!!';
 });
});

Route::get('check-connect',function(){
 if(DB::connection()->getDatabaseName())
 {
 return "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
 }else{
 return 'Connection False !!';
 }

});

Route::get('/', function () {
	echo "welcome";
});
Route::post('hello/{name}/{sn}', function ($name,$sn) {
	echo 'welcome ' . $name .' surename is '.$sn;
});

//read item
Route::get('test', function () {
	echo '<form action="test" method="post">';
	echo '<input type="hidden" name="firstname" value="don">';
	echo '<input type="hidden" name="lastname" value="noi">';
	echo '<input type="submit" value="submit">';
	//echo '<input type="hidden" name="_token" value="'.csrf_token()'">';
	echo '<input type="hidden" name="_method" value="post">';
});
//create item
Route::post('test', function () {
	echo $_POST["firstname"] . " ". $_POST["lastname"];
});


//update item
Route::put('test', function () {
	echo "PUT";
});

//delete item
Route::delete('test', function () {
	echo "DELETE";
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
