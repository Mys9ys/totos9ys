<?php

namespace App\Http\Controllers\ajax;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class messageProcessing extends Controller
{
    public function loadNew(Request $request)
    {
        $message = Message::where('geter', '=', $request->id)->where('new', '=', 1)->get();
        return json_encode(count($message));
    }
}
