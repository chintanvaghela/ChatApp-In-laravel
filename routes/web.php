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

Route::get('/','RegisterController@index')->name('home');

Route::get('registration',function(){
    return view('registration');
    });

Route::get('login',function(){
        return view('login');
    })->name('login');

Route::get('about',function(){
        return view('about');
    });

Route::get('contact',function(){
        return view('contact');
    });

Route::post('/','RegisterController@login');

Route::post('register','RegisterController@store');

Route::middleware('auth:web')->group(function () {

        Route::get('/send', function () {
            return view('message');
        });

        Route::get('logout','RegisterController@logout');

        Route::get('{id}/message','HomeController@index');

});

?>
