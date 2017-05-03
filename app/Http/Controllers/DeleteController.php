<?php

namespace App\Http\Controllers;

use App\ordertoship;
use App\ordertoship_country_name;
use App\ordertoship_country_value;
use App\ordertoship_marchant;
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
            //clearing order to ship values
            ordertoship::where('id', '=', $id)->delete();

            //clearing order to cut values
        }

        return redirect('delete');

    }

}
