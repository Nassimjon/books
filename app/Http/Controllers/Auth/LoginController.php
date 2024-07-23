<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function getLoginPage() {

        return view('Auth.login');

    }

   public function loginUser(Request $request) {

        if (Auth::attempt(
            ['email' => $request->input('user_email'),
             'password' => $request->input('user_password')]))
        {
            return redirect('/welcomePage');
        }

        return redirect()->back();

   }


}
