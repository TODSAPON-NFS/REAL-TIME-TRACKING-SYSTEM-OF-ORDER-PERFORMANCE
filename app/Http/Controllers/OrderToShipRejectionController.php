<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ordertoship_marchant;

class OrderToShipRejectionController extends Controller
{
    //
    public function show(Request $request){
    	 $id = $request->session()->get('id');
         $dbvar = ordertoship_marchant::where('id', '=', $id)->get();

        $items = [
            "id" => $id,
            "buyer" => $request->session()->get('buyer'),
            "orderNo" => $request->session()->get('orderNo'),
            "color" => $request->session()->get('color'),
            "item" => $request->session()->get('item')
        ];
    	return view('Order to ship.rejection')->with('data',$dbvar)->with('items',$items);
    }
    public function update(Request $request){
    	$this->validate($request, [
	        'rejectionValue' => 'required|numeric',
	        'size' => 'required|numeric'
    	]);
    	$size=$request["size"];
    	$id = $request->session()->get('id');
    	$value=$request["rejectionValue"];
    	if($request["actype"]=="add"){
    		$db = ordertoship_marchant::where('id', '=', $id)->where('size', '=' ,$size)->first();
    		ordertoship_marchant::where('marchant_id','=',$db->marchant_id)->update(['Rejection' => $db->Rejection+$value]);
    		return redirect('/order-to-ship/rejection');
    	}else if($request["actype"]="sub"){
    		$db = ordertoship_marchant::where('id', '=', $id)->where('size', '=' ,$size)->first();
            ordertoship_marchant::where('marchant_id','=',$db->marchant_id)->update(['Rejection' => $db->Rejection-$value]);
    		return redirect('/order-to-ship/rejection');
    	}
    	return "OPPS!!!  Something wrong ,Please Try Again";
    }
}
