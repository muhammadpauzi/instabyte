@extends('layouts.base')

@section('content')
<div class="max-w-lg mx-auto p-5">

    <div class="mb-5">
        <h1 class="text-3xl text-indigo-500 font-bold mb-3">Edit Profile</h1>
        <p class="text-sm text-gray-400">Please enter all the fields to make your profile better!</p>
    </div>
    <form action="{{ route('edit-profile') }}" method="post" novalidate>
        @csrf
        @method('PUT')
        <x-input name="name" label="Name" type="text" old="{{ old('name') }}" value="{{ auth()->user()->name }}" />
        <x-input name="username" label="Username" type="text" old="{{ old('username') }}" value="{{ auth()->user()->username }}" />
        <x-input name="bio" label="Bio" type="text" old="{{ old('bio') }}" value="{{ auth()->user()->bio }}" textarea={{true}} />

        <button class="py-3 px-4 bg-indigo-500 text-sm text-white font-bold hover:bg-indigo-600 shadow rounded transition uppercase">Update Profile</button>

    </form>

</div>
@endsection