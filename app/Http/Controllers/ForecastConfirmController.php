<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForecastConfirmController extends Controller
{
    public function execute(Request $request){
        return view('forecastconfirm');
    }
}
