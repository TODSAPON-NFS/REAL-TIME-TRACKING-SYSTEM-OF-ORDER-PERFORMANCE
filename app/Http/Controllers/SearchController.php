<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ordertocut;
use  App\ordertocut_marchant;
use  App\ordertocut_cad;
use  App\ordertocut_store;
use  App\ordertocut_mu;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        return view('search');
    }

    public function viewSearchResult(Request $request)
    {
        return view('searchResult');
    }

    public function search(Request $request)
    {
        $db = ordertocut::where('Buyer', '=', $request["buyer"])->where('OrderNo', '=', $request["order"])
            ->where('Color', '=', $request["color"])->where('Item', '=', $request["item"])->get();

        if (empty($db[0])) {
            return redirect()->action('SearchController@show');
        }

        // echo $db[0] -> id;

        $request->session()->put('id', $db[0]->id);
        $request->session()->put('buyer', $db[0]->Buyer);
        $request->session()->put('orderNo', $db[0]->OrderNo);
        $request->session()->put('color', $db[0]->Color);
        $request->session()->put('item', $db[0]->Item);

        return redirect()->action('SearchController@viewSearchResult');
    }

    public function searchRedirect(Request $request)
    {
        //show order to cut
        if ($request["orderToCut"]) {
            $id = $request->session()->get('id');
            $dbvar = ordertocut_marchant::find($id);
            $dbvar1 = ordertocut_cad::find($id);
            $dbvar2 = ordertocut_store::find($id);
            $dbvar3 = ordertocut::find($id);
            $dbvar4 = ordertocut_mu::find($id);
            $items = [
                "id" => $id,
                "OrderQuantity" => $dbvar->OrderQuantity,
                "fabricNeed" => $dbvar->FabricNeed,
                "mockUpInput" => $dbvar->MockUpInput,
                "mockUpOutput" => $dbvar->MockUpOutput,
                "buyer" => $request->session()->get('buyer'),
                "orderNo" => $request->session()->get('orderNo'),
                "color" => $request->session()->get('color'),
                "item" => $request->session()->get('item'),

                //cads
                "CuttingWastage" => $dbvar1->CuttingWastage,
                "ExtraLoading" => $dbvar1->ExtraLoading,
                "RelaxingShrinkage" => $dbvar1->RelaxingShrinkage,
                "WashingWastage" => $dbvar1->WashingWastage,
                "output" => $dbvar1->Output,

                //store
                "AvailableFabricYards" => $dbvar2->AvailableFabricYards,
                "AvailableFabricRolls" => $dbvar2->AvailableFabricRolls,
                "storeOutput" => $dbvar2->Output,

                //extra fabric + excess monitoring
                "extraFabric" => $dbvar3->ExtraFabric,
                "shortMonitoring" => $dbvar3->ExcessMonitoring,

                //mu
                "IncreasedConsumption" => $dbvar4->IncreasedConsumption,
                "FabricFault" => $dbvar4->FabricFault,
                "RollShortage" => $dbvar4->RollShortage,
                "ProductionDamage" => $dbvar4->ProductionDamage,
                "UnstableCut" => $dbvar4->UnstableCut,
                "CuttingMistake" => $dbvar4->CuttingMistake,
                "muOutput" => $dbvar4->Output
            ];

            // echo $items[0]["OrderQuantity"] ;
            // echo $dbvar -> OrderQuantity;
            // echo $items["id"];
            //echo $id;

            return view('order to cut.general')->with('items', $items);
            //return view('order to cut.general');
        }
        //else if ($request["recheck"])

    }
}
