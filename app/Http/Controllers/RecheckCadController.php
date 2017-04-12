<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecheckCadController extends Controller
{
    public function show(Request $request)
    {
        return view('Recheck with extra booking.cad');
    }
}
