<?php

namespace App\Http\Controllers;

use App\Forecasts;
use App\Matches;
use App\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForecastController extends Controller
{
    //
    public function execute(Request $request){

//        if($request->isMethod('post')) {
//            $input = $request->except('_token');
////            dd($input);
////            dd($request);
//            $forecast = new Forecasts();
//            $forecast->fill($input);
//            if($forecast->save()) {
//                $url = 'forecast/'.$request->id;
//                return redirect($url)->with('status', 'Страница добавлена');
//            }
//        }
//
////        dd($request->id);
////        dd($input);
//
//        $forecast= Forecasts::where('User_ID', '=', Auth::user()->id)
//            ->where('match_ID', '=', $request->id)->first();
////        dd($forecast);
//        $matches=Matches::where('match_ID', '=', $request->id)->first();
//        $forecastMatches=Matches::all();
//        $teams = Teams::all();

        return view('forecast', array(
            'forecast' => array(),
            'matches' =>array(),
            'teams' => array(),
            'forecastMatches' => array(),
        ));
    }
}
