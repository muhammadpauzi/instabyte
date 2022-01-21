@extends('layouts.base')

@section('content')
<div class="max-w-xl mx-auto p-5 min-h-screen">
    @auth
    <a href="{{ route('create-post') }}" class="py-3 px-4 bg-indigo-500 text-sm text-white font-bold hover:bg-indigo-600 shadow rounded transition uppercase">Create Post</a>
    @endauth
    @if($posts->count())
    @foreach($posts as $post)
    <div>
        <div class="my-10">
            <div class="mb-5">
                <hr class="w-full block border-top border-gray-200 rounded mb-5">
                <div class="flex items-center justify-between">
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
                    <div>
                        @can('delete', $post)
                        <div class="ml-3 relative">
                            <div>
                                <button type="button" class="flex text-sm rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-indigo-500 transition" id="post-menu-button" data-target="post-menu-group-item" onclick="showMenuElement(this);" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 12c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                    </svg>
                                </button>
                            </div>

                            <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none transition  opacity-0 scale-0 transform z-50" role="menu" aria-orientation="vertical" aria-labelledby="post-menu-button" tabindex="-1" id="post-menu-group-item">
                                <form action="{{ route('delete-post', $post) }}" method="post" onsubmit="return confirm('Are you sure to delete this post?')">
                                    @csrf
                                    @method("DELETE")
                                    <button class="block px-4 py-2 text-sm text-gray-700 hover:text-red-500 transition">Delete this post</button>
                                </form>
                            </div>
                        </div>
                        @endcan
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
    @else
    <div class="py-20 text-center">
        <p class="font-bold text-lg text-red-500">No Posts</p>
    </div>
    @endif

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