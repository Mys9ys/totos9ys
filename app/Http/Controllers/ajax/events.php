<?php

namespace App\Http\Controllers\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class events extends Controller
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