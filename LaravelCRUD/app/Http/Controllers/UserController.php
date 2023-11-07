<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(string $id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function index()
    {

        $users = User::all();
        return view('user.index', compact('users'));

        // $data['users'] = User::orderBy('name', 'ASC');

        // return view('user.index', $data);
    }
}
