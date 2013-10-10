<?php

Route::get('/', 'PagesController@home');
Route::get('/privacy', 'PagesController@privacy');

Route::get('/products', 'ProductsController@index');
Route::get('/products/{code}', 'ProductsController@show');

Route::get('/cart', 'CartController@index');
Route::post('/cart', 'CartController@add');
Route::get('/cart/clear', 'CartController@clear');
Route::get('/cart/remove/{code}', 'CartController@remove');

Route::get('/checkout', 'OrdersController@create');
Route::post('/checkout', 'OrdersController@store');
Route::get('/checkout/done', 'OrdersController@show');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');