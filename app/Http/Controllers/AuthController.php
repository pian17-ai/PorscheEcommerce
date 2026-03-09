<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'required'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'],
        ]);

        return redirect('/login')->with('success', 'Register successfully');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {

            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect('/dashboard');
            } else {
                return redirect('/');
            }
        }

        return back()->with('error', 'Wrong email or password');
    }

    public function logout() {
        Auth::logout();

        return redirect('/login');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function showLogin() {
        return view('auth.login');
    }
}
