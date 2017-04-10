<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ordertocut_marchant;

class orderToCutMarchantController extends Controller
{
    public function view()
    {

        return view('order to cut.merchant');
    }


    public function updateData(Request $request)
    {
        $dbvar = ordertocut_marchant::find(2);
        if($request["orderQuantity"]){
            $dbvar->OrderQuantity = $request["orderQuantity"];
        }
        if($request["fabricNeed"]){
            $dbvar->FabricNeed = $request["fabricNeed"];
        }
        if($request["mockUpInput"]){
            $dbvar->MockUpInput = $request["mockUpInput"];
        }


        if($dbvar->MockUpInput != 0 && $dbvar->FabricNeed != 0)
        $dbvar->MockUpOutput = (100 * $dbvar->MockUpInput) / $dbvar->FabricNeed ;

        $dbvar->save();

        return view('order to cut.merchant');
    }


    public function insertOrderQuantity(Request $request)
    {
        $amount = $request -> input('orderQuantity');

        return view('order to cut.merchant') ->with('error','error');
    }

    public function insertFabricNeed(Request $request)
    {
        $amount = $request -> input('fabricNeed');

        DB::insert('insert into ordertocut_marchants (FabricNeed) values(?)',[$amount]);

        return redirect()->action('orderToCutMarchantController@view') ->with('error', 'error');
    }

    public function insertMockUpInput(Request $request)
    {
        $amount = $request -> input('mockUpInput');
        $id = 1;

        DB::table('ordertocut_marchants')
            ->where('id', 1)
            ->update(array('MockUpInput' => 1));

        return redirect()->action('orderToCutMarchantController@view') ->with('error', 'error');
    }
}
