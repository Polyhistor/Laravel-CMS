<?php

use Illuminate\Support\Facades\Route;

Route::get('/roles', 'RoleController@index')->name('roles.index');
Route::post('/roles', 'RoleController@store')->name('roles.store');
Route::delete('/roles/{role}/destroy', 'RoleController@destroy')->name('roles.destroy');
