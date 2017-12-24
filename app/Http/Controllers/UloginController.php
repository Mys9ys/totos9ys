<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Redirect;

class UloginController extends Controller
{
    // Login user through social network.
    public function login(Request $request)
    {
//        dd($_POST);
        // Get information about user.
        $data = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
        $user = json_decode($data, TRUE);
//        dd($user);

        $network = $user['network'];

        // Find user in DB.
        $userData = User::where('email', $user['email'])->first();

        // Check exist user.
        if (isset($userData->id)) {

            // Check user status.
            if ($userData->status) {

                // Make login user.
                Auth::loginUsingId($userData->id, TRUE);
            }
            // Wrong status.
            else {
                \Session::flash('flash_message_error', trans('interface.AccountNotActive'));
            }

            return Redirect::back();
        }
        // Make registration new user.
        else {
//            dd($user);
            // Create new user in DB.
            $newUser = User::create([
                'nik' => $user['nickname'],
                'name' => $user['first_name'] . ' ' . $user['last_name'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'avatar' => $user['photo'],
                'country' => $user['country'],
                'email' => $user['email'],
                'password' => Hash::make(str_random(8)),
                'role' => 'user',
                'status' => TRUE,
                'ip' => $request->ip(),
                'network' => $user['network'],
            ]);

            // Make login user.
            Auth::loginUsingId($newUser->id, TRUE);

            \Session::flash('flash_message', trans('interface.ActivatedSuccess'));

            return Redirect::back();
        }
    }
}
