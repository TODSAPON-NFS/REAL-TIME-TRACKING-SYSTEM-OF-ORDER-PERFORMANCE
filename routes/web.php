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

//merchant1 input
Route::get('/input/merchant', function () {
    return view('order to cut.merchant1');
});

//CAD input
Route::get('/input/CAD', function () {
    return view('order to cut.cad');
});

//store input
Route::get('/input/store', function () {
    return view('order to cut.store');
});