<?php

namespace App\Http\Controllers;

use App\ordertocut;
use App\ordertocut_store;
use App\ordertocut_mu;
use App\ordertocut_marchant;
use App\ordertocut_cad;
use App\ordertoship;
use App\recheck;
use App\recheck_cad;
use App\recheck_fabric;
use Illuminate\Http\Request;

class rootController extends Controller
{
    public function showRoot()
    {
        return view('root_inputs')->with('invalid', '');
    }

    public function postCreateDb(Request $request)
    {
        if (empty($request["buyer"]) || empty($request["order"]) || empty($request["color"]) || empty($request["item"]))
            return view('root_inputs')->with('invalid', 'Please Enter All Fields');

        //to prevent case related error
        $buyer = strtoupper($request["buyer"]);
        $order = strtoupper($request["order"]);
        $color = strtoupper($request["color"]);
        $item = strtoupper($request["item"]);

        $db = ordertocut::where('Buyer', '=', $buyer)->where('OrderNo', '=', $order)
            ->where('Color', '=', $color)->where('Item', '=', $item)->get();


        if (empty($db[0])) {
            //save in order to cut database and get the id
            $dbvar = new ordertocut;
            $dbvar->Buyer = $request["buyer"];
            $dbvar->OrderNo = $request["order"];
            $dbvar->Color = $request["color"];
            $dbvar->Item = $request["item"];
            $dbvar->save();

            $dbvar = new recheck;
            $dbvar->Buyer = $request["buyer"];
            $dbvar->OrderNo = $request["order"];
            $dbvar->Color = $request["color"];
            $dbvar->Item = $request["item"];
            $dbvar->save();

            $dbvar = new ordertoship;
            $dbvar->Buyer = $request["buyer"];
            $dbvar->OrderNo = $request["order"];
            $dbvar->Color = $request["color"];
            $dbvar->Item = $request["item"];
            $dbvar->save();

            $key = $dbvar->id;


            //create row with the same id in every other table
            $dbstore = new ordertocut_store;
            $dbstore->id = $key;
            $dbstore->save();

            $dbstore = new ordertocut_mu;
            $dbstore->id = $key;
            $dbstore->save();

            $dbstore = new ordertocut_marchant;
            $dbstore->id = $key;
            $dbstore->save();

            $dbstore = new ordertocut_cad;
            $dbstore->id = $key;
            $dbstore->save();

            //for recheck db
            $dbstore = new recheck_fabric;
            $dbstore->id = $key;
            $dbstore->save();

            //$dbstore = new recheck_cad;
            // $dbstore->id = $key;
            //$dbstore->save();

            //storing to session to access in every page
            $request->session()->put('id', $dbvar->id);
            $request->session()->put('buyer', $dbvar->Buyer);
            $request->session()->put('orderNo', $dbvar->OrderNo);
            $request->session()->put('color', $dbvar->Color);
            $request->session()->put('item', $dbvar->Item);
        } else {
            $key = $db[0]->id;
            //storing to session to access in every page
            $request->session()->put('id', $db[0]->id);
            $request->session()->put('buyer', $db[0]->Buyer);
            $request->session()->put('orderNo', $db[0]->OrderNo);
            $request->session()->put('color', $db[0]->Color);
            $request->session()->put('item', $db[0]->Item);
        }


        //For calculating getting and saving result
        /*$db = ordertocut::find($key);
        $cad = ordertocut_cad::find($key);
        $merchant = ordertocut_marchant::find($key);
        $store = ordertocut_store::find($key);
        $mu = ordertocut_mu::find($key);
        $extraFabric = $cad->Output - $merchant->MockUpOutput - $store->Output;
        $shortExcess = $mu->Output - $extraFabric;


        $db->ExtraFabric = $extraFabric;
        $db->ExcessMonitoring = $shortExcess;*/
        //endcalculating

        //for calculating and saving result in recheck
        /*$db1 = recheck::find($key);
        $cad = recheck_cad::find($key);
        $fabric = recheck_fabric::find($key);


        $db1->MarkerLengthInYard = $db->markerLengthInMeter * 1.09361;
        $db1->FabricRequired = $db->LayLength * $cad->Piles;
        $db1->Totalfabric = $db->FabricRequired + $fabric->FabricFaultOutput;

        $extraBooking = 0;

        if ($merchant->FabricNeed > 0)
            $extraBooking = (($merchant->FabricNeed - $db->Totalfabric) * 100) / $merchant->FabricNeed;

        $db1->ExtraBooking = $extraBooking;
        //endcalculating

        $request["excessMonitor"] = $db->ExcessMonitoring;
        $request["extraBooking"] = $db->ExcessMonitoring;

        $marker = recheck_cad::where('id', '=', $key)->get();*/

        return view('cover')->with(array('inputs' => $request));
    }

}