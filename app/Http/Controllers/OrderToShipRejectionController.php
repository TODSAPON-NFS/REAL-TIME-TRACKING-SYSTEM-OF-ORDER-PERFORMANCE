<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ordertoship_marchant;

class OrderToShipRejectionController extends Controller
{
    //
    public function show(Request $request)
    {

        $dept = $request->session()->get('dept');

        if ($dept != "Rejection")
            return redirect('/');

        $id = $request->session()->get('id');
        $dbvar = ordertoship_marchant::where('id', '=', $id)->get();

        $items = [
            "id" => $id,
            "buyer" => $request->session()->get('buyer'),
            "orderNo" => $request->session()->get('orderNo'),
            "color" => $request->session()->get('color'),
            "item" => $request->session()->get('item')
        ];
        return view('Order to ship.rejection')->with('data', $dbvar)->with('items', $items);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'rejectionValue' => 'required|numeric',
            'id' => 'required|numeric'
        ]);
        $id = $request["id"];
        $value = $request["rejectionValue"];
        $db = ordertoship_marchant::find($id);
        if ($request["actype"] == "add") {
            $db->Rejection += $value;
            $db->save();
            return redirect('/order-to-ship/rejection');
        } else if ($request["actype"] = "sub") {
            $db->Rejection -= $value;
            $db->save();
            return redirect('/order-to-ship/rejection');
        }
        return "OPPS!!!  Something wrong ,Please Try Again";
    }
}
