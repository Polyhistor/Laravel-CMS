<?php

use Illuminate\Support\Facades\Route;

Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
Route::delete('/users/{user}/destroy', 'UserController@destroy')->name('user.destroy');

Route::middleware('role:Admin')->group(function () {
    Route::get('/users', 'UserController@index')->name('users.index');
});

Route::middleware(['auth', 'can:view,user'])->group(function () {
    Route::put('/users/{user}/profile', 'UserController@update')->name('user.profile.update');
});
