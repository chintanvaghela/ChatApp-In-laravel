<?php

use Illuminate\Http\Request;
use App\User;
use App\messages;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//this for returning users list
Route::get('/users', function (Request $request) {
    return User::get();
});

//this for geting users messages
Route::get('/users/{sender_id}/{reciver_id}', function (Request $request,$sender_id,$reciver_id) {
    return User::find($sender_id)->message()->where([['sender_id','=',$sender_id],['reciver_id','=',$reciver_id]])->orWhere([['sender_id','=',$reciver_id],['reciver_id','=',$sender_id]])->get();
});

//this is for storing users messages
Route::post('/message', function (Request $request) {
    $message=messages::create(['sender_id'=>$request->sender_id,'message'=>$request->message,'reciver_id'=>$request->reciver_id]);
    event(new App\Events\NewMessage($message,$request->reciver_id));
    return $message;
});
