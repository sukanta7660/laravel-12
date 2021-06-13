<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('user.welcome');
});
Route::get('about-us',function(){
    return view('user.about');
});

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
