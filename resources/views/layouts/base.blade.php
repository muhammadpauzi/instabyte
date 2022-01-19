<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <title>{{ $title }}</title>
</head>

<body>

    @include('layouts.navbar')

    @if (session('message'))
    <div class="flex fixed top-3.5 right-3.5" id="notification">
        <div class="m-auto">
            <div class="bg-white rounded-lg border-gray-300 border p-3 shadow-lg">
                <div class="flex flex-row">
                    <div class="px-2">
                        @if(session('message')['type'] === 'success')
                        <svg width="24" height="24" viewBox="0 0 1792 1792" fill="#44C997" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1299 813l-422 422q-19 19-45 19t-45-19l-294-294q-19-19-19-45t19-45l102-102q19-19 45-19t45 19l147 147 275-275q19-19 45-19t45 19l102 102q19 19 19 45t-19 45zm141 83q0-148-73-273t-198-198-273-73-273 73-198 198-73 273 73 273 198 198 273 73 273-73 198-198 73-273zm224 0q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#ef4444">
                            <path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z" />
                            <path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z" />
                        </svg>
                        @endif
                    </div>
                    <div class="ml-2 mr-6 max-w-xs">
                        <span class="font-semibold {{ session('message')['type'] === 'success' ? 'text-green-500' : 'text-red-500' }}">{{ session('message')['text'] }}</span>
                        <!-- <span class="block text-gray-500">Anyone with a link can now view this file</span> -->
                    </div>
                    <div class="cursor-pointer" onclick="document.getElementById('notification').remove();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#6b7280">
                            <path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="max-w-4xl mx-auto py-7 px-3">
        @yield('content')
    </div>

    <footer class="w-full mt-32 border-top-2 border-top-gray-200 py-10 px-5 text-center block">
        <p>Copyright <?= date("Y"); ?>, All Right Reserved.</p>
    </footer>

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>