<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Gotelafrica') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Google Ads -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9764183583019968"
        crossorigin="anonymous"></script>
    </head>
    <body class="bg-green-400">
        @include('sweetalert::alert')
        @include('components.live_chat')

        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center selection:text-white">
            <nav class="fixed w-full z-20 top-0 start-0 bg-black">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img src="/images/logo.jpeg" class="h-8" alt="{{ config('app.name', 'Gotelafrica') }}" />
                        <span class="self-center text-1xl font-semibold whitespace-nowrap text-white">{{ config('app.name', 'Gotelafrica') }}</span>
                    </a>
                    <div class="flex gap-2 md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        @guest @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 text-center">Register</a>
                        @endif
                        <a href="{{ route('login') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Login</a>
                        @else
                        <a href="{{ url('/dashboard') }}" class="text-black bg-green-400 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 text-center">Dashboard</a>
                        @endguest

                        <button
                            data-collapse-toggle="navbar-sticky"
                            type="button"
                            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                            aria-controls="navbar-sticky"
                            aria-expanded="false"
                        >
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>
                    </div>
                    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                        @auth
                        <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                            <li>
                                <a href="/" class="block py-2 px-3 text-white" aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="/" class="block py-2 px-3 text-white" aria-current="page">About Us</a>
                            </li>
                            <li>
                                <a href="/contact" class="block py-2 px-3 text-white" aria-current="page">Contact Us</a>
                            </li>
                        </ul>
                        @endauth
                    </div>
                </div>
            </nav>
            <div class="w-full sm:max-w-md px-6 py-4 bg-black shadow-md overflow-hidden sm:rounded-lg mt-20 mb-28">
                {{ $slot }}
            </div>
        </div>
        @include('components.bottom-navbar')
    </body>
</html>
