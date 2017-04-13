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

        if ($request["updateHiddenMarkerPcs"] != "" && $request["updateMarkerPcs"] != "" && $request["submit"] == "update") {
            recheck_cad::where('id', '=', $id)->where('MarkerPcs', '=', $request["updateHiddenMarkerPcs"])->update(['MarkerPcs' => $request["updateMarkerPcs"]]);

        } else if ($request["updateHiddenMarkerPcs"] != "" && $request["submit"] == "delete") {
            recheck_cad::where('id', '=', $id)->where('MarkerPcs', '=', $request["updateHiddenMarkerPcs"]) -> delete();
        }

        // echo $request["updateHiddenMarkerPcs"] . " " . $request["updateMarkerPcs"];

        return redirect()->action('RecheckCadController@show');
    }


    public function uploadFile(Request $request)
    {

        $sel1 = $request['sel1'];
        $file = $request->file('userFile');
        $destinationPath = 'files';

        if ($sel1 != "" && $request->hasFile('userFile') && $request->file('userFile')->isValid()) {
            # code...
            $fileName = $sel1 . '.' . $file->getClientOriginalExtension();
            $uploadSuccess = $file->move($destinationPath, $fileName);
            if ($uploadSuccess) {
                //Make DB query Here.. file name $filename
                return "Uploaded" . $uploadSuccess;
            }

        }
        return "Fail";
        //return redirect()->action('RecheckCadController@show');
    }

}
