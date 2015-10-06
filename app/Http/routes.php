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
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/dash',['middleware' => 'auth', function () {

    return redirect('/');
}]);
Route::get('/maintainance','PagesController@maintainance');
Route::get('/check','PagesController@check');
Route::get('/','PagesController@home');
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
Route::resource('/maintainance/repairs','RepairsController');
Route::resource('/technicans','TechnicansController');
Route::patch('/maintainance/tasks/finish/{repairs}','TasksController@finish');
Route::resource('/maintainance/tasks','TasksController');
//Route::get('/failures','FailuresController@index');
