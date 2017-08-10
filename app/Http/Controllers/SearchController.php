<?php

namespace App\Http\Controllers;

use App\ordertoship;
use App\ordertoship_country_name;
use App\ordertoship_country_value;
use App\ordertoship_marchant;
use Illuminate\Http\Request;
use App\ordertocut;
use  App\ordertocut_marchant;
use  App\ordertocut_cad;
use  App\ordertocut_store;
use  App\ordertocut_mu;
use  App\recheck_cad;
use App\recheck_fabric;

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
                "output" => $dbvar1->CuttingWastage + $dbvar1->ExtraLoading + $dbvar1->RelaxingShrinkage + $dbvar1->WashingWastage,

                //store
                "AvailableFabricYards" => $dbvar2->AvailableFabricYards,
                "AvailableFabricRolls" => $dbvar2->AvailableFabricRolls,
                "storeOutput" => $dbvar2->Output,

                //extra fabric + excess monitoring
                "extraFabric" => $dbvar1->Output - $dbvar->MockUpOutput - $dbvar2->Output,
                "shortMonitoring" => ($dbvar1->Output - $dbvar->MockUpOutput - $dbvar2->Output) - $dbvar4->Output,

                //mu
                "IncreasedConsumption" => $dbvar4->IncreasedConsumption,
                "FabricFault" => $dbvar4->FabricFault,
                "RollShortage" => $dbvar4->RollShortage,
                "ProductionDamage" => $dbvar4->ProductionDamage,
                "UnstableCut" => $dbvar4->UnusableCutPcs,
                "CuttingMistake" => $dbvar4->CuttingMistake,
                "muOutput" => $dbvar4->Output
            ];

            return view('order to cut.general')->with('items', $items);
        } else if ($request["recheck"]) {
            $id = $request->session()->get('id');
            $dbvar = recheck_cad::where('id', '=', $id)->get();
            $dbvar1 = recheck_fabric::find($id);

            $sumMP = 0;

            foreach ($dbvar as $var) {
                $sumMP += $var["MarkerPcs"];
            }

            //getting session data
            $buyer = $request->session()->get('buyer');
            $orderNo = $request->session()->get('orderNo');
            $color = $request->session()->get('color');
            $item = $request->session()->get('item');

            //getting the value of f from order to cut merchant
            $orderToCutM1 = ordertocut::where('Buyer', '=', $buyer)->where('OrderNo', '=', $orderNo)
                ->where('Color', '=', $color)->where('Item', '=', $item)->first();
            $f = ordertocut_marchant::find($orderToCutM1["id"]);

            $items = [
                "id" => $id,
                "buyer" => $buyer,
                "orderNo" => $orderNo,
                "color" => $color,
                "item" => $item,
                "Shrinkage" => $dbvar1->Shrinkage,
                "Bowling" => $dbvar1->Bowling,
                "FabricFault" => $dbvar1->FabricFault,
                "sumMp" => $sumMP,
                "F" => $f["FabricNeed"]

            ];
            return view('Recheck with extra booking.general')->with('items', $items)->with('db', $dbvar);
        } else if ($request["orderToShip"]) {
            $id = $request->session()->get('id');

            $mainDB = ordertoship::find($id);
            $orderTOShipMerchantDB = ordertoship_marchant::where('id', '=', $id)->get();
            $countryNames = ordertoship_country_name::where('id', '=', $id)->get();

            $B = $mainDB["CutPlan"];
            $D = $mainDB["FabricAllocation"];

            $outputs = array();
            $SumOfOutputs = array(
                "A" => 0,
                "C" => 0,
                "E" => 0,
                "F" => 0,
                "G" => 0,
                "H" => 0,
                "CutTransactionBalance" => 0,
                "I" => 0,
                "SEWTransactionBalance" => 0,
                "J" => 0,
                "FinishingTransactionBalance" => 0,
                "K" => 0,
                "Rejection" => 0,
            );

            // echo count($orderTOShipMerchantDB) ." ";

            foreach ($orderTOShipMerchantDB as $output) {
                $A = $output["OrderQuantity"];
                $R = $output["Rejection"];
                $H = $output["CutQuantity"];
                $I = $output["SewingReceive"];
                $J = $output["FinishingReceive"];
                $K = $output["PackingReceive"];

                $C = 0;

                if ($A != 0 && $B != 0)
                    $C = $A + (($B * $A) / 100);

                $E = $C * $D;
                $F = $R * $D;
                $G = $C - $R;
                $CutTransactionBalance = $H - $I;
                $SEWTransactionBalance = $I - $J;
                $FinishingTransactionBalance = $J - $K;
                $PackingTransactionBalance = $K;

                $outputs[] =
                    [
                        'Size' => $output["Size"],
                        'OrderQuantity' => $output["OrderQuantity"],
                        'CutPlan' => $C,
                        'FabricAllocation' => $E,
                        'ExtraFabricNeed' => $F,
                        'AvailableGMT' => $G,
                        'CutQuantity' => $H,
                        'CutTransactionBalance' => $CutTransactionBalance,
                        'SewingReceive' => $I,
                        'SEWTransactionBalance' => $SEWTransactionBalance,
                        'FinishingReceive' => $J,
                        'FinishingTransactionBalance' => $FinishingTransactionBalance,
                        'PackingReceive' => $K,
                        'PackingTransactionBalance' => $PackingTransactionBalance,
                        'Rejection' => $R
                    ];

                $SumOfOutputs["A"] += $A;
                $SumOfOutputs["C"] += $C;
                $SumOfOutputs["E"] += $E;
                $SumOfOutputs["F"] += $F;
                $SumOfOutputs["G"] += $G;
                $SumOfOutputs["H"] += $H;
                $SumOfOutputs["CutTransactionBalance"] += $CutTransactionBalance;
                $SumOfOutputs["I"] += $I;
                $SumOfOutputs["SEWTransactionBalance"] += $SEWTransactionBalance;
                $SumOfOutputs["J"] += $J;
                $SumOfOutputs["FinishingTransactionBalance"] += $FinishingTransactionBalance;
                $SumOfOutputs["K"] += $K;
                $SumOfOutputs["Rejection"] += $R;

            }

            $SumOfOutputs["shortOrder"] = $SumOfOutputs["A"] - $SumOfOutputs["K"];
            $SumOfOutputs["shortCut"] = $SumOfOutputs["H"] - $SumOfOutputs["K"];
            $SumOfOutputs["orderToShipRatio"] = 0;
            $SumOfOutputs["cutToShipRatio"] = 0;

            if ($SumOfOutputs["A"] != 0)
                $SumOfOutputs["orderToShipRatio"] = ($SumOfOutputs["K"] * 100) / $SumOfOutputs["A"] - 100 ;

            if ($SumOfOutputs["H"] != 0)
                $SumOfOutputs["cutToShipRatio"] = ($SumOfOutputs["K"] * 100) / $SumOfOutputs["H"] - 100;


            $CountryOutputs = array();

            //showing output of per countries data
            for ($i = 0; $i < count($orderTOShipMerchantDB); $i++) {
                $CountryOutputs[][] = $orderTOShipMerchantDB[$i]["Size"];
                $CountryOutputs[$i][] = 0;

                $tempSum = 0;

                //searching value for country
                foreach ($countryNames as $countryName) {
                    $tempValue = ordertoship_country_value::where('country_name_id', '=', $countryName["country_name_id"])
                        ->where('marchant_id', '=', $orderTOShipMerchantDB[$i]["marchant_id"])->first();
                    if ($tempValue != "") {
                        $CountryOutputs[$i][] = $tempValue["Value"];
                        $tempSum += $tempValue["Value"];

                    }

                }

                //updating availability
                $CountryOutputs[$i][1] = $orderTOShipMerchantDB[$i]["PackingReceive"] - $tempSum;
            }


            $items = [
                "id" => $id,
                "buyer" => $request->session()->get('buyer'),
                "orderNo" => $request->session()->get('orderNo'),
                "color" => $request->session()->get('color'),
                "item" => $request->session()->get('item'),
            ];

            return view('Order to ship.general')->with('items', $items)->with('mainDB', $mainDB)
                ->with('Outputs', $outputs)
                ->with('SUMS', $SumOfOutputs)
                ->with('CountryNames', $countryNames)
                ->with('CountryOutputs', $CountryOutputs);
        }


    }
}
