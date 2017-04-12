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

        /*foreach ($dbvar as $iid)
            echo $iid["MarkerPcs"];*/

        return view('Recheck with extra booking.cad') ->with('db', $dbvar) ->with('items', $items);
    }
}
