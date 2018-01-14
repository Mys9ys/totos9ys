<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{


    public function execute(){
        dd(Auth::user()->id);
        return view('profile', array(
//            'matches' =>$matches,
//            'teams' => $teams
        ));
    }
}
