<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        } else {
            return redirect()->back()->withErrors(['email' => 'Login gagal!']);
        }
    }

    // Menampilkan form register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Menangani proses register
    // Menangani proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // Hapus Hash::make
        ]);

        return redirect()->route('login');
    }

    // Menangani logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
