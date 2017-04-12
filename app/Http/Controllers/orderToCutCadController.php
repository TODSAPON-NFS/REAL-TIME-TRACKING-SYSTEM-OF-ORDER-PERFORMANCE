<?php

namespace App\Http\Controllers;

use App\ordertocut_cad;
use Illuminate\Http\Request;

class orderToCutCadController extends Controller
{
    //
    public function showCad(Request $request){
        $id = $request->session()->get('id');
        $dbvar = ordertocut_cad::find($id);
        $items = [
            "id" => $id,
            "CuttingWastage" => $dbvar->CuttingWastage,
            "ExtraLoading" => $dbvar->ExtraLoading,
            "RelaxingShrinkage" => $dbvar->RelaxingShrinkage,
            "WashingWastage" => $dbvar->WashingWastage,
            "buyer" => $request->session()->get('buyer'),
            "orderNo" => $request->session()->get('orderNo'),
            "color" => $request->session()->get('color'),
            "item" => $request->session()->get('item'),
            "output" => $dbvar -> Output
        ];
    	return view('order to cut.cad') -> with('items', $items);
    }

    public function UpdateCad(Request $request){

    	$this->validate($request, [
		    'CuttingWastage' => 'nullable|numeric',
		    'ExtraLoading' => 'nullable|numeric',
		    'RelaxingShrinkage' => 'nullable|numeric',
		    'WashingWastage' => 'nullable|numeric',
		]);

        $id = $request->session()->get('id');
    	$dbvar = ordertocut_cad::find($id);

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

        return redirect()->action('orderToCutCadController@showCad');
    	//return view('orderToCutCadController@showCad');
    }
}
