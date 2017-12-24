<?php

namespace App\Http\Controllers;

use App\Matches;use App\Teams;

use Illuminate\Http\Request;

class ComplitedController extends Controller
{
    //complited
    public function execute(){

        $matches=Matches::all();
        $teams = Teams::all();

        return view('complited', array(
            'matches' =>$matches,
            'teams' => $teams
        ));
    }
}
