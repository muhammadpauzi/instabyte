<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.sign-up', [
            "title" => "Sign Up - InstaByte"
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "name"  => "required|max:255",
            "username"  => "required|max:255|alpha_dash|unique:users,username",
            "email"  => "required|max:255|email|unique:users,email",
            "password"  => "required|confirmed"
        ]);

        User::create([
            "name"  => $request->post('name'),
            "username"  => $request->post('username'),
            "email"  => $request->post('email'),
            "password"  => Hash::make($request->post('password')),
            'bio'   => "",
            "photo" => "profiles/default.png"
        ]);

        return redirect()->route('sign-in')->with('message', ['type' => 'success', 'text' => 'Your account successfully registered!']);
    }
}
