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

        if ($request["hiddenMarkerLength"] != "" && $request["hiddenMarkerPcs"] != "" && $request["updateMarkerLength"] != "") {
            recheck_cad::where('id', '=', $id)->where('MarkerPcs', '=', $request["hiddenMarkerPcs"])->update(['markerLengthInMeter' => $request["updateMarkerLength"]]);

        }
        //echo $request["markerLengthInMeter"] . " " . $request["MarkerPcs"] . " " . $request["updateMarkerLength"];
        return redirect()->action('RecheckCadController@show');
    }

    public function updatePiles(Request $request)
    {
        $id = $request->session()->get('id');

        if ($request["pilesHiddenMarkerPcs"] != "" && $request["hiddenMarkerpiles"] != "" && $request["updatePiles"] != "") {
            recheck_cad::where('id', '=', $id)->where('MarkerPcs', '=', $request["pilesHiddenMarkerPcs"])->update(['Piles' => $request["updatePiles"]]);

        }

       // echo $request["pilesHiddenMarkerPcs"] . " " . $request["hiddenMarkerpiles"] . " " . $request["updatePiles"];

        return redirect()->action('RecheckCadController@show');
    }

    public function updatemarkerPcs(Request $request)
    {
        $id = $request->session()->get('id');

        if ($request["updateHiddenMarkerPcs"] != "" && $request["updateMarkerPcs"] != "" ) {
            recheck_cad::where('id', '=', $id)->where('MarkerPcs', '=', $request["updateHiddenMarkerPcs"])->update(['MarkerPcs' => $request["updateMarkerPcs"]]);

        }

        // echo $request["updateHiddenMarkerPcs"] . " " . $request["updateMarkerPcs"];

        return redirect()->action('RecheckCadController@show');
    }

    public function uploadFile(Request $request){

        $sel1=$request['sel1'];
        $file = $request->file('userFile');
        $destinationPath = 'files';
        return 'File Name: '.$file->getClientOriginalExtension();
        
        // if ($sel1!="") {
        //     # code...

        //     return $sel1;
        // }
        // return "OK BOSS";
        // return redirect()->action('RecheckCadController@show');
    }

}
