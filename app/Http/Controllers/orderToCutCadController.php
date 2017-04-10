<?php

namespace App\Http\Controllers;

use App\ordertocut_cad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orderToCutCadController extends Controller
{
    //
    public function showCad(){
    	$dbvar = ordertocut_cad::find(1);
    	return view('order to cut.cad');
    }

    public function UpdateCad(Request $request){

    	$this->validate($request, [
		    'CuttingWastage' => 'nullable|numeric',
		    'ExtraLoading' => 'nullable|numeric',
		    'RelaxingShrinkage' => 'nullable|numeric',
		    'WashingWastage' => 'nullable|numeric',
		]);

    	$dbvar = ordertocut_cad::find(1);

    	if($request["CuttingWastage"]){
    		$dbvar->CuttingWastage = $request["CuttingWastage"];
    	}
    	if($request["ExtraLoading"]){
    		$dbvar->ExtraLoading = $request["ExtraLoading"];
    	}
    	if($request["RelaxingShrinkage"]){
    		$dbvar->RelaxingShrinkage = $request["RelaxingShrinkage"];
    	}
    	if($request["WashingWastage"]){
    		$dbvar->WashingWastage = $request["WashingWastage"];
    	}

    	$dbvar->Output = $dbvar->CuttingWastage + $dbvar->ExtraLoading + $dbvar->RelaxingShrinkage + $dbvar->WashingWastage;
    	$dbvar->save();

    	return view('order to cut.cad');
    }
}
