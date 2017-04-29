<?php

namespace App\Http\Controllers;

use App\ordertoship_marchant;
use Illuminate\Http\Request;

class OrderToShipCuttingController extends Controller
{
     public function show(Request $request)
    {
       $id = $request->session()->get('id');
        $db = ordertoship_marchant::where('id', '=', $id)->get();

        $items = [
            "id" => $id,
            "buyer" => $request->session()->get('buyer'),
            "orderNo" => $request->session()->get('orderNo'),
            "color" => $request->session()->get('color'),
            "item" => $request->session()->get('item'),
        ];

        return view('Order to ship.cut')->with('items', $items)->with('db', $db);
    }

    public function updateSizes(Request $request)
    {
        $id = $request->session()->get('id');
        if ($request["updateHiddenSize"] != "" && $request["sizeUpdate"] != "" && $request["submit"] == "add") {
            $temp = ordertoship_marchant::where('marchant_id', '=', $request["updateHiddenSize"])->first();
            ordertoship_marchant::where('marchant_id', '=', $request["updateHiddenSize"])->update(['CutQuantity' => $request["sizeUpdate"]+$temp->CutQuantity]);
        } else if ($request["updateHiddenSize"] != "" && $request["submit"] == "sub") {
             $temp = ordertoship_marchant::where('marchant_id', '=', $request["updateHiddenSize"])->first();
            ordertoship_marchant::where('marchant_id', '=', $request["updateHiddenSize"])->update(['CutQuantity' => $temp->CutQuantity-$request["sizeUpdate"]]);
        }
        return redirect()->action('OrderToShipCuttingController@show');
    }
}