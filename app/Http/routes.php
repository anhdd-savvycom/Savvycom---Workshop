<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $blogs = \App\Blog::orderBy('created_at', 'desc')->paginate(5);

    return view('welcome')->with('blogs', $blogs);
});

Route::get('/blogs/{blog}', function (\App\Blog $blog) {
    return view('blog')->with('blog', $blog);
});

Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

Route::get('/admin', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        Route::get('/blogs',                'BlogController@index');
        Route::get('/blogs/add',            'BlogController@add');
        Route::post('/blogs/doAdd',         'BlogController@doAdd');

        Route::get('/blogs/edit/{id}',      'BlogController@edit');
        Route::post('/blogs/doEdit',        'BlogController@doEdit');

        Route::get('/blogs/delete/{id}',    'BlogController@delete');
    });

    Route::post('ckeditorUpload', ['as' => 'ckeditor.upload', 'uses' => 'HomeController@ckeditorUpload']);
});