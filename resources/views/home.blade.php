@extends('layouts.base')

@section('content')
<div class="max-w-xl mx-auto p-5">
    @foreach($posts as $post)
    <div>
        <div class="my-10">
            <div class="mb-5">
                <hr class="w-full block border-top border-gray-200 rounded mb-5">
                <div class="flex items-center">
                    <div class="mr-5">
                        <img class="h-12 w-12 rounded-full" src="{{ asset('storage/' . $post->user->photo) }}" alt="">
                    </div>
                    <div>
                        <span class="block"><a href="/{{ $post->user->username }}" class="text-indigo-500 font-bold">{{ $post->user->username }}</a></span>
                        <span class="block text-gray-500 text-sm">
                            {{ $post->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
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
                <!-- <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div> -->
            </div>
        </div>

        <div class="mb-5 w-full">

            <hr class="w-full block border-top border-gray-200 rounded mb-5">

            <p class="text-gray-500 leading-relaxed text-md">
                {{ $post->body }}
            </p>
        </div>
    </div>
    @endforeach

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