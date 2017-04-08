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
    return view('home');
});

Route::get('/root', function () {
    return view('root_inputs');
});
Route::get('/cover', function () {
    return view('cover');
});

// *****
//Order to cut merchant inputs
//******
Route::get('/order-to-cut/merchant',  'orderToCutMarchantController@view');
//merchant quantity input
Route::post('/order-to-cut/merchant-quantity',  'orderToCutMarchantController@insertOrderQuantity');
// Fabric need
Route::post('/order-to-cut/fabric-need',  'orderToCutMarchantController@insertFabricNeed');
// Fabric need
Route::post('/order-to-cut/mockup-input',  'orderToCutMarchantController@insertMockUpInput');



//CAD input
Route::get('/input/CAD', function () {
    return view('order to cut.cad');
});

//store input
Route::get('/order-to-cut/store', function () {
    return view('order to cut.store');
});

//MU input
Route::get('/input/mu', 'muController@showMu');
Route::post('/input/mu', 'muController@postMuConsumption');


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

//sew input
Route::get('/order-to-ship/sew', function () {
    return view('Order to ship.sew');
});

//finishing input
Route::get('/order-to-ship/finishing', function () {
    return view('Order to ship.finishing');
});

//rejection input
Route::get('/order-to-ship/rejection', function () {
    return view('Order to ship.rejection');
});
//packing input
Route::get('/order-to-ship/packing', function () {
    return view('Order to ship.packing');
});