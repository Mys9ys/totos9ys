<?php

namespace App\Http\Controllers\ajax;

use App\Humor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class humorLoad extends Controller
{
    public function load()
    {
        $arHumor = Humor::all();
        return json_encode(array(
            'arHumor' => $arHumor,
        ));
    }

    public function views(Request $request)
    {
//        $perl = new Humor();
        $perl = Humor::find($request->id);
        $perl->views++;
        if ($perl->save()) {return json_encode($perl);}
        else { return json_encode('Проблема');}
    }

    public function likes(Request $request){
        $perl = Humor::find($request->id);
        $perl->likes++;
        if ($perl->save()) {return json_encode($perl);}
        else { return json_encode('Проблема');}
    }

    public function adds(Request $request){
        $perls = Humor::where('text', '=', $request->text)->first();

        if($perls != null){
            return json_encode('Такая шутка уже есть');
        } else {
            $perl = new Humor();
            $perl->user = $request->user;
            $perl->text = $request->text;
            $perl->active = $request->active;
            if ($perl->save()) {return json_encode('Ваша шутка будет добавлена после модерации');}
            else { return json_encode('Проблема');}
        }
    }

}
