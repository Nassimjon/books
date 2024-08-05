<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\TestJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $user->password = bcrypt($password);

//        $user->save();

        TestJob::dispatch($user)->delay(now()->addSeconds(11));

//        Auth::login($user);

        return redirect('main');

    }
}
