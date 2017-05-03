<?php

namespace App\Http\Controllers;

use App\ordertoship_marchant;
use Illuminate\Http\Request;

class OrderToShipFinishingController extends Controller
{
    public function view(Request $request)
    {
        $dept = $request->session()->get('dept');

        if ($dept != "Finishing")
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

        return view('Order to ship.finishing')->with('items', $items)->with('db', $db);
    }

    public function update(Request $request)
    {
        if ($request["updateHiddenSize"] != "" && $request["sizeUpdate"] != "" && $request["submit"] == "add") {

            $temp = ordertoship_marchant::where('marchant_id', '=', $request["updateHiddenSize"])->first();
            $updatedValue = $request["sizeUpdate"] + $temp->FinishingReceive;
            ordertoship_marchant::where('marchant_id', '=', $request["updateHiddenSize"])
                ->update(['FinishingReceive' => $updatedValue]);

        } else if ($request["updateHiddenSize"] != "" && $request["submit"] == "sub") {

            $temp = ordertoship_marchant::where('marchant_id', '=', $request["updateHiddenSize"])->first();
            ordertoship_marchant::where('marchant_id', '=', $request["updateHiddenSize"])
                ->update(['FinishingReceive' => $temp->FinishingReceive - $request["sizeUpdate"]]);
        }
        return redirect('/order-to-ship/finishing');
    }
}
