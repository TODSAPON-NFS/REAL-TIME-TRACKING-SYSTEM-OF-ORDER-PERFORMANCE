<?php

namespace App\Http\Controllers;

use App\recheck_cad;
use Illuminate\Http\Request;

class RecheckCadController extends Controller
{
    public function show(Request $request)
    {
        $id = $request->session()->get('id');
        $dbvar = recheck_cad::where('id', '=', $id) -> get();

        $items = [
            "id" => $id,
            "buyer" => $request->session()->get('buyer'),
            "orderNo" => $request->session()->get('orderNo'),
            "color" => $request->session()->get('color'),
            "item" => $request->session()->get('item')
        ];


        return view('Recheck with extra booking.cad') ->with('db', $dbvar) ->with('items', $items);
    }

    public function addMarker(Request $request)
    {
        $id = $request->session()->get('id');

        //$markerPcs = $request["addMarkerPcs"];

        if($request["addMarkerPcs"])
        {
            $dbstore = new recheck_cad;
            $dbstore -> id = $id;
            $dbstore -> MarkerPcs = $request["addMarkerPcs"];
            $dbstore ->save();
        }

        return redirect()->action('RecheckCadController@show');
    }
}
