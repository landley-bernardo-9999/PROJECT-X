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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{id}/{name}', function ($id,$name) {
    return 'My Id number is '.$id.' and this is ' .$name;
});

Route::get('/','PagesController@index');

Route::get('/welcome','PagesController@welcome');


/***
    Route::get('/landley', function () {
    return view('pages.landley');
})
;*/

#RESTful API
#post
#delete
