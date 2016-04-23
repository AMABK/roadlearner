<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('welcome');
});


/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */
Route::group(['middleware' => ['web']], function () {
    Route::get('fb', 'Auth\AuthController@redirectToProviderFB');
    Route::get('fb-callback', 'Auth\AuthController@handleProviderCallbackFB');
    Route::get('google', 'Auth\AuthController@redirectToProviderGoogle');
    Route::get('google-callback', 'Auth\AuthController@handleProviderCallbackGoogle');
    Route::get('gh', 'Auth\AuthController@redirectToProviderGH');
    Route::get('gh-callback', 'Auth\AuthController@handleProviderCallbackGH');
    Route::get('l', 'Auth\AuthController@redirectToProviderL');
    Route::get('l-callback', 'Auth\AuthController@handleProviderCallbackL');
});
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    //Home Contoller
    Route::get('/traffic-signs', array(
        'as' => 'traffic-signs',
        'uses' => 'HomeController@getTrafficSigns'
    ));
    Route::get('/driving-videos', array(
        'as' => 'driving-videos',
        'uses' => 'HomeController@getdrivingVideos'
    ));
    Route::get('/car-basics', array(
        'as' => 'car-basics',
        'uses' => 'HomeController@carBasics'
    ));
    Route::get('/general-tips', array(
        'as' => 'general-tips',
        'uses' => 'HomeController@generalTips'
    ));
    Route::get('/city-tips', array(
        'as' => 'city-tips',
        'uses' => 'HomeController@cityTips'
    ));
    Route::post('/driving-videos', array(
        'as' => 'driving-videos',
        'uses' => 'HomeController@getDrivingVideos'
    ));
//Admin contoller
    Route::post('/add-sign', array(
        'as' => 'add-sign',
        'uses' => 'AdminController@postAddSign'
    ));
    Route::post('/add-video', array(
        'as' => 'add-video',
        'uses' => 'AdminController@postAddVideo'
    ));
//Test Controller

    Route::get('/select-test', array(
        'as' => 'select-test',
        'uses' => 'TestController@selectTest'
    ));
    Route::get('/admin/test', array(
        'as' => '/admin/test',
        'uses' => 'TestController@adminTest'
    ));
    Route::get('/online-test', array(
        'as' => 'online-test',
        'uses' => 'TestController@getOnlineTest'
    ));
        Route::get('/image-auto-complete', array(
        'as' => 'image-auto-complete',
        'uses' => 'TestController@getImageDetails'
    ));
    
    //Redirects incase of a get instead of a post
    Route::get('/test-results', array(
        'as' => 'online-test',
        'uses' => 'TestController@getOnlineTest'
    ));
    //POST routes
    Route::post('/online-test', array(
        'as' => 'online-test',
        'uses' => 'TestController@onlineTest'
    ));
    Route::post('/test-results', array(
        'as' => 'test-results',
        'uses' => 'TestController@testResults'
    ));
    Route::post('/after-results', array(
        'as' => 'after-results',
        'uses' => 'TestController@afterResults'
    ));
    Route::post('/add-questions', array(
        'as' => 'add-questions',
        'uses' => 'TestController@addQuestions'
    ));
    
    //Authenticated routes
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/home', 'AdminController@index');
    });
});
