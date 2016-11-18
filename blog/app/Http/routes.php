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

/*Route::get('/posts', function () {
    return view('posts');
});*/
Route::get("/Logout", 'AdminController@logout');

Route::get("/logout", 'MemberController@logout');
Route::get("/admin", 'AdminController@create');
Route::post("admin.login", 'AdminController@login');

Route::get("/", 'MemberController@create');
Route::get("/reg", 'MemberController@reg');
Route::post("member.store", 'MemberController@store');
Route::post("member.login", 'MemberController@login');
Route::get('/showMember', 'MemberController@show');
Route::get("member/showOne/{member_id}", 'MemberController@showOne');

Route::get("/add", 'PostController@create');
Route::post("post.store", 'PostController@store');
Route::get("/posts", 'PostController@show');
//BaxkEnd

//Route::resource('post','\App\Http\Controllers\CustomerController');
Route::get('list','\App\Http\Controllers\PostController@home');
Route::get('post/showOne/{post_id}','\App\Http\Controllers\PostController@showOne');
Route::get("list/edit/{post_id}", 'PostController@edit');
Route::post("list/update/{post_id}", 'PostController@update');
//Route::get('customer/{id}/destroy','\App\Http\Controllers\CustomerController@destroy');
Route::get('list/destroy/{id}','\App\Http\Controllers\PostController@destroy');
