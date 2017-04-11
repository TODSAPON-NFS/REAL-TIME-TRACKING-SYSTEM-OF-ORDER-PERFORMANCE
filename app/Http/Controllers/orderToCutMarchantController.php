<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ordertocut_marchant;

class orderToCutMarchantController extends Controller
{
    public function view(Request $request)
    {
        $id = $request->session()->get('id');
        $dbvar = ordertocut_marchant::find($id);
        $items = [
            "id" => $id,
            "OrderQuantity" => $dbvar->OrderQuantity,
            "fabricNeed" => $dbvar->FabricNeed,
            "mockUpInput" => $dbvar->MockUpInput,
            "mockUpOutput" => $dbvar->MockUpOutput,
            "buyer" => $request->session()->get('buyer'),
            "orderNo" => $request->session()->get('orderNo'),
            "color" => $request->session()->get('color'),
            "item" => $request->session()->get('item')
        ];

        // echo $items[0]["OrderQuantity"] ;
        // echo $dbvar -> OrderQuantity;
        // echo $items["id"];
        //echo $id;

        return view('order to cut.merchant')->with('items', $items);
    }


    public function updateData(Request $request)
    {
        $id = $request->session()->get('id');

        $dbvar = ordertocut_marchant::find($id);

        //echo $request["updateOrderQuantity"] . "asd";

        if ($request["submit"] == "updateOrderQuantity" && $request["orderQuantity"]) {
            $dbvar->OrderQuantity = $request["orderQuantity"];
        } else if ($request["submit"] == "updateFabricNeed" && $request["fabricNeed"]) {
            $dbvar->FabricNeed = $request["fabricNeed"];
        } else if ($request["submit"] == "updateMockUpInput" && $request["mockUpInput"]) {
            $dbvar->MockUpInput = $request["mockUpInput"];
        }


        if ($dbvar->MockUpInput != 0 && $dbvar->FabricNeed != 0)
            $dbvar->MockUpOutput = (100 * $dbvar->MockUpInput) / $dbvar->FabricNeed;

        $dbvar->save();

        return redirect()->action('orderToCutMarchantController@view');
    }

}
