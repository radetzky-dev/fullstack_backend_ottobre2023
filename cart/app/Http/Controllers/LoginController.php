<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }


    //Modello : https://codeanddeploy.com/blog/laravel/laravel-8-authentication-login-and-registration-with-username-or-email
    public function login(Request $request)
    {
        // $credentials = [$request->username, $request->password];

        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        //  var_dump($credentials);

        if (!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);

    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
