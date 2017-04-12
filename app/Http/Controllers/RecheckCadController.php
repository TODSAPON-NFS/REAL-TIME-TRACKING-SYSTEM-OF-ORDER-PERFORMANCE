<?php

namespace App\Http\Controllers;

use App\recheck_cad;
use Illuminate\Http\Request;

class RecheckCadController extends Controller
{
    public function show(Request $request)
    {
        $id = $request->session()->get('id');
        $dbvar = recheck_cad::where('id', '=', $id)->get();

        $items = [
            "id" => $id,
            "buyer" => $request->session()->get('buyer'),
            "orderNo" => $request->session()->get('orderNo'),
            "color" => $request->session()->get('color'),
            "item" => $request->session()->get('item')
        ];


        return view('Recheck with extra booking.cad')->with('db', $dbvar)->with('items', $items);
    }

    public function addMarker(Request $request)
    {
        $id = $request->session()->get('id');

        if ($request["addMarkerPcs"]) {
            $dbstore = new recheck_cad;
            $dbstore->id = $id;
            $dbstore->MarkerPcs = $request["addMarkerPcs"];
            $dbstore->save();
        }

        return redirect()->action('RecheckCadController@show');
    }

    public function updateMarkerLength(Request $request)
    {
        $id = $request->session()->get('id');
          
        if ($request["hiddenMarkerPcs"] && $request['hiddenMarkerLength'] && $request['updateMarkerLength']) {
    
            $db = recheck_cad::where('id', '=', $id)->where('MarkerPcs', '=', $request["hiddenMarkerPcs"])->first();
            if($request["submit"] == $db->MarkerPcs)
            {
                $db->markerLengthInMeter = $request['updateMarkerLength'];
                $db->save();
            }
           
            
           
            // $db = recheck_cad::all();
            // foreach($db as $s)
            // {
            //     echo $s->MarkerPcs." ".$s->markerLengthInMeter."<br>";
            // }
            // return "yes";
            // echo $request["hiddenMarkerPcs"] . " ";
            // echo $request["hiddenMarkerLength"]. " ";
            // echo $request["updateMarkerLength"];
            

        }

        // echo $request["hiddenMarkerPcs"] . " ";
        // echo $request["hiddenMarkerLength"] . " ";
        // echo $request["updateMarkerLength"] . " ";

        return redirect()->action('RecheckCadController@show');
    }
}
