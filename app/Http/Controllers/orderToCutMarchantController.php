<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orderToCutMarchantController extends Controller
{
    public function view()
    {

        return view('order to cut.merchant') ->with('error','');
    }

    public function insertOrderQuantity(Request $request)
    {
        $amount = $request -> input('orderQuantity');

        DB::insert('insert into ordertocut_marchants (OrderQuantity) values(?)',[$amount]);

        return redirect()->action('orderToCutMarchantController@view') ->with('error', 'error');
    }

    public function insertFabricNeed(Request $request)
    {
        $amount = $request -> input('fabricNeed');

        DB::insert('insert into ordertocut_marchants (FabricNeed) values(?)',[$amount]);

        return redirect()->action('orderToCutMarchantController@view') ->with('error', 'error');
    }

    public function insertMockUpInput(Request $request)
    {
        $amount = $request -> input('mockUpInput');
        $id = 1;

        DB::table('ordertocut_marchants')
            ->where('id', 1)
            ->update(array('MockUpInput' => 1));

        return redirect()->action('orderToCutMarchantController@view') ->with('error', 'error');
    }
}
