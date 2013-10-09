<?php

Route::get('/', 'PagesController@home');
Route::get('/privacy', 'PagesController@privacy');
Route::get('/products', 'ProductsController@index');
Route::get('/products/{code}', 'ProductsController@show');
Route::get('/cart', 'CartController@index');
Route::post('/cart', 'CartController@add');
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');