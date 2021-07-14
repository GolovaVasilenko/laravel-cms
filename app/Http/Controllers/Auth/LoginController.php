<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('backoffice');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function login()
    {
        if(Auth::check() && Auth::user()->hasRole(['admin', 'moderator'])) {
            return redirect()->intended('backoffice');
        }
        return view('front.auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
