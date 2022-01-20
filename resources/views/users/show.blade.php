@extends('layouts.base')

@section('content')
<div class="max-w-2xl mx-auto p-5">
    <a href="{{ route('home') }}" class="py-3 px-4 bg-indigo-500 text-sm text-white font-bold hover:bg-indigo-600 shadow rounded transition uppercase">Back</a>

    <div class="my-10">
        <div class="swiper w-full">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach($post->resources as $resource)
                <div class="swiper-slide">
                    <img src="{{ asset('storage/' . $resource->path_resource) }}" alt="" class="object-cover block rounded w-full h-96 select-none">
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <!-- If we need navigation buttons -->
            <!-- <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div> -->
        </div>
    </div>

    <div class="mb-10 w-full">
        <hr class="w-full block border-top border-gray-200 rounded">

        <div class="grid grid-cols-3 gap-2 py-10">
            <small class="font-bold">
                <span class="block text-gray-500">
                    Created at
                </span> {{ $post->created_at->diffForHumans() }}
            </small>
            <small class="font-bold">
                <span class="block text-gray-500">
                    Updated at
                </span> {{ $post->updated_at->diffForHumans() }}
            </small>
            <small class="font-bold">
                <span class="block text-gray-500">
                    Posted by
                </span> <a href="/{{ $post->user->username }}" class="text-indigo-500">{{ $post->user->username }}</a>
            </small>
        </div>

        <hr class="w-full block border-top border-gray-200 rounded mb-5">

        <p class="text-gray-500">
            {{ $post->body }}
        </p>
    </div>


    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,

            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
        });
    </script>

</div>
@endsection