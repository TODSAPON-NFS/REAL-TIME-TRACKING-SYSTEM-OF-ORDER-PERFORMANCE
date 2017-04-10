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

Route::get('/','HomeController@home');
Route::post('/login', 'HomeController@check');

// *****
//This is root of the webapplication
//******
//Route::get('/root', 'rootController@showRoot');
Route::post('/root/postCreateDb', 'rootController@postCreateDb');

Route::post('root/cover/validate', 'CoverController@redirect');

// Route::get('/cover', function () {
//     return view('cover');
// });

// *****
//Order to cut merchant inputs
//******
Route::get('/order-to-cut/merchant',  'orderToCutMarchantController@view');
//merchant quantity input
Route::post('/order-to-cut/merchant/update',  'orderToCutMarchantController@updateData');



//CAD input
Route::get('/input/CAD','orderToCutCadController@showCad');
Route::post('/input/CAD/update', 'orderToCutCadController@UpdateCad');

//store input
Route::get('/order-to-cut/store', function () {
    return view('order to cut.store');
});

//MU input
Route::get('/mu', 'orderToCutMuController@showMu');
Route::post('/mu/Consumption', 'orderToCutMuController@postMuConsumption');
Route::post('/mu/FabricFault', 'orderToCutMuController@postMuFabricFault');
Route::post('/mu/RollShortage', 'orderToCutMuController@postMuRollShortage');
Route::post('/mu/ProductionDamage', 'orderToCutMuController@postProductionDamage');
Route::post('/mu/UnstableCut', 'orderToCutMuController@postUnstableCut');
Route::post('/mu/CuttingMistake', 'orderToCutMuController@postCuttingMistake');


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