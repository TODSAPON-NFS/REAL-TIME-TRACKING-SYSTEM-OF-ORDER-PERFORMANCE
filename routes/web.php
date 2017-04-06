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

//MU input
Route::get('/input/mu', function () {
    return view('order to cut.mu');
});


//recheck with extra booking

//cad input
Route::get('/recheck/cad', function () {
    return view('Recheck with extra booking.cad');
});

//fabric input
Route::get('/recheck/fabric', function () {
    return view('Recheck with extra booking.fabric');
});

//order to ship

//marchant input
Route::get('/order-to-ship/marchant', function () {
    return view('Order to ship.marchant');
});

//cad input
Route::get('/order-to-ship/cad', function () {
    return view('Order to ship.cad');
});
//cut input
Route::get('/order-to-ship/cut', function () {
    return view('Order to ship.cut');
});