<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignOutController extends Controller
{
    public function store(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('sign-in')->with([
            'message' => ['type' => "success", "text" => 'You have successfully logged out!'],
        ]);
    }
}
