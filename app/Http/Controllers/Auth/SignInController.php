<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

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
            return redirect()->route('home');
        }

        return back()->withInput()->with([
            'message' => ['type' => "error", "text" => 'Sign in failed, please try again and check the email and password again.'],
        ]);
    }
}
