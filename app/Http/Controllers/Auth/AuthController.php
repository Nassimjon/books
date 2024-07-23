<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getAuthPage() {
        return view('Auth.signup');
    }

    public function singUpUser(Request $request) {

        $user = new User();

        $name = $request->input('user_name');
        $email = $request->input('user_email');
        $password = $request->input('user_password');

        $user->name = $name;
        $user->email= $email;
        $user->password = $password;
        $user->save();

        Auth::login($user);
        return redirect('/index');

//        if (Auth::check()) {
//            //dd(Auth::id());
//            return redirect('/index');
//        }
//        else
//            return redirect('/welcome');


    }
}
