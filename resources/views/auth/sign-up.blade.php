@extends('layouts.base')

@section('content')
<div class="max-w-lg mx-auto py-5 bg-white">
    <div class="mb-5">
        <h1 class="text-3xl text-indigo-500 font-bold mb-3">Sign Up</h1>
        <p class="text-sm text-gray-400">Please enter all the fields to create an account!</p>
    </div>
    <form action="{{ route('sign-up') }}" method="post" novalidate>
        @csrf

        <x-input name="name" label="Name" type="text" old="{{ old('name') }}" />
        <x-input name="username" label="Username" type="text" old="{{ old('username') }}" />
        <x-input name="email" label="Email" type="email" old="{{ old('email') }}" />
        <x-input name="password" label="Password" type="password" />
        <x-input name=" password_confirmation" label="Password Confirmation" type="password" />

        <button class=" py-3 px-4 bg-indigo-500 text-sm text-white font-bold hover:bg-indigo-600 shadow rounded transition uppercase">Sign up</button>

        <div class="mt-5">
            <p class="text-gray-400">Already have an account? <a href="{{ route('sign-in') }}" class="text-indigo-500">Sign in</a></p>
        </div>
    </form>
</div>
@endsection