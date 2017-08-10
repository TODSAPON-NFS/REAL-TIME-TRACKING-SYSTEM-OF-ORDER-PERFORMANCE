<?php

namespace App\Http\Controllers;

use App\recheck_cad;
use Illuminate\Http\Request;

class RecheckCadController extends Controller
{
    public function show(Request $request)
    {
        $dept = $request->session()->get('dept');

        if ($dept != "CAD")
            return redirect('/');

        $id = $request->session()->get('id');
        $dbvar = recheck_cad::where('id', '=', $id)->get();

        //initial value. no need to showinoutput
        /*if($dbvar[0]["MarkerPcs"] == 0)
            $dbvar = "";*/


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

        if ($request["hiddenMarkerLength"] != "" && $request["hiddenMarkerID"] != "" && $request["hiddenMarkerPcs"] != "" && $request["updateMarkerLength"] != "") {
            recheck_cad::where('id', '=', $id)->where('MarkerID', '=', $request["hiddenMarkerID"])->update(['markerLengthInMeter' => $request["updateMarkerLength"]]);

        }
        //echo $request["markerLengthInMeter"] . " " . $request["MarkerPcs"] . " " . $request["updateMarkerLength"];
        return redirect()->action('RecheckCadController@show');
    }

    public function updatePiles(Request $request)
    {
        $id = $request->session()->get('id');

        if ($request["pilesHiddenMarkerPcs"] != "" && $request["hiddenMarkerID"] != "" && $request["hiddenMarkerpiles"] != "" && $request["updatePiles"] != "") {
            recheck_cad::where('id', '=', $id)->where('MarkerID', '=', $request["hiddenMarkerID"])->update(['Piles' => $request["updatePiles"]]);

        }

        // echo $request["pilesHiddenMarkerPcs"] . " " . $request["hiddenMarkerpiles"] . " " . $request["updatePiles"];

        return redirect()->action('RecheckCadController@show');
    }

    public function updatemarkerPcs(Request $request)
    {
        $id = $request->session()->get('id');

        if ($request["updateHiddenMarkerPcs"] != "" && $request["hiddenMarkerID"] != "" && $request["updateMarkerPcs"] != "" && $request["submit"] == "update") {
            recheck_cad::where('id', '=', $id)->where('MarkerID', '=', $request["hiddenMarkerID"])->update(['MarkerPcs' => $request["updateMarkerPcs"]]);

        } else if ($request["hiddenMarkerID"] != "" && $request["submit"] == "delete") {
            recheck_cad::where('id', '=', $id)->where('MarkerID', '=', $request["hiddenMarkerID"])->delete();
        }

        // echo $request["updateHiddenMarkerPcs"] . " " . $request["updateMarkerPcs"];

        return redirect()->action('RecheckCadController@show');
    }


    public function uploadFile(Request $request)
    {

        $sel1 = $request['sel1'];
        $file = $request->file('userFile');
        $destinationPath = 'files';
        $id = $request->session()->get('id');

       // return $file;

        if ($sel1 != "" && $request->hasFile('userFile') && $request->file('userFile')->isValid()) {
            # code...
            $fileType = $file->getClientOriginalExtension();
            //if ($fileType == 'xlsx') {
                $fileName = $id . $sel1 . '.' . $file->getClientOriginalExtension();
                $uploadSuccess = $file->move($destinationPath, $fileName);
                if ($uploadSuccess) {
                    //Make DB query Here.. file name $filename
                    recheck_cad::where('id', '=', $id)->where('MarkerPcs', '=', $sel1)->update(['file' => $fileName]);
                    return redirect()->action('RecheckCadController@show');
                } else {
                    return "OPPS!!!Something Is Going TO wrong Please Try letter";
                }

           // } else {
           //     return "OPPS!!! Invalid File Type.";
           // }

        } else {
            return "Fill All Info Correctly.";
        }
    }
}
