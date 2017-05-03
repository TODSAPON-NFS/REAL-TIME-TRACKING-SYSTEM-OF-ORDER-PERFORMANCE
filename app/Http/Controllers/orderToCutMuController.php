<?php

namespace App\Http\Controllers;

use App\ordertocut_mu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orderToCutMuController extends Controller
{
    //
    public function showMu(Request $request)
    {
        $dept = $request->session()->get('dept');

        if ($dept != "MU")
            return redirect('/');

        $id = $request->session()->get('id');
        $dbvar = ordertocut_mu::find($id);

        //sum of six fields
        $FoundLoses = $dbvar->IncreasedConsumption + $dbvar->FabricFault + $dbvar->RollShortage + $dbvar->ProductionDamage + $dbvar->UnusableCutPcs + $dbvar->CuttingMistake;


        $items = [
            "id" => $id,
            "IncreasedConsumption" => $dbvar->IncreasedConsumption,
            "FabricFault" => $dbvar->FabricFault,
            "RollShortage" => $dbvar->RollShortage,
            "ProductionDamage" => $dbvar->ProductionDamage,
            "UnstableCut" => $dbvar->UnusableCutPcs,
            "CuttingMistake" => $dbvar->CuttingMistake,
            "FoundLosses" => $FoundLoses,
            "buyer" => $request->session()->get('buyer'),
            "orderNo" => $request->session()->get('orderNo'),
            "color" => $request->session()->get('color'),
            "item" => $request->session()->get('item')
        ];

        return view('order to cut.mu')->with('items', $items);
    }

    public function postMuConsumption(Request $request)
    {
        $temp = $request['Consumption'];
        $addOrDelete = $request['submit'];
        $id = $request->session()->get('id');
        if ($addOrDelete == 1) {
            $dbvar = ordertocut_mu::find($id);
            $dbvar->IncreasedConsumption = $dbvar->IncreasedConsumption + $temp;
            $dbvar->Output += $dbvar->IncreasedConsumption;
            $dbvar->save();
        } else {
            $dbvar = ordertocut_mu::find($id);
            $dbvar->IncreasedConsumption = $dbvar->IncreasedConsumption - $temp;
            $dbvar->Output -= $dbvar->IncreasedConsumption;
            $dbvar->save();
        }

        return redirect()->action('orderToCutMuController@showMu')->with('error', 'error');
    }

    public function postMuFabricFault(Request $request)
    {
        $temp = $request['FabricFault'];
        $addOrDelete = $request['submit'];
        $id = $request->session()->get('id');
        if ($addOrDelete == 1) {
            $dbvar = ordertocut_mu::find($id);
            $dbvar->FabricFault = $dbvar->FabricFault + $temp;
            $dbvar->Output += $dbvar->FabricFault;
            $dbvar->save();
        } else {
            $dbvar = ordertocut_mu::find($id);
            $dbvar->FabricFault = $dbvar->FabricFault - $temp;
            $dbvar->Output -= $dbvar->FabricFault;
            $dbvar->save();
        }

        return redirect()->action('orderToCutMuController@showMu')->with('error', 'error');
    }

    public function postMuRollShortage(Request $request)
    {
        $temp = $request['RollShortage'];
        $addOrDelete = $request['submit'];
        $id = $request->session()->get('id');
        if ($addOrDelete == 1) {
            $dbvar = ordertocut_mu::find($id);
            $dbvar->RollShortage = $dbvar->RollShortage + $temp;
            $dbvar->Output += $dbvar->RollShortage;
            $dbvar->save();
        } else {
            $dbvar = ordertocut_mu::find($id);
            $dbvar->RollShortage = $dbvar->RollShortage - $temp;
            $dbvar->Output -= $dbvar->RollShortage;
            $dbvar->save();
        }

        return redirect()->action('orderToCutMuController@showMu')->with('error', 'error');
    }

    public function postProductionDamage(Request $request)
    {
        $temp = $request['ProductionDamage'];
        $addOrDelete = $request['submit'];
        $id = $request->session()->get('id');
        if ($addOrDelete == 1) {
            $dbvar = ordertocut_mu::find($id);
            $dbvar->ProductionDamage = $dbvar->ProductionDamage + $temp;
            $dbvar->Output += $dbvar->ProductionDamage;
            $dbvar->save();
        } else {
            $dbvar = ordertocut_mu::find($id);
            $dbvar->ProductionDamage = $dbvar->ProductionDamage - $temp;
            $dbvar->Output -= $dbvar->ProductionDamage;
            $dbvar->save();
        }

        return redirect()->action('orderToCutMuController@showMu')->with('error', 'error');
    }

    public function postUnstableCut(Request $request)
    {
        $temp = $request['UnstableCut'];
        $addOrDelete = $request['submit'];
        $id = $request->session()->get('id');
        if ($addOrDelete == 1) {
            $dbvar = ordertocut_mu::find($id);
            $dbvar->UnusableCutPcs = $dbvar->UnusableCutPcs + $temp;
            $dbvar->Output += $dbvar->UnusableCutPcs;
            $dbvar->save();
        } else {
            $dbvar = ordertocut_mu::find($id);
            $dbvar->UnusableCutPcs = $dbvar->UnusableCutPcs - $temp;
            $dbvar->Output -= $dbvar->UnusableCutPcs;
            $dbvar->save();
        }

        return redirect()->action('orderToCutMuController@showMu')->with('error', 'error');
    }

    public function postCuttingMistake(Request $request)
    {
        $temp = $request['CuttingMistake'];
        $addOrDelete = $request['submit'];
        $id = $request->session()->get('id');
        if ($addOrDelete == 1) {
            $dbvar = ordertocut_mu::find($id);
            $dbvar->CuttingMistake = $dbvar->CuttingMistake + $temp;
            $dbvar->Output += $dbvar->CuttingMistake;
            $dbvar->save();
        } else {
            $dbvar = ordertocut_mu::find($id);
            $dbvar->CuttingMistake = $dbvar->CuttingMistake - $temp;
            $dbvar->Output -= $dbvar->CuttingMistake;
            $dbvar->save();
        }

        return redirect()->action('orderToCutMuController@showMu')->with('error', 'error');
    }
}
