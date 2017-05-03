<?php

namespace App\Http\Controllers;

use App\ordertocut;
use App\ordertoship;
use App\ordertoship_country_name;
use App\ordertoship_country_value;
use App\ordertoship_marchant;
use App\recheck;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function show()
    {
        $allData = ordertoship::all();

        return view('delete')->with('allData', $allData);
    }

    public function delete(Request $request)
    {
        $id = $request["hiddenID"];

        if ($id != "") {
            //clearing all data related to that id
            ordertoship::where('id', '=', $id)->delete();
            ordertocut::where('id', '=', $id)->delete();
            recheck::where('id', '=', $id)->delete();
        }

        return redirect('delete');

    }

}
