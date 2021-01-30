<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $result = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($result) {
            $request->session()->regenerate();
            return redirect('/categories');
        }

        return back();
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
