<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderToShipPackingController extends Controller
{
    public function show(Request $request)
    {
        $id = $request->session()->get('id');
        /*$db = ordertoship_marchant::where('id', '=', $id)->get();

        $items = [
            "id" => $id,
            "buyer" => $request->session()->get('buyer'),
            "orderNo" => $request->session()->get('orderNo'),
            "color" => $request->session()->get('color'),
            "item" => $request->session()->get('item'),
        ];*/

        return view('Order to ship.packing');//->with('items', $items)->with('db', $db);
    }
}
