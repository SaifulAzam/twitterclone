<?php

Route::get('/', function() {
    return view('home');
});

Route::group(['prefix' => 'api/v1'], function() {

    Route::resource('authenticate', 'AuthController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthController@authenticate');
    Route::get('authenticate/user', 'AuthController@getAuthenticatedUser');

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
