<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class muController extends Controller
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
       return $temp;
       //return redirect()->action('muController@showMu') ->with('error', 'error');
    }
    public function postMuFabricFault(Request $request)
    {
       
    }
     public function postMuRollShortage(Request $request)
    {
       
    }
     public function postProductionDamage(Request $request)
    {
       
    }
     public function postUnstableCut(Request $request)
    {
       
    }
      public function postCuttingMistake(Request $request)
    {
       
    }
}
