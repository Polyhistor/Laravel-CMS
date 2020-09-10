<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{post}', 'PostController@show')->name('post');

Route::middleware('auth')->group(function () {
    Route::get('/admin', 'AdminsController@index')->name('admin.index');
    Route::get('/admin/posts/create', 'PostController@create')->name('post.create');
    Route::get('/admin/posts', 'PostController@index')->name('post.index');
    // Route::get('/admin/posts/edit/{post}', 'PostController@edit')->name('post.edit');

    Route::post('/admin/posts', 'PostController@store')->name('post.store');

    Route::delete('/admin/posts/{post}/destroy', 'PostController@destroy')->name('post.destroy');
    Route::patch('/admin/posts/{post}/update', 'PostController@update')->name('post.update');

    Route::get('/admin/users/{user}/profile', 'UserController@show')->name('user.profile.show');
    Route::put('/admin/users/{user}/profile', 'UserController@update')->name('user.profile.update');
});


Route::get('/admin/posts/edit/{post}', 'PostController@edit')->middleware('can:view,post')->name('post.edit');
