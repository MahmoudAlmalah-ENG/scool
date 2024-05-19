<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profile.user-account', [
            'user' => auth()->user()
        ]);
    }

    public function security()
    {
        return view('profile.user-security', [
            'user' => auth()->user()
        ]);
    }

    public function project()
    {
        return view('profile.user-project', [
            'projects' => auth()->user()->projects
        ]);
    }

    public function team()
    {
        return view('profile.user-team', [
            'teams' => auth()->user()->teams
        ]);
    }
}
