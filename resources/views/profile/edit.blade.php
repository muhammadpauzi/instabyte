@extends('layouts.base')

@section('content')
<div class="max-w-lg mx-auto p-5">

    <div class="mb-5">
        <h1 class="text-3xl text-indigo-500 font-bold mb-3">Edit Profile</h1>
        <p class="text-sm text-gray-400">Please enter all the fields to make your profile better!</p>
    </div>
    <form action="{{ route('edit-profile') }}" method="post" novalidate enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="" id="photo-profile" class="border-2 border-gray-200 shadow-lg w-24 h-24 block rounded-full mx-auto mb-5">
            <div class="text-center">
                <button type="button" id="change-photo-profile" class="py-3 px-4 bg-indigo-500 text-sm text-white font-bold hover:bg-indigo-600 shadow rounded transition uppercase">Change photo profile</button>
                <button type="button" id="default-photo-profile" class="py-3 px-4 bg-gray-100 text-sm text-indigo-500 font-bold hover:bg-gray-200 shadow rounded transition uppercase">Default photo profile</button>
            </div>
            <input type="file" name="photo" id="photo-input-file" class="hidden">
        </div>

        <script>
            const changePhotoProfile = document.getElementById('change-photo-profile');
            const defaultPhotoProfile = document.getElementById('default-photo-profile');
            const photoInputFile = document.getElementById('photo-input-file');
            const photoProfile = document.getElementById('photo-profile');

            const showImage = (files, cb) => {
                const file = files[0];
                const fileReader = new FileReader();
                fileReader.onload = function(e) {
                    cb(e.target.result);
                }
                fileReader.readAsDataURL(file);
            }

            changePhotoProfile.addEventListener('click', function() {
                photoInputFile.click();
            });

            defaultPhotoProfile.addEventListener('click', function() {
                photoInputFile.value = "";
                photoProfile.src = '/storage/profiles/default.png';
            });

            photoInputFile.addEventListener('change', function() {
                showImage(this.files, (result) => {
                    photoProfile.src = result;
                });
            });
        </script>

        <x-input name="name" label="Name" type="text" old="{{ old('name') }}" value="{{ auth()->user()->name }}" />
        <x-input name="username" label="Username" type="text" old="{{ old('username') }}" value="{{ auth()->user()->username }}" />
        <x-input name="bio" label="Bio" type="text" old="{{ old('bio') }}" value="{{ auth()->user()->bio }}" textarea={{true}} />

        <button class="py-3 px-4 bg-indigo-500 text-sm text-white font-bold hover:bg-indigo-600 shadow rounded transition uppercase">Update Profile</button>

    </form>

</div>
@endsection