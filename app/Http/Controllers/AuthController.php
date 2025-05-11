<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
    }

    public function register()
    {
        return view('register');
    }

    public function register_action(Request $request)
    {

        // if ($request->password_confirmation !== $request->password) {
        //     return redirect()->back()->with('error_msg', 'Senhas não se conferem!');
        // }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);



        $user = $request->only('name', 'email', 'password');

        $user['password'] = Hash::make('password');


        User::create($user);
        return redirect(route('login'))->with('success_msg', 'Usuário criado com sucesso!');
    }
}
