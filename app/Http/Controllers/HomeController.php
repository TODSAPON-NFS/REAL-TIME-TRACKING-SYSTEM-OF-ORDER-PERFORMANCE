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
