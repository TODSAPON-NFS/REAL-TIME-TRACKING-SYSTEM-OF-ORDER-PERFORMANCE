<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoverController extends Controller
{
    public function viewCover()
    {
        //return view('cover')->with(array('inputs'=>$request));
    }

    public function redirect(Request $request)
    {
        $dept = $request->session()->get('dept');

        if ($request["orderToCut"]) {
            if ($dept == 'Merchandising')
                return redirect()->action('orderToCutMarchantController@view');
            else if ($dept == 'CAD')
                return redirect()->action('orderToCutCadController@showCad') ;
            else if ($dept == 'MU')
                return redirect()->action('orderToCutMuController@showMu') ;
        }

        //echo $request["orderToCut"];

        //return view('order to cut.merchant');
    }
}
