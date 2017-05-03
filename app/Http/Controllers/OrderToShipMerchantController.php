<?php

namespace App\Http\Controllers;

use App\ordertoship_marchant;
use Illuminate\Http\Request;

class OrderToShipMerchantController extends Controller
{
    public function show(Request $request)
    {
        $dept = $request->session()->get('dept');

        if ($dept != "Merchandising")
            return redirect('/');

        $id = $request->session()->get('id');
        $db = ordertoship_marchant::where('id', '=', $id)->get();

        $items = [
            "id" => $id,
            "buyer" => $request->session()->get('buyer'),
            "orderNo" => $request->session()->get('orderNo'),
            "color" => $request->session()->get('color'),
            "item" => $request->session()->get('item'),
        ];

        return view('Order to ship.marchant')->with('items', $items)->with('db', $db);
    }

    public function addSize(Request $request)
    {
        $id = $request->session()->get('id');

        if ($request["Size"] != "") {
            $merchant = new ordertoship_marchant;
            $merchant->id = $id;
            $merchant->Size = $request["Size"];
            $merchant->save();
        }

        return redirect('/order-to-ship/marchant');
    }

    public function updateOrderQuantity(Request $request)
    {
        $id = $request->session()->get('id');

        if ($request["hiddenMerchantID"] != "" && $request["updateOrderQuantity"] != "") {
            ordertoship_marchant::where('marchant_id', '=', $request["hiddenMerchantID"])->update(['OrderQuantity' => $request["updateOrderQuantity"]]);

        }


        return redirect('/order-to-ship/marchant');
    }

    public function updateSizes(Request $request)
    {
        $id = $request->session()->get('id');

        if ($request["updateHiddenSize"] != "" && $request["sizeUpdate"] != "" && $request["submit"] == "update") {
            ordertoship_marchant::where('marchant_id', '=', $request["updateHiddenSize"])->update(['Size' => $request["sizeUpdate"]]);
            //echo $var;

        } else if ($request["updateHiddenSize"] != "" && $request["submit"] == "delete") {
            ordertoship_marchant::where('marchant_id', '=', $request["updateHiddenSize"])->delete();
        }

        // echo $request["updateHiddenMarkerPcs"] . " " . $request["updateMarkerPcs"];

        return redirect('/order-to-ship/marchant');
    }
}
