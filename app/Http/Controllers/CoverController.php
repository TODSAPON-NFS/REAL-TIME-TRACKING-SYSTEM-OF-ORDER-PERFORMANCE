<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoverController extends Controller
{
    public function viewCover(Request $request)
    {
        // return view('cover')->with(array('inputs'=>$request));
    }

    public function redirect(Request $request)
    {
        $dept = $request->session()->get('dept');

        if ($request["orderToCut"] == "orderToCut") {
            if ($dept == 'Merchandising')
                return redirect()->action('orderToCutMarchantController@view');
            else if ($dept == 'CAD')
                return redirect()->action('orderToCutCadController@showCad');
            else if ($dept == 'MU')
                return redirect()->action('orderToCutMuController@showMu');
            else if ($dept == 'Store')
                return redirect()->action('orderToCutStoreController@view');
        } else if ($request["recheck"] == "recheck") {

            if ($dept == 'CAD')
                return redirect()->action('RecheckCadController@show');
            else if ($dept == 'Fabric')
                return redirect()->action('RecheckFabricController@show');

        } else if ($request["OrderToShip"] == "OrderToShip") {

            if ($dept == 'CAD')
                return redirect('/order-to-ship/cad');
            else if ($dept == 'Merchandising')
                return redirect('/order-to-ship/marchant');
            else if ($dept == 'Packing')
                return redirect('/order-to-ship/packing');
            else if ($dept == 'Cutting')
                return redirect('/order-to-ship/cut');
            else if ($dept == 'Finishing')
                return redirect('/order-to-ship/finishing');
            else if ($dept == 'Sewing')
                return redirect('/order-to-ship/sew');
            else if ($dept == 'Rejection')
                return redirect('/order-to-ship/rejection');

        }

        //echo $request["orderToCut"];

        //return redirect('cover');
    }
}
