<?php

use Illuminate\Support\Facades\Route;

Route::get('/','User\IndexController@index');
Route::get('about-us','User\IndexController@about');
Route::get('contact','User\IndexController@contact');

Route::get('about-a',function(){return view('user.a');})->name('about.g');

Route::get('about-ab',function(){
    return 100;
})->name('about.ab');

Route::get('master',function(){
    return view('welcome');
});


/*----------- Admin ---------- */
    Route::group(['prefix' => 'admin'],function(){

        // Dashboard
    Route::get('dashboard','Admin\DashboardController@index');

    // services
    Route::get('services','Admin\Service\ServiceController@index');
    Route::get('service/create','Admin\Service\ServiceController@create');
    Route::post('service/store','Admin\Service\ServiceController@add_service');
    Route::get('service/delete/{id}','Admin\Service\ServiceController@delete');
    Route::get('service/update-page/{id}','Admin\Service\ServiceController@update_page');
    Route::post('service/update','Admin\Service\ServiceController@update');
});
/*----------- Admin ---------- */

  #url
  #{{url("aboutgggg")}}
  #route
  #{{route("about.g")}}
