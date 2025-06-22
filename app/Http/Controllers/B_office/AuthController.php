<?php

namespace App\Http\Controllers\B_office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('auth');
    }

    public function auth_login(Request $request)
    {
     $validateData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($validateData, $request->boolean('remember')
        )) {
            $request->session()->regenerate();
            return redirect()->intended(route('welcome_admin'));
        }

        return back()->withErrors([
            'email' => 'Email ou Téléphone et mot de passe incorrect.',
        ])->withInput();
    }



    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
