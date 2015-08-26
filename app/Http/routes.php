<?php

Route::get('/', function() {
    return view('layouts.default');
});
//
// // Route::post('tweet', ['as' => 'tweet.store', 'uses' => 'UserController@storeTweet']);
//
// Route::group(['prefix' => 'auth'], function () {
//
//     Route::get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
//     Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\AuthController@postLogin']);
//     Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
//     Route::get('register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
//     Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\AuthController@postRegister']);
//
// });


Route::group(['prefix' => 'api/v1'], function() {

    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');

    Route::get('users/{id}/following', ['as' => 'users.following', 'uses' => 'UserController@following']);
    Route::get('users/{id}/followers', ['as' => 'users.followers', 'uses' => 'UserController@followers']);
    Route::get('users/{id}/retweets', ['as' => 'users.retweets', 'uses' => 'UserController@retweets']);
    Route::get('users/{id}/tweets', ['as' => 'users.tweets', 'uses' => 'UserController@tweets']);
    Route::get('users/{id}/messages', ['as' => 'users.messages', 'uses' => 'UserController@messages']);
    Route::get('users/{id}/newsfeed', ['as' => 'users.newsfeed', 'uses' => 'UserController@newsfeed']);

    Route::resource('users', 'UserController');
    Route::resource('messages', 'MessageController');
    Route::resource('tweets', 'TweetController');

    Route::get('newsfeed', ['as' => 'newsfeed', 'uses' => 'UserController@newsfeed']);

    Route::post('retweet', ['as' => 'tweet.store', 'uses' => 'UserController@reTweet']);


});
