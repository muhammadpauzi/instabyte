@extends('layouts.base')

@section('content')
<div class="max-w-lg mx-auto py-5 bg-white">
    <div class="mb-5">
        <h1 class="text-3xl text-indigo-500 font-bold mb-3">Sign In</h1>
        <p class="text-sm text-gray-400">Please enter all the fields to sign in!</p>
    </div>
    <form action="{{ route('sign-in') }}" method="post" novalidate>
        @csrf

        <x-input name="username_or_email" label="Username or Email" type="text" old="{{ old('username_or_email') }}" />
        <x-input name="password" label="Password" type="password" />

        <button class="py-3 px-4 bg-indigo-500 text-sm text-white font-bold hover:bg-indigo-600 shadow rounded transition uppercase">Sign in</button>

        <div class="mt-5">
            <p class="text-gray-400">Do not have an account? <a href="{{ route('sign-up') }}" class="text-indigo-500">Sign up</a></p>
        </div>
    </form>
</div>
@endsection