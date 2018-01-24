<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Auth;

class MessageController extends Controller
{
    public function execute(){
        $geterUser = Auth::user()->id;
        $messages = Message::where('geter', '=', $geterUser)->get();

        return view('message', array(
            'messages' =>$messages,
//            'teams' => $teams
        ));
    }
}
