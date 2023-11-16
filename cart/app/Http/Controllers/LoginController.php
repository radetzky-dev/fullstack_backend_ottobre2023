<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        /* $credentials = $request->getCredentials();

         if (!Auth::validate($credentials)):
             return redirect()->to('login')
                 ->withErrors(trans('auth.failed'));
         endif;

         $user = Auth::getProvider()->retrieveByCredentials($credentials);

         Auth::login($user);

         return $this->authenticated($request, $user); */
        echo "login";
    }
}
