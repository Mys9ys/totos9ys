<?php

namespace App\Http\Controllers\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class events extends Controller
{
    public function adds(Request $request){
        return json_encode($request);
    }
}
