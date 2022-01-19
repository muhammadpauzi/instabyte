<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    }

    public function show(User $user, Post $post)
    {
        return view('users.show', [
            "title" => $user->username . '\'s' . " Posts | InstaByte",
            "user"  => $user,
            "post"  => $post
        ]);
    }
}
