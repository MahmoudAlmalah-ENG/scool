<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\InviteCode;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request): ?RedirectResponse
    {
        try {
            InviteCode::where('code', $request->get('invitation_code'))->firstOrFail()->delete();

            User::create($request->except('invitation_code'));

            return to_route('login')->with('success', 'Your account has been created successfully');
        } catch (ModelNotFoundException $e) {
            return to_route('auth.register.index')->with('error', 'Invalid invitation code.');
        } catch (\Exception $e) {
            return to_route('auth.register.index')->with('error', 'Something went wrong, please try again later.');
        }
    }
}
