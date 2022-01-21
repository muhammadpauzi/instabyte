@extends('layouts.base')

@section('content')
<div class="max-w-2xl mx-auto p-5">

    <div class="flex items-center mb-5">
        <div>
            <img src="{{ asset('storage/' . $user->photo) }}" alt="" class="border-2 border-gray-200 shadow-lg w-24 h-24 block rounded-full">
        </div>
        <div class="pl-5">
            <h1 class="font-bold block mb-1 text-xl">{{ $user->username }}</h1>
            <h2 class="font-semibold block mb-2 text-sm text-gray-700">{{ $user->name }}</h2>
            <div class="grid grid-cols-3 gap-2">
                <a href="" class="text-center hover:bg-gray-100 transition p-2 px-4 rounded">
                    <span class="block font-bold">{{ $user->posts()->count() }}</span>
                    <span class="block font-medium text-gray-700">{{ Str::plural('Post', $user->posts()->count()) }}</span>
                </a>
                <a href="" class="text-center hover:bg-gray-100 transition p-2 px-4 rounded">
                    <span class="block font-bold">0</span>
                    <span class="block font-medium text-gray-700">Followers</span>
                </a>
                <a href="" class="text-center hover:bg-gray-100 transition p-2 px-4 rounded">
                    <span class="block font-bold">0</span>
                    <span class="block font-medium text-gray-700">Following</span>
                </a>
            </div>
        </div>
    </div>

    <div class="mb-10">
        <p class="text-gray-500 ">
            {{ $user->bio }}
        </p>
    </div>

    @auth
    @if( $user->id === auth()->user()->id )
    <div class="mb-10">
        <a href="{{ route('edit-profile') }}" class="py-3 px-4 bg-indigo-500 text-sm text-white font-bold hover:bg-indigo-600 shadow rounded transition uppercase">Edit Profile</a>
        <a href="{{ route('create-post') }}" class="py-3 px-4 bg-indigo-500 text-sm text-white font-bold hover:bg-indigo-600 shadow rounded transition uppercase">Create Post</a>
    </div>
    @endif
    @endauth

    <hr class="w-full block border-top border-gray-200 rounded mb-10">

    @if($user->posts->count())
    <div class="grid grid-cols-2 gap-2">
        @foreach($user->posts as $post)
        <a href="/{{ $post->user->username }}/posts/{{ $post->id }}">
            <div>
                <img src="{{ asset('storage/' . $post->resources[0]->path_resource) }}" alt="" class="object-cover block rounded w-full h-56">
            </div>
        </a>
        @endforeach
    </div>
    @else
    <div>
        <p class="text-red-500 text-center font-bold">No Posts</p>
    </div>
    @endif

</div>
@endsection