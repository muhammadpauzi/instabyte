<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        $credentials = [];

        $this->validate($request, [
            'username_or_email' => 'required',
            'password' => 'required',
        ]);

        // sign in with username or email
        $user = User::query()
            ->where("username", "=", $request->username_or_email)
            ->orWhere("email", "=", $request->username_or_email)
            ->first();

        $credentials = [
            'username' => $user['username'],
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('message', ['type' => 'success', 'text' => 'You successfully logged in!']);
        }

        return back()->withInput()->with([
            'message' => ['type' => "error", "text" => 'Sign in failed, please try again and check the email and password again.'],
        ]);
    }
}
