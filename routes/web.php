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

Route::get('/', 'HomeController@home');
Route::get('/logout', 'HomeController@logout');
Route::post('/login', 'HomeController@check');

// *****
//This is root of the webapplication
//******
//Route::get('/root', 'rootController@showRoot');
Route::post('/root/postCreateDb', 'rootController@postCreateDb');
Route::post('root/cover/validate', 'CoverController@redirect');

//for general users
Route::get('/search', 'SearchController@show');
Route::get('/searchResult', 'SearchController@viewSearchResult');
Route::post('/searchResult', 'SearchController@search');
Route::post('/search/result', 'SearchController@searchRedirect');

//Route::get('/cover', 'CoverController@viewCover');

// *****
//Order to cut merchant inputs
//******
Route::get('/order-to-cut/merchant', 'orderToCutMarchantController@view');
Route::post('/order-to-cut/merchant/update', 'orderToCutMarchantController@updateData');

//CAD input
Route::get('/input/CAD', 'orderToCutCadController@showCad');
Route::post('/input/CAD/update', 'orderToCutCadController@UpdateCad');

//store input
Route::get('/order-to-cut/store', 'orderToCutStoreController@view');
Route::post('/order-to-cut/store/update', 'orderToCutStoreController@updateData');

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
Route::get('/recheck/cad', 'RecheckCadController@show');
Route::post('/recheck/cad/addMarker', 'RecheckCadController@addMarker');
Route::post('/recheck/cad/updateMarkerLength', 'RecheckCadController@updateMarkerLength');
Route::post('/recheck/cad/updatePiles', 'RecheckCadController@updatePiles');
Route::post('/recheck/cad/updateMarkerPcs', 'RecheckCadController@updatemarkerPcs');
Route::post('/recheck/cad/uploadFile', 'RecheckCadController@uploadFile');


//fabric input
Route::get('/recheck/fabric', 'RecheckFabricController@show');
Route::post('/recheck/fabric/shrinkage', 'RecheckFabricController@shrinkage');
Route::post('/recheck/fabric/bowling', 'RecheckFabricController@bowling');
Route::post('/recheck/fabric/fault', 'RecheckFabricController@fault');

/*order to ship*/
//marchant input
Route::get('/order-to-ship/marchant', 'OrderToShipMerchantController@show');
Route::post('/order-to-ship/sizeInput', 'OrderToShipMerchantController@addSize');
Route::post('/order-to-ship/updateMerchantOrderQuantity', 'OrderToShipMerchantController@updateOrderQuantity');
Route::post('/order-to-ship/merchantUpdateSize', 'OrderToShipMerchantController@updateSizes');

//cad input
Route::get('/order-to-ship/cad', 'OrderToShipCadController@show');
Route::post('/order-to-ship/cadCutInput', 'OrderToShipCadController@updateCut');
Route::post('/order-to-ship/cadFabricInput', 'OrderToShipCadController@updateFabric');
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
Route::get('/order-to-ship/packing', 'OrderToShipPackingController@show');
Route::post('order-to-ship/updatePackingReceive', 'OrderToShipPackingController@updateOrderQuantity');