<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/posts/create', 'PostController@create')->name('post.create');
    Route::get('/posts', 'PostController@index')->name('post.index');
    Route::get('/posts/edit/{post}', 'PostController@edit')->name('post.edit');
    Route::post('/posts', 'PostController@store')->name('post.store');
    Route::delete('/posts/{post}/destroy', 'PostController@destroy')->name('post.destroy');
    Route::patch('/posts/{post}/update', 'PostController@update')->name('post.update');
});
