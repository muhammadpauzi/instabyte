<nav class="flex items-center p-5 bg-white border-b border-gray-100">
    <div class="max-w-4xl w-full mx-auto flex items-center justify-between">
        <a href="" class="text-lg font-bold text-indigo-500 block">
            InstaByte
        </a>

        <ul class="flex items-center space-x-6">
            <li>
                <a href="" class="text-md font-medium text-gray-800 hover:text-indigo-500 transition">Home</a>
            </li>
            <li>
                <a href="" class="text-md font-medium text-gray-800 hover:text-indigo-500 transition">Posts</a>
            </li>
            <ul class="flex items-center space-x-2">
                @auth
                <li>
                    <form action="{{ route('sign-out') }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button class="py-3 px-4 bg-red-500 text-sm text-white font-bold hover:bg-red-600 shadow rounded transition uppercase">Sign Out</button>
                    </form>
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