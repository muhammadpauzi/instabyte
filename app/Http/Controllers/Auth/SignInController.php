<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignInController extends Controller
{
    public function index()
    {
        return view('auth.sign-in', [
            "title" => "Sign In - InstaByte"
        ]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|alpha_dash',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withInput()->with([
            'message' => ['type' => "error", "text" => 'Sign in failed, please try again and check the email and password again.'],
        ]);
    }
}
