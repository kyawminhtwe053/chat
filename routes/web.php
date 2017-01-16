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

Route::get('/{username}', function ($username) {
    return View::make('chats')->with('username',$username);
});

Route::get('sendMessage/{text}/{username}',array('uses'=>'ChatController@sendMessage'));
Route::get('isTyping/{username}',array('uses'=>'ChatController@isTyping'));
Route::get('notTyping/{username}',array('uses'=>'ChatController@notTyping'));
Route::get('retrieveChatMessages/{username}',array('uses'=>'ChatController@retrieveChatMessages'));
Route::get('retrieveTypingStatus/{username}',array('uses'=>'ChatController@retrieveTypingStatus'));
