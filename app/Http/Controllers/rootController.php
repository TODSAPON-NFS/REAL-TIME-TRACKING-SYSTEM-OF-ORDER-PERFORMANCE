<?php

namespace App\Http\Controllers;

use App\ordertocut;
use App\ordertocut_store;
use App\ordertocut_mu;
use App\ordertocut_marchant;
use App\ordertocut_cad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


        $db = ordertocut::where('Buyer', '=', $request["buyer"])->where('OrderNo', '=', $request["order"])
            ->where('Color', '=', $request["color"])->where('Item', '=', $request["item"])->get();

        if (empty($db[0])) {
            //save in order to cut database and get the id
            $dbvar = new ordertocut;
            $dbvar->Buyer = $request["buyer"];
            $dbvar->OrderNo = $request["order"];
            $dbvar->Color = $request["color"];
            $dbvar->Item = $request["item"];
            $dbvar->save();

            // $db = ordertocut::where('Buyer','=',$request["buyer"])->where('OrderNo','=',$request["order"])
            //              ->where('Color','=',$request["color"])->where('Item','=',$request["item"])->get();

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

            //$request->session()->put('dept', $dept);

        }

        //$key = $db[0]->id;
        //storing to session to access in every page
        $request->session()->put('id', $db[0] -> id);
        $request->session()->put('buyer', $db[0] -> Buyer);
        $request->session()->put('orderNo', $db[0] -> OrderNo);
        $request->session()->put('color', $db[0] -> Color);
        $request->session()->put('item', $db[0] -> Item);
       // echo $key;


        return view('cover')->with(array('inputs' => $request));
    }
}