@extends('layouts.base')

@section('content')
<div class="max-w-lg mx-auto p-5">

    <div class="flex items-center mb-5">
        <div>
            <img src="{{ asset('img/default.png') }}" alt="" class="border-2 border-gray-200 shadow-lg w-24 h-24 block rounded-full">
        </div>
        <div class="pl-5">
            <h1 class="font-bold block mb-1 text-xl">{{ auth()->user()->username }}</h1>
            <h2 class="font-semibold block mb-2 text-sm text-gray-700">{{ auth()->user()->name }}</h2>
            <div class="grid grid-cols-3 gap-2">
                <a href="" class="text-center hover:bg-gray-100 transition p-2 px-4 rounded">
                    <span class="block font-bold">0</span>
                    <span class="block font-medium text-gray-700">Posts</span>
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
            {{ auth()->user()->bio }}
        </p>
    </div>

    <a href="{{ route('edit-profile') }}" class="py-3 px-4 bg-indigo-500 text-sm text-white font-bold hover:bg-indigo-600 shadow rounded transition uppercase">Edit Profile</a>


</div>
@endsection