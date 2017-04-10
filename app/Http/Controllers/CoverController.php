<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoverController extends Controller
{
    public function redirect(Request $request)
    {
        $dept = $request->session()->get('dept');

        if ($request["orderToCut"]) {
            if ($dept == 'Merchandising')
                return view('order to cut.merchant');
            else if ($dept == 'CAD')
                return view('order to cut.cad');
            else if ($dept == 'MU')
                return view('order to cut.mu');
        }

        //echo $request["orderToCut"];

        //return view('order to cut.merchant');
    }
}
