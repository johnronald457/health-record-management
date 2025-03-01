<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect based on user role
            if ($user->role === 'doctor') {
                return redirect()->intended('/doctor-dashboard');
            } elseif ($user->role === 'nurse') {
                return redirect()->intended('/nurse-dashboard');
            } elseif ($user->role === 'head') {
                return redirect()->intended('/head-dashboard');
            } else {
                return redirect()->intended('/dashboard');
            }
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
