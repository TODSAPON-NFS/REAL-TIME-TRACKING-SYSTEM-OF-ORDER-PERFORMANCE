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

        $flag = 1;

        /*if ($dept == "Merchandising" && $password == "a") {
            $flag = 1;
        } else if ($dept == "CAD" && $password == "b") {
            $flag = 1;
        } else if ($dept == "Store" && $password == "c") {
            $flag = 1;
        } else if ($dept == "MU" && $password == "d") {
            $flag = 1;
        } else if ($dept == "Fabric" && $password == "e") {
            $flag = 1;
        }*/

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
