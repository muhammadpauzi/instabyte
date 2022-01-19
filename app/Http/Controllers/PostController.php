<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function create()
    {
        return view('posts/create', [
            "title" => "Create a Post - InstaByte"
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "body" => "required|max:500",
            "files" => "required",
            "files.*" => "image|mimes:jpeg,jpg,png,bmp,gif,svg"
        ], [
            "files.*.image" => "The files must be an image.",
            "files.*.mimes" => "The files must be an image."
        ]);

        $post = Post::create([
            "user_id"   => auth()->user()->id,
            "body"   => $request->body
        ]);

        $files = [];
        foreach ($request->file('files') as $file) {
            $files[] = [
                "user_id"   => auth()->user()->id,
                "post_id" => $post->id,
                "path_resource" => $file->store('files')
            ];
        }

        PostResource::insert($files);

        return redirect()->route('home')->with('message', ['type' => 'success', 'text' => 'Post has successfully created!']);
    }
}
