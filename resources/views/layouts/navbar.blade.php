<nav class="flex items-center p-5 bg-white border-b border-gray-100">
    <div class="max-w-4xl w-full mx-auto flex items-center justify-between">
        <a href="{{ route('home') }}" class="text-lg font-bold text-indigo-500 block">
            InstaByte
        </a>

        <ul class="flex items-center space-x-6">
            <li>
                <a href="{{ route('home') }}" class="text-md font-medium text-gray-800 hover:text-indigo-500 transition">Home</a>
            </li>
            <li>
                <a href="" class="text-md font-medium text-gray-800 hover:text-indigo-500 transition">Posts</a>
            </li>
            <ul class="flex items-center space-x-2">
                @auth
                <li>
                    <div class="ml-3 relative">
                        <div>
                            <button type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-indigo-500 transition" id="user-menu-button" data-target="user-menu-group-item" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-10 w-10 rounded-full" src="{{ asset('img/' . auth()->user()->photo) }}" alt="">
                            </button>
                        </div>

                        <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none transition  opacity-0 scale-0 transform" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" id="user-menu-group-item">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="{{route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-indigo-500 transition" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:text-indigo-500 transition" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                            <form action="{{ route('sign-out') }}" method="post" onsubmit="return confirm('Are you sure to log out?')">
                                @csrf
                                @method("DELETE")
                                <button class="block px-4 py-2 text-sm text-gray-700 hover:text-red-500 transition">Sign Out</button>
                            </form>
                        </div>
                    </div>
                </li>
                @endauth
                @guest
                <li>
                    <a href="{{ route('sign-in') }}" class="py-3 px-4 bg-indigo-500 text-sm text-white font-bold hover:bg-indigo-600 shadow rounded transition uppercase">Sign in</a>
                </li>
                <li>
                    <a href="{{ route('sign-up') }}" class="py-3 px-4 bg-indigo-500 text-sm text-white font-bold hover:bg-indigo-600 shadow rounded transition uppercase">Sign up</a>
                </li>
                @endguest
            </ul>
        </ul>
    </div>
</nav>