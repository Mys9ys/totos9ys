<?php

namespace App\Http\Controllers;

use App\Corners;
use App\Score;
use Illuminate\Http\Request;
use App\General;



class WelcomeController extends Controller
{
    //
    public function execute(){

//        if ($general = General::all()->count()==0){
//            $general = Tenliders();
//            $score = Tenliders();
//            $corners = Tenliders();
//            dd($general);
//        } else {
//            $general = json_decode(General::all()->sortBy('place')->take(10), true);
//            $score = json_decode(Score::all()->sortBy('place')->take(10), true);
//            $corners = json_decode(Corners::all()->sortBy('place')->take(10),true);
//            dd($general);
//            dd($score);
//            $result =  forArray($general);
//            dd($result);
//        }


//        $general = General::all()->count();
//        dd($general);
//        dd($general);
        return view('welcome',
            array(
//            'general' => $general,
//            'score' => $score,
//            'corners' => $corners
        )
        );
    }
}

//function Tenliders(){
//    $mass = [
//        ['score'=>rand(20, 70), 'user_name'=>'Ronaldo', 'place'=>'',  'image'=>''],
//        ['score'=>rand(20, 70), 'user_name'=>'Messi', 'place'=>''],
//        ['score'=>rand(20, 70), 'user_name'=>'Neymar', 'place'=>''],
//        ['score'=>rand(20, 70), 'user_name'=>'Suarez', 'place'=>''],
//        ['score'=>rand(20, 70), 'user_name'=>'Neuer', 'place'=>''],
//        ['score'=>rand(20, 70), 'user_name'=>'Bale', 'place'=>''],
//        ['score'=>rand(20, 70), 'user_name'=>'Ibrahimovic', 'place'=>''],
//        ['score'=>rand(20, 70), 'user_name'=>'Boateng', 'place'=>''],
//        ['score'=>rand(20, 70), 'user_name'=>'Lewandowski', 'place'=>''],
//        ['score'=>rand(20, 70), 'user_name'=>'De_Gea', 'place'=>'']
//    ];
//    arsort($mass);
//    $i=1;
//    $array = [];
//    foreach ($mass as $item){
//        $item['place']=$i++;
//        $item['image']='public/image/simple/'.$item['user_name'].'.jpg';
//        array_push($array,$item);
//    }
//    return $array;
//}

//function forArray($array){
//    $result = [];
//    foreach ($array as $item){
//        foreach ($item as $array){
//            dd((arr$array);
//        }
//
////        dd($item);
//        array_push($result,(array)$item);
//    }
//    dd($result);
//    return $result;
//}