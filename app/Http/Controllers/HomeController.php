<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function home()
    {
        return view('home');
    }

    public function check(Request $request)
    {
        $dept = $request["department"];
        $request->session()->put('dept', $dept);
        //echo $dept;

       return view('root_inputs')->with('invalid','');
    }
}
