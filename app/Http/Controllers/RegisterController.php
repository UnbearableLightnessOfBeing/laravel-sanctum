<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    public function register(Request $request): Response {
        $user = User::create($request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6'],
        ]));

        $user->password = bcrypt($user->password);

        $user->save();

        return response('user created', 200);
    }
}
