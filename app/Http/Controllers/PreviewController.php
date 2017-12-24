<?php

namespace App\Http\Controllers;

use App\Matches;
use App\Teams;
use Illuminate\Http\Request;

class PreviewController extends Controller
{
    //
    public function execute(){

        $matches=Matches::all();
        $teams = Teams::all();

        return view('preview', array(
            'matches' =>$matches,
            'teams' => $teams
        ));
    }
}
