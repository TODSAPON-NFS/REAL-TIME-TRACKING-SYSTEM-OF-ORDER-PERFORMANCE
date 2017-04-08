<?php

namespace App\Http\Controllers;

use App\ordertocut_mu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orderToCutMuController extends Controller
{
    //
    public function showMu()
    {
        return view('order to cut.mu');
    }
    public function postMuConsumption(Request $request)
    {
       $temp = $request['Consumption'];
       $addOrDelete = $request['submit'];
       if($addOrDelete == 1)
       {
            $dbvar = ordertocut_mu::find(1);
            if(empty($dbvar))
            {
                $dbrow = new ordertocut_mu;
                $dbrow->save();
               $dbvar = ordertocut_mu::find(1);
            }
            $dbvar->IncreasedConsumption = $dbvar->IncreasedConsumption+$temp;
             $dbvar->Output = $dbvar->Output+(1.60* $dbvar->IncreasedConsumption);
            $dbvar->save();
       }
       else{
            $dbvar = ordertocut_mu::find(1);
            if(empty($dbvar))
            {
                $dbrow = new ordertocut_mu;
               $dbrow->save();
                $dbvar = ordertocut_mu::find(1);
            }
            $dbvar->IncreasedConsumption = $dbvar->IncreasedConsumption-$temp;
            if($dbvar->IncreasedConsumption < 0.0)
                $dbvar->IncreasedConsumption = 0;
            $dbvar->Output = $dbvar->Output-(1.60* $dbvar->IncreasedConsumption);
            $dbvar->save();
       }
      
       return redirect()->action('orderToCutMuController@showMu') ->with('error', 'error');
    }
    public function postMuFabricFault(Request $request)
    {
       $temp = $request['FabricFault'];
       $addOrDelete = $request['submit'];
       if($addOrDelete == 1)
       {
            $dbvar = ordertocut_mu::find(1);
           
            if(empty($dbvar))
            {
                $dbrow = new ordertocut_mu;
                $dbrow->save();
                $dbvar = ordertocut_mu::find(1);
            }
            $dbvar->FabricFault = $dbvar->FabricFault+$temp;
             $dbvar->Output = $dbvar->Output+(0.16*  $dbvar->FabricFault);
            $dbvar->save();
       }
       else{
            $dbvar = ordertocut_mu::find(1);
            if(empty($dbvar))
            {
                $dbrow = new ordertocut_mu;
               $dbrow->save();
                $dbvar = ordertocut_mu::find(1);
            }
            $dbvar->FabricFault = $dbvar->FabricFault-$temp;
            if($dbvar->FabricFault < 0.0)
                $dbvar->FabricFault = 0;
             $dbvar->Output = $dbvar->Output-(0.16*  $dbvar->FabricFault);
            $dbvar->save();
       }
      
       return redirect()->action('orderToCutMuController@showMu') ->with('error', 'error');
    }
     public function postMuRollShortage(Request $request)
    {
       $temp = $request['RollShortage'];
       $addOrDelete = $request['submit'];
       if($addOrDelete == 1)
       {
            $dbvar = ordertocut_mu::find(1);
            if(empty($dbvar))
            {
                $dbrow = new ordertocut_mu;
               $dbrow->save();
                $dbvar = ordertocut_mu::find(1);
            }
            $dbvar->RollShortage = $dbvar->RollShortage+$temp;
             $dbvar->Output = $dbvar->Output+0.93* $dbvar->RollShortage;
            $dbvar->save();
       }
       else{
            $dbvar = ordertocut_mu::find(1);
            if(empty($dbvar))
            {
                $dbrow = new ordertocut_mu;
                $dbrow->save();
                $dbvar = ordertocut_mu::find(1);
            }
            $dbvar->RollShortage = $dbvar->RollShortage-$temp;
            if($dbvar->RollShortage < 0.0)
                $dbvar->RollShortage = 0;
             $dbvar->Output = $dbvar->Output-0.93* $dbvar->RollShortage;
            $dbvar->save();
       }
      
       return redirect()->action('orderToCutMuController@showMu') ->with('error', 'error');
    }
     public function postProductionDamage(Request $request)
    {
       $temp = $request['ProductionDamage'];
       $addOrDelete = $request['submit'];
       if($addOrDelete == 1)
       {
            $dbvar = ordertocut_mu::find(1);
            if(empty($dbvar))
            {
                $dbrow = new ordertocut_mu;
                $dbrow->save();
                $dbvar = ordertocut_mu::find(1);
            }
            $dbvar->ProductionDamage = $dbvar->ProductionDamage+$temp;
            $dbvar->Output = $dbvar->Output+0.15* $dbvar->ProductionDamage;
            $dbvar->save();
       }
       else{
            $dbvar = ordertocut_mu::find(1);
            if(empty($dbvar))
            {
                $dbrow = new ordertocut_mu;
                $dbrow->save();
                $dbvar = ordertocut_mu::find(1);
            }
            $dbvar->ProductionDamage = $dbvar->ProductionDamage-$temp;
            if($dbvar->ProductionDamage < 0.0)
                $dbvar->ProductionDamage = 0;
             $dbvar->Output = $dbvar->Output-0.15* $dbvar->ProductionDamage;
            $dbvar->save();
       }
      
       return redirect()->action('orderToCutMuController@showMu') ->with('error', 'error');
    }
     public function postUnstableCut(Request $request)
    {
        $temp = $request['UnstableCut'];
       $addOrDelete = $request['submit'];
       if($addOrDelete == 1)
       {
            $dbvar = ordertocut_mu::find(1);
            if(empty($dbvar))
            {
                $dbrow = new ordertocut_mu;
               $dbrow->save();
                $dbvar = ordertocut_mu::find(1);
            }
            $dbvar->UnusableCutPcs = $dbvar->UnusableCutPcs+$temp;
            $dbvar->Output = $dbvar->Output+0.79* $dbvar->UnusableCutPcs;
            $dbvar->save();
       }
       else{
            $dbvar = ordertocut_mu::find(1);
            if(empty($dbvar))
            {
                $dbrow = new ordertocut_mu;
                $dbrow->save();
                $dbvar = ordertocut_mu::find(1);
            }
            $dbvar->UnusableCutPcs = $dbvar->UnusableCutPcs-$temp;
            if($dbvar->UnusableCutPcs < 0.0)
                $dbvar->UnusableCutPcs = 0;
             $dbvar->Output = $dbvar->Output-0.79* $dbvar->UnusableCutPcs;
            $dbvar->save();
       }
      
       return redirect()->action('orderToCutMuController@showMu') ->with('error', 'error');
    }
      public function postCuttingMistake(Request $request)
    {
         $temp = $request['CuttingMistake'];
       $addOrDelete = $request['submit'];
       if($addOrDelete == 1)
       {
            $dbvar = ordertocut_mu::find(1);
            if(empty($dbvar))
            {
                $dbrow = new ordertocut_mu;
                $dbrow->save();
                $dbvar = ordertocut_mu::find(1);
            }
           // return $temp;
            $dbvar->CuttingMistake = $dbvar->CuttingMistake+$temp;
            $dbvar->Output = $dbvar->Output+0.10* $dbvar->CuttingMistake;
            $dbvar->save();
       }
       else{
            $dbvar = ordertocut_mu::find(1);
            if(empty($dbvar))
            {
                $dbrow = new ordertocut_mu;
                $dbrow->save();
                $dbvar = ordertocut_mu::find(1);
            }
            $dbvar->CuttingMistake = $dbvar->CuttingMistake-$temp;
            if($dbvar->CuttingMistake < 0.0)
                $dbvar->CuttingMistake = 0;
             $dbvar->Output = $dbvar->Output-0.10* $dbvar->CuttingMistake;
            $dbvar->save();
       }
      
       return redirect()->action('orderToCutMuController@showMu') ->with('error', 'error');
    }
}
