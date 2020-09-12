<?php

use Illuminate\Support\Facades\Route;

Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
Route::delete('/users/{user}/destroy', 'UserController@destroy')->name('user.destroy');

Route::middleware('role:Admin')->group(function () {
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::put('/users/{user}/attach', 'UserController@attach')->name('user.role.attach');
    Route::put('/users/{user}/detatch', 'UserController@detach')->name('user.role.detach');
});

Route::middleware(['auth', 'can:view,user'])->group(function () {
    Route::put('/users/{user}/profile', 'UserController@update')->name('user.profile.update');
});
