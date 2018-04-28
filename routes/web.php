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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/order', function () {
    $order = \App\Order::find(2);

    //触发事件两种方式
    \App\Events\OrderUpdated::dispatch($order);
//    event(\App\Events\OrderUpdated());
//    return view('welcome');
});
