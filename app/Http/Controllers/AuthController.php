<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function getRegister() {
        return view('auth.register');
    }

    public function postRegister(Request $request) {
        $this->validate($request, [
           'email'      => 'required|unique:users|email|max:255',
           'username'   => 'required|unique:users|alpha_dash|max:25',
           'password'   => 'required|min:6'
        ]);

        User::create([
            'email'     => $request->input('email'),
            'username'  => $request->input('username'),
            'password'  => bcrypt($request->input('password'))
        ]);

        return redirect()->route('home')->with('info', "Вы успешно зарегистрировались!");
    }

    public function getLogin() {
        return view('auth.login');
    }

    public function postLogin(Request $request) {
        $this->validate($request, [
            'email'      => 'required|email|max:255',
            'password'   => 'required|min:6'
        ]);

        if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))) {
            return redirect()->back()->with('info', "Неправильный логин или пароль!");
        }

        return redirect()->route('home')->with('info', "Вы успешно авторизовались!");
    }

    public function getLogout() {
        Auth::logout();

        return redirect()->route('home');
    }
}


























