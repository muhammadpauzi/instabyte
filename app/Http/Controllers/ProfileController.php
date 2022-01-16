<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view("profile.index", [
            "title" => "Your Profile - InstaByte"
        ]);
    }

    public function edit()
    {
        $user = User::find(auth()->user()->id);
        return view('profile.edit', [
            'title' => 'Edit Your Profile - InstaByte',
            'user'  => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $username_validation = '';
        if ($user->username !== $request->username) {
            $username_validation = '|unique:users,username';
        }

        $this->validate($request, [
            "name"  => "required|max:255",
            "username"  => "required|max:255|alpha_dash" . $username_validation,
            "bio"  => "max:500",
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->bio = $request->bio;
        $user->save();

        return redirect()->route('profile')->with('message', ['type' => 'success', 'text' => 'Your profile successfully updated!']);
    }
}
