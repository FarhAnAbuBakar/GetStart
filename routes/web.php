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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/test', function () {
    return "test";
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/users/{id}/{name}', function ($id, $name) {
    return 'This is user name '.$name.' with ID ' .$id;
});

Route::get('/', function() {
    return view('pages.home');
});

Route::get('/', 'PagesController@home');
Route::get('/index', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::resource('posts','PostsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
