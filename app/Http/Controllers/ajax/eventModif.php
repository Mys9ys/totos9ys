<?php

namespace App\Http\Controllers\ajax;

use App\Countries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events;
use Illuminate\Support\Facades\Auth;

class eventModif extends Controller
{
    public function adds(Request $request){
//        $this->validate($request, [
////            'name' => 'required|string|max:36',
//         'avatar' => 'file'
//
//        ]);
        if($request->hasFile('avatar')){
            $path_to_attach = '/avatar/';
            $file = $request->file('avatar');
            $filename = str_random(20) . '.' . $file->getClientOriginalExtension() ?: 'png';

            $file->move(public_path().$path_to_attach, $filename);
        }

//        return json_encode($request->name);
        return json_encode($request);
    }

    public function addEvent(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'short_name' => 'required|string',
            'sport' => 'required',
            'start_event' => 'required',
            'end_event' => 'required',
            'teams' => 'required',
            'group' => 'required',
            'description' => 'required',
            'count_match' => 'required',
//         'avatar' => 'file'
        ]);
        $event = new Events();
        foreach ($request->all() as $key=>$value){
            $event->$key=$value;
        }
        $event->user_added=Auth::user()->id;
        $event->save();
        return json_encode('Событие добавлено');
    }

    public function addCountry(Request $request){
        $res = Countries::where('flag', '=', $request->flag)->first();

        if($res != null){
            return json_encode('Такая страна уже есть');
        } else {
            $country = Countries::create([
                'name' => $request->name,
                'flag' => $request->flag,
                'user_added' => Auth::user()->id,
            ]);
            return json_encode('Страна успешно добавлена');
        }
    }
    public function getEvents(Request $request){

        $res = Events::find($request->id);
        return json_encode($res);
    }
}

//avatar
//:
//"C:\fakepath\d087a9dbc9d88f8703d4a36e9b39f6bb.jpg"
//end_event
//:
//""
//name
//:
//""
//short_name
//:
//""
//sport
//:
//""
//start_event
//:
//""
//teams