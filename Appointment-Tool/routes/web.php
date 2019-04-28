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

Route::get('/', 'Login@Index');
Route::get('/admin', 'AdminController@Index');

Route::get('/login', 'Login@Index');
Route::post('/login','Login@Log');
Route::get('/logout','LogoutController@Index');
Route::get('/registration','RegistrationController@Index');
Route::post('/registration','RegistrationController@verify');
Route::group(['middleware'=>['verify']], function(){
  Route::get('/home','HomeController@Index') ; 
  Route::get('/home/profile','HomeController@profile');
  Route::get('/home/calender','HomeController@calender');
  Route::get('/home/addAppointment','HomeController@addAppointment');
  Route::get('/home/todo','HomeController@todo');
  Route::post('/delete/user','deleteController@user');
  Route::post('/delete/appointment','deleteController@appointment');

    Route::post('/update/name','updateController@name');
    Route::post('/update/email','updateController@email');
    Route::post('/update/password','updateController@password');
    Route::post('/update/location','updateController@location');


});
