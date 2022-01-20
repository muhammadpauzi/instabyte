<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $posts = Post::where('user_id', '=', auth()->user()->id)->get();
        return view("profile.index", [
            "title" => "Your Profile - InstaByte",
            "posts" => $posts
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
        $photo_validation = '';
        if ($user->username !== $request->username) {
            $username_validation = '|unique:users,username';
        }
        if ($request->file('photo')) {
            $photo_validation = 'image|mimes:jpeg,jpg,png,bmp,gif,svg|max:512';
        }

        $this->validate($request, [
            "name"  => "required|max:255",
            "username"  => "required|max:255|alpha_dash" . $username_validation,
            "bio"  => "max:500",
            "photo" => $photo_validation
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->bio = $request->bio;
        $user->photo = $request->file('photo') ? Str::remove('public/', $request->file('photo')->store('public/profiles')) : 'profiles/default.png';
        $user->save();

        return redirect()->route('profile')->with('message', ['type' => 'success', 'text' => 'Your profile successfully updated!']);
    }
}
