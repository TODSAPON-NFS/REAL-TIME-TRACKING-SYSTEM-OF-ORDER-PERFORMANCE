<?php

namespace App\Http\Controllers;

use App\ordertoship;
use Illuminate\Http\Request;

class OrderToShipCadController extends Controller
{
    public function show(Request $request)
    {
        $dept = $request->session()->get('dept');

        if ($dept != "CAD")
            return redirect('/');

        $id = $request->session()->get('id');
        $dbvar = ordertoship::find($id);
        //echo $dbvar;

        $items = [
            "id" => $id,
            "buyer" => $request->session()->get('buyer'),
            "orderNo" => $request->session()->get('orderNo'),
            "color" => $request->session()->get('color'),
            "item" => $request->session()->get('item'),
            "CutPlan" => $dbvar->CutPlan,
            "FabricAllocation" => $dbvar->FabricAllocation
        ];

        return view('Order to ship.cad')->with('items', $items);
    }

    public function updateCut(Request $request)
    {
        $id = $request->session()->get('id');
        $dbvar = ordertoship::find($id);

        if ($request["CutPlan"] != "") {
            $dbvar->CutPlan = $request["CutPlan"];
            $dbvar->save();
        }

        return redirect('/order-to-ship/cad');
    }

    public function updateFabric(Request $request)
    {
        $id = $request->session()->get('id');
        $dbvar = ordertoship::find($id);

        if ($request["FabricAllocation"] != "") {
            $dbvar->FabricAllocation = $request["FabricAllocation"];
            $dbvar->save();
        }

        return redirect('/order-to-ship/cad');
    }
}
