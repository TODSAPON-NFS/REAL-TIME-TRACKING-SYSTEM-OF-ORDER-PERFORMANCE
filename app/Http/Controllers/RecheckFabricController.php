<?php

namespace App\Http\Controllers;

use App\recheck_fabric;
use App\recheck;
use Illuminate\Http\Request;

class RecheckFabricController extends Controller
{
    public function show(Request $request)
    {
        $id = $request->session()->get('id');
        $dbvar = recheck_fabric::find($id);

        $items = [
            "buyer" => $request->session()->get('buyer'),
            "orderNo" => $request->session()->get('orderNo'),
            "color" => $request->session()->get('color'),
            "item" => $request->session()->get('item'),
            "shrinkage" => $dbvar->Shrinkage,
            "bowling" => $dbvar->Bowling,
            "fabricFault" => $dbvar->FabricFault
        ];


        return view('Recheck with extra booking.fabric')->with('items', $items);
    }

    public function shrinkage(Request $request)
    {
        $id = $request->session()->get('id');
        $dbvar = recheck_fabric::find($id);
        $mainDb = recheck::find($id);

        $shrinkage = $request["shrinkage"];
        if($request["submit"] == 1)
        {
            $dbvar->Shrinkage = $shrinkage;
            $dbvar->ShrinkageOutput = -(100*$shrinkage)/($mainDb->MarkerLengthInYard);
            $mainDb->LayLength = $mainDb->MarkerLengthInYard+$dbvar->ShrinkageOutput+$dbvar->Bowling+0.0218723;

        }
        else{
            $dbvar->Shrinkage = $shrinkage;
            $dbvar->ShrinkageOutput = (100*$shrinkage)/($mainDb->MarkerLengthInYard);
            $mainDb->LayLength = $mainDb->MarkerLengthInYard-$dbvar->ShrinkageOutput+$dbvar->Bowling+0.0218723;
        } 

        if($dbvar->Shrinkage <= 0)
            $dbvar->Shrinkage = 0;

        $dbvar->save();

         $items = [
            "buyer" => $request->session()->get('buyer'),
            "orderNo" => $request->session()->get('orderNo'),
            "color" => $request->session()->get('color'),
            "item" => $request->session()->get('item'),
            "shrinkage" => $dbvar->Shrinkage,
            "bowling" => $dbvar->Bowling,
            "fabricFault" => $dbvar->FabricFault
        ];


        return view('Recheck with extra booking.fabric')->with('items', $items);
    }

    public function bowling(Request $request)
    {
        $id = $request->session()->get('id');
        $dbvar = recheck_fabric::find($id);
          $mainDb = recheck::find($id);

        $bowling = $request["bowling"];
       
        $dbvar->Bowling = $bowling;
        $dbvar->BowlingOutput = (100*$bowling)/($mainDb->MarkerLengthInYard*5);

        $dbvar->save();

         $items = [
            "buyer" => $request->session()->get('buyer'),
            "orderNo" => $request->session()->get('orderNo'),
            "color" => $request->session()->get('color'),
            "item" => $request->session()->get('item'),
            "shrinkage" => $dbvar->Shrinkage,
            "bowling" => $dbvar->Bowling,
            "fabricFault" => $dbvar->FabricFault
        ];


        return view('Recheck with extra booking.fabric')->with('items', $items);
    }

    public function fault(Request $request)
    {
   
        $id = $request->session()->get('id');
        $dbvar = recheck_fabric::find($id);

        $fault = $request["fault"];
       
        $dbvar->FabricFault = $fault;

        $dbvar->save();

         
         $items = [
            "buyer" => $request->session()->get('buyer'),
            "orderNo" => $request->session()->get('orderNo'),
            "color" => $request->session()->get('color'),
            "item" => $request->session()->get('item'),
            "shrinkage" => $dbvar->Shrinkage,
            "bowling" => $dbvar->Bowling,
            "fabricFault" => $dbvar->FabricFault
        ];

        return view('Recheck with extra booking.fabric')->with('items', $items);
    }



}