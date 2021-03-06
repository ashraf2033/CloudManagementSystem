<?php
use App\Failure;
use Jenssegers\Date\Date;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/home', function () {

    return redirect('/dash');
});
Route::get('/table', function () {
$failures = Failure::all();
    return view('failures.table',compact('failures'));
});
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// Registration routes...
/*
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
*/
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
Route::get('/dash',['middleware' => 'auth', function () {

    return redirect('/');
}]);
Route::get('/maintainance','PagesController@maintainance');
//Route::get('/check','PagesController@check');
Route::get('/','PagesController@home');
Route::resource('/users','UsersController');
Route::get('/maintainance/failures/export','FailuresController@export');
Route::post('/maintainance/failures/download','FailuresController@download');
Route::resource('/maintainance/failures','FailuresController');
Route::post('/machines/download','MachinesController@download');
Route::resource('/machines','MachinesController');
Route::resource('/spareparts','SparePartsController');
Route::put('/maintainance/repairs/approve/{repairs}','RepairsController@approve');
Route::patch('/maintainance/repairs/approve/{repairs}','RepairsController@approve');
Route::patch('/maintainance/repairs/finish/{repairs}','RepairsController@finish');
Route::get('/maintainance/repairs/waiting','RepairsController@waiting');
Route::get('/maintainance/repairs/archive','RepairsController@archive');
Route::resource('/maintainance/repairs','RepairsController');
Route::resource('/technicans','TechnicansController');
Route::patch('/maintainance/tasks/finish/{repairs}','TasksController@finish');
Route::get('/maintainance/tasks2','TasksController@index2');
Route::resource('/maintainance/tasks','TasksController');
Route::resource('/transes','TransesController');
//Route::get('/failures','FailuresController@index');
