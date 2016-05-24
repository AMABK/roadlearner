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

Route::get('/', array(
    'as' => '/',
    'uses' => 'HomeController@index'
));


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
    Route::auth();
    //Home Contoller
    Route::get('/traffic-signs', array(
        'as' => 'traffic-signs',
        'uses' => 'HomeController@getTrafficSigns'
    ));
    Route::get('/contact', array(
        'as' => 'contact',
        'uses' => 'HomeController@contact'
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
    Route::get('/quick-link/{id}', array(
        'as' => 'quick-link',
        'uses' => 'HomeController@quickLink'
    ));
    Route::get('/view-downloads', array(
        'as' => 'view-downloads',
        'uses' => 'HomeController@viewDownloads'
    ));
    Route::get('/download/{id}', array(
        'as' => 'download',
        'uses' => 'HomeController@download'
    ));
    Route::post('/driving-videos', array(
        'as' => 'driving-videos',
        'uses' => 'HomeController@getDrivingVideos'
    ));
    Route::post('/traffic-signs', array(
        'as' => 'traffic-signs',
        'uses' => 'HomeController@getTrafficSigns'
    ));
//Admin contoller
    Route::get('/admin/documents', array(
        'as' => '/admin/documents',
        'uses' => 'AdminController@documents'
    ));
    Route::get('/admin/add-doc', array(
        'as' => '/admin/add-doc',
        'uses' => 'AdminController@addDoc'
    ));
    Route::get('/admin/add-image', array(
        'as' => '/admin/add-image',
        'uses' => 'AdminController@addImage'
    ));
    Route::post('/admin/add-doc', array(
        'as' => '/admin/add-doc',
        'uses' => 'AdminController@postAddDoc'
    ));
    Route::post('/admin/edit-doc', array(
        'as' => '/admin/edit-doc',
        'uses' => 'AdminController@postEditDoc'
    ));
    Route::post('/admin/add-image', array(
        'as' => '/admin/add-image',
        'uses' => 'AdminController@postAddImage'
    ));
    Route::get('/admin/images', array(
        'as' => '/admin/images',
        'uses' => 'AdminController@images'
    ));
    Route::post('/admin/edit-image', array(
        'as' => '/admin/edit-image',
        'uses' => 'AdminController@postUpdateSign'
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

    //Authenticated routes
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/home', 'AdminController@index');
        Route::get('/admin/view-test', array(
            'as' => '/admin/view-test',
            'uses' => 'TestController@viewAdminTest'
        ));
        Route::post('/admin/view-test', array(
            'as' => '/admin/view-test',
            'uses' => 'TestController@viewAdminTest'
        ));
        Route::get('/admin/test', array(
            'as' => '/admin/test',
            'uses' => 'TestController@adminTest'
        ));
        Route::get('/admin/category', array(
            'as' => '/admin/category',
            'uses' => 'TestController@category'
        ));
        Route::post('/admin/add-questions', array(
            'as' => 'admin/add-questions',
            'uses' => 'TestController@addQuestions'
        ));
        Route::post('/admin/edit-question', array(
            'as' => 'admin/edit-question',
            'uses' => 'TestController@editQuestions'
        ));
        Route::post('/admin/edit-cat', array(
            'as' => 'admin/edit-cat',
            'uses' => 'TestController@editCategory'
        ));
        Route::post('/admin/add-cat', array(
            'as' => 'admin/add-cat',
            'uses' => 'TestController@addCategory'
        ));
    });
});
