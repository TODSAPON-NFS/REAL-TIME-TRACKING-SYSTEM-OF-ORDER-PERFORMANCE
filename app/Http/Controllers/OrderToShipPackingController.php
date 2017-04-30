<?php

namespace App\Http\Controllers;

use App\ordertoship_country_name;
use App\ordertoship_country_value;
use App\ordertoship_marchant;
use Illuminate\Http\Request;

class OrderToShipPackingController extends Controller
{
    public function show(Request $request)
    {
        $id = $request->session()->get('id');
        $db = ordertoship_marchant::where('id', '=', $id)->get();
        $country = ordertoship_country_name::where('id', '=', $id)->get();
        $countryValue = ordertoship_country_value::where('id', '=', $id)->get();

        /* foreach ($country as $c)
             echo $c;*/

        $items = [
            "id" => $id,
            "buyer" => $request->session()->get('buyer'),
            "orderNo" => $request->session()->get('orderNo'),
            "color" => $request->session()->get('color'),
            "item" => $request->session()->get('item'),
        ];

        return view('Order to ship.packing')->with('items', $items)->with('db', $db)->with('country', $country);
    }

    public function updateOrderQuantity(Request $request)
    {
        $id = $request->session()->get('id');

        if ($request["hiddenMerchantID"] != "" && $request["updatePackingReceive"] != "") {
            ordertoship_marchant::where('marchant_id', '=', $request["hiddenMerchantID"])->update(['PackingReceive' => $request["updatePackingReceive"]]);

        }


        return redirect('/order-to-ship/packing');
    }

    public function addCountry(Request $request)
    {
        $id = $request->session()->get('id');

        if ($request["AddCountry"] != "") {
            $country = new ordertoship_country_name;
            $country->id = $id;
            $country->CountryName = $request["AddCountry"];
            $country->save();

            //saving country default values
            $merchants = ordertoship_marchant:: where('id', '=', $id)->get();

            foreach ($merchants as $merchant)
            {
                $countryValue = new ordertoship_country_value;
                $countryValue->id = $id;
                $countryValue->	country_name_id = $country->id;
                $countryValue->save();
            }
        }
        return redirect('/order-to-ship/packing');
    }

    public function addShipmentDate(Request $request)
    {
        if ($request["shipmentDate"] != "") {
            ordertoship_country_name:: where('country_name_id', '=', $request["HiddenCountryNameID"])->update(['ShipmentDate' => $request["shipmentDate"]]);
        }
        return redirect('/order-to-ship/packing');
    }
}
