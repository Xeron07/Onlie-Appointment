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
    Route::group(['middleware'=>['verifyAdmin']],function(){
      Route::get('/admin','AdminController@Index') ; 
    
      Route::post('/news/upload','AdminController@newsUpload');
      Route::post('/news/getNews','AdminController@getNews');

    });
    Route::group(['middleware'=>['verifyModarator']], function(){
    Route::get('/modarator','ModaratorController@Index') ; 
    Route::get('/modarator/users','ModaratorController@Users') ; 
    Route::get('/modarator/news/update/{id}','ModaratorController@newsUpdate') ;
    Route::get('/modarator/user/update/{id}','ModaratorController@userUpdate') ;
    Route::post('/modarator/update/news','updateController@news'); 
    Route::post('/modarator/news','deleteController@news');
    });


  Route::get('/home','HomeController@Index') ; 
  Route::get('/home/profile','HomeController@profile');
  Route::get('/home/calender','HomeController@calender');
  Route::get('/home/addAppointment','HomeController@addAppointment');
  Route::get('/home/todo','HomeController@todo');

  Route::post('/home/addAppointment','HomeController@addApp');
  Route::post('/home/getUpdateData','HomeController@getUpdateData');
  Route::post('/home/getJobs','HomeController@getJobs');
  Route::post('/home/getLocations','HomeController@getLocations');
  Route::post('/home/accept','HomeController@accept');
  Route::post('/home/cancel','HomeController@cancel');
  Route::post('/home/request','HomeController@setRequest');

  Route::post('/delete/user','deleteController@user');
  
  Route::post('/delete/appointment','deleteController@appointment');

    Route::post('/update/name','updateController@name');
    Route::post('/update/email','updateController@email');
    Route::post('/update/password','updateController@password');
    Route::post('/update/location','updateController@location');


    Route::post('/update/name/{id}','updateController@namei');
    Route::post('/update/email/{id}','updateController@emaili');
    Route::post('/update/password/{id}','updateController@passwordi');
    Route::post('/update/location/{id}','updateController@locationi');
   



});
