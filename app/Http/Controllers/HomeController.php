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
        $password = $request["password"];

        $flag = 0;

        if ($dept == "Merchandising" && $password == "mer") {
            $flag = 1;
        } else if ($dept == "CAD" && $password == "cd") {
            $flag = 1;
        } else if ($dept == "Store" && $password == "str") {
            $flag = 1;
        } else if ($dept == "MU" && $password == "mu") {
            $flag = 1;
        } else if ($dept == "Fabric" && $password == "fbrc") {
            $flag = 1;
        } else if ($dept == "Packing" && $password == "pc") {
            $flag = 1;
        } else if ($dept == "Cutting" && $password == "cut") {
            $flag = 1;
        } else if ($dept == "Finishing" && $password == "fnsng") {
            $flag = 1;
        } else if ($dept == "Sewing" && $password == "swng") {
            $flag = 1;
        } else if ($dept == "Rejection" && $password == "rjctn") {
            $flag = 1;
        } else if ($dept == "ADMIN" && $password == "admin") {
            $request->session()->put('dept', $dept);
            return redirect('delete');
        }


        if ($flag == 0) {
            return redirect()->action('HomeController@home');
        }

        $request->session()->put('dept', $dept);

        return view('root_inputs')->with('invalid', '');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()->action('HomeController@home');
    }
}
