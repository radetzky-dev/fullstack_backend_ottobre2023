<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }


    //Modello : https://codeanddeploy.com/blog/laravel/laravel-8-authentication-login-and-registration-with-username-or-email
    public function login(Request $request)
    {
        $credentials = [$request->username, $request->password];

        var_dump($credentials);
        /*
         if (!Auth::validate($credentials)):
             return redirect()->to('login')
                 ->withErrors(trans('auth.failed'));
         endif;

         $user = Auth::getProvider()->retrieveByCredentials($credentials);

         Auth::login($user);

         return $this->authenticated($request, $user); */

    }
}
