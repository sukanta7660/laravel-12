<?php

use Illuminate\Support\Facades\Route;

Route::get('/','User\IndexController@index');
Route::get('about-us','User\IndexController@about');

Route::get('about-a',function(){return view('user.a');})->name('about.g');

Route::get('about-ab',function(){
    return 100;
})->name('about.ab');

Route::get('master',function(){
    return view('welcome');
});
  #url
  #{{url("aboutgggg")}}
  #route
  #{{route("about.g")}}
