<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('profile.index');
        }
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('profile.index')->with('success', 'You have been logged in successfully');
        }

        return to_route('login')->with('error','Invalid credentials');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return to_route('login')->with('success', 'You have been logged out successfully');
    }
}
