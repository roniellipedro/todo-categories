<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }

        return view('login');
    }

    public function login_action(Request $request)
    {
        
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

    

        if (Auth::attempt($validator)) {
            $request->session()->regenerate();
            return redirect(route('home'));
        }

        $email = $request->email;

        return redirect(route('login'))
        ->with('email', $email)
        ->with('error_msg', 'E-mail ou senha inválido!');
    }

    public function register()
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('register');
    }

    public function register_action(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);


        $user = $request->only('name', 'email', 'password');

        User::create($user);

        return redirect(route('login'))->with('success_msg', 'Usuário criado com sucesso!');
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('login'));
    }
}
