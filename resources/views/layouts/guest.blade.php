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
            <nav class="fixed w-full z-20 top-0 start-0 bg-black border-b border-gray-600">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-4 py-3">
                    <div class="flex items-center space-x-3 rtl:space-x-reverse">
                        <a href="/" class="flex items-center">
                            <img src="/images/logo.jpeg" class="h-8" alt="{{ config('app.name', 'Gotelafrica') }}" />
                            <span class="self-center text-sm font-semibold whitespace-nowrap text-white ml-2">{{ config('app.name', 'Gotelafrica') }}</span>
                        </a>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex items-center gap-2 md:order-2">
                        @guest
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="hidden md:block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center">Register</a>
                            @endif
                            <a href="{{ route('login') }}" class="hidden md:block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Login</a>
                        @else
                            <a href="{{ url('/dashboard') }}" class="hidden md:block text-black bg-green-400 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center">Dashboard</a>
                        @endguest

                        <button
                            id="mobile-menu-button"
                            type="button"
                            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-400 rounded-lg md:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600"
                            aria-controls="navbar-default"
                            aria-expanded="false"
                        >
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>
                    </div>

                    <!-- Desktop menu -->
                    <div class="hidden w-full md:flex md:w-auto md:order-1" id="navbar-default">
                        <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium md:flex-row md:space-x-8 md:mt-0 md:border-0">
                            @auth
                            <li>
                                <a href="/" class="block py-2 px-3 text-white rounded hover:bg-gray-800 md:hover:bg-transparent md:border-0 md:hover:text-green-400 md:p-0">Home</a>
                            </li>
                            <li>
                                <a href="/contact" class="block py-2 px-3 text-white rounded hover:bg-gray-800 md:hover:bg-transparent md:border-0 md:hover:text-green-400 md:p-0">Contact Us</a>
                            </li>
                            @endauth
                        </ul>
                    </div>

                    <!-- Mobile menu (hidden by default) -->
                    <div class="hidden w-full md:hidden md:w-auto" id="mobile-menu">
                        <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-700 rounded-lg bg-gray-800 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent">
                            @auth
                            <li>
                                <a href="/" class="block py-2 px-3 text-white rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-green-400 md:p-0">Home</a>
                            </li>
                            <li>
                                <a href="/contact" class="block py-2 px-3 text-white rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-green-400 md:p-0">Contact Us</a>
                            </li>
                            @endauth

                            @guest
                            <li class="border-t border-gray-700 pt-2 mt-2">
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="block py-2 px-3 text-white bg-blue-700 rounded hover:bg-blue-800 text-center">Register</a>
                                @endif
                            </li>
                            <li>
                                <a href="{{ route('login') }}" class="block py-2 px-3 text-white bg-blue-700 rounded hover:bg-blue-800 text-center mt-2">Login</a>
                            </li>
                            @else
                            <li class="border-t border-gray-700 pt-2 mt-2">
                                <a href="{{ url('/dashboard') }}" class="block py-2 px-3 text-black bg-green-400 rounded hover:bg-green-500 text-center">Dashboard</a>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="w-full sm:max-w-md px-6 py-4 bg-black shadow-md overflow-hidden sm:rounded-lg mt-20 mb-28">
                {{ $slot }}
            </div>
        </div>
        @include('components.bottom-navbar')

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const mobileMenuButton = document.getElementById('mobile-menu-button');
                const mobileMenu = document.getElementById('mobile-menu');

                mobileMenuButton.addEventListener('click', function() {
                    const isExpanded = this.getAttribute('aria-expanded') === 'true';
                    this.setAttribute('aria-expanded', !isExpanded);
                    mobileMenu.classList.toggle('hidden');

                    // Toggle icon
                    if (!isExpanded) {
                        this.innerHTML = `
                            <span class="sr-only">Close menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        `;
                    } else {
                        this.innerHTML = `
                            <span class="sr-only">Open menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        `;
                    }
                });
            });
        </script>
    </body>
</html>