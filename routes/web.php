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
//     // return view('welcome');
//     return '<h1>helloworld</h1>';    
// });

// Route::get('/user/{id}/{name}', function ($id, $name) {
//     return 'this is '.$name.' with an id of '.$id;
// });

// Route::get('/about', function () {
//     return view('pages/about');
// });

Route::get('/', 'PagesController@index');
Route::get('/home', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::get('/posts/{post}/comments', 'CommentsController@store')->name('addComment');
Route::post('/posts/{post}/comments', 'CommentsController@commentSave');
Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::get('/send_verification_mail', 'VerificationController@sendMail')->name('sendMail');


Route::resource('posts', 'PostsController');

Auth::routes();
Route::get('/verification/{id}/{verify_token}','VerificationController@emailVerify' );

Route::get('/dashboard', 'DashboardController@index');
