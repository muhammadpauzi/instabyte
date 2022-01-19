@extends('layouts.base')

@section('content')
<div class="p-5">
    <div class="mb-5 max-w-lg mx-auto">
        <h1 class="text-3xl text-indigo-500 font-bold mb-3">Create a Post</h1>
        <p class="text-sm text-gray-400">Create a post by enter all fields and choose an image or video.</p>
        <hr class="w-full block border-top border-gray-200 rounded mb-5 mt-10">
    </div>
    <form action="{{ route('create-post') }}" method="post" novalidate enctype="multipart/form-data">
        @csrf

        <div class="max-w-4xl mx-auto my-5">
            <div class="grid grid-cols-3 gap-2 mb-3" id="files-group">
            </div>
            <div>
                @error("files")
                <small class="text-sm text-red-500 font-medium">{{ $message }}</small>
                @enderror
                @error("files.*")
                <small class="text-sm text-red-500 font-medium">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="max-w-lg mx-auto">
            <hr class="w-full block border-top border-gray-200 rounded mb-5 mt-10">

            <x-input name="body" label="Content" type="text" old="{{ old('body') }}" textarea={{true}} />

            <button class="py-3 px-4 bg-indigo-500 text-sm text-white font-bold hover:bg-indigo-600 shadow rounded transition uppercase">Create Post</button>
        </div>
    </form>

</div>
@endsection