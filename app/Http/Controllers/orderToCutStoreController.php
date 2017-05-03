<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ordertocut_store;

class orderToCutStoreController extends Controller
{
    public function view(Request $request)
    {
        $dept = $request->session()->get('dept');

        if ($dept != "Store")
            return redirect('/');

        $id = $request->session()->get('id');
        $dbvar = ordertocut_store::find($id);

        $items = [
            "id" => $id,
            "AvailableFabricYards" => $dbvar->AvailableFabricYards,
            "AvailableFabricRolls" => $dbvar->AvailableFabricRolls,
            "output" => $dbvar->Output,
            "buyer" => $request->session()->get('buyer'),
            "orderNo" => $request->session()->get('orderNo'),
            "color" => $request->session()->get('color'),
            "item" => $request->session()->get('item')
        ];

        return view('order to cut.store')->with('items', $items);
    }

    public function updateData(Request $request)
    {
        $id = $request->session()->get('id');

        $dbvar = ordertocut_store::find($id);

        if ($request["AvailableFabricYards"] && $request["AvailableFabricRolls"] && $request["option"]) {
            $dbvar->AvailableFabricYards = $request["AvailableFabricYards"];
            $dbvar->AvailableFabricRolls = $request["AvailableFabricRolls"];

            if ($request["option"] == "Non Wash") {

                $dbvar->Output = (0.37 * $dbvar->AvailableFabricRolls * 100) / $dbvar->AvailableFabricYards;

            } else if ($request["option"] == "Wash") {
                $dbvar->Output = (1.089 * $dbvar->AvailableFabricRolls * 100) / $dbvar->AvailableFabricYards;
            }

            $dbvar->save();
        }

        return redirect()->action('orderToCutStoreController@view');
    }
}
