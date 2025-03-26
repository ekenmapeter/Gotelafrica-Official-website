<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>About Us | Gotelafrica</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>->

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9764183583019968"
     crossorigin="anonymous"></script>
</head>
<body class="bg-green-400 mb-44">
    <nav class="fixed w-full z-20 top-0 start-0 bg-black">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="images/logo.jpeg" class="h-8 rounded-lg" alt="{{ config('app.name', 'Gotelafrica') }}" />
                <span class="self-center text-1xl font-semibold whitespace-nowrap text-white">{{ config('app.name', 'Gotelafrica') }}</span>
            </a>
            <div class="flex gap-2 md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                @guest @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 text-center">Register</a>
                @endif
                <a href="{{ route('login') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Login</a>
            @else
                <a href="{{ url('/dashboard') }}"
                    class="text-black bg-green-400 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 text-center">Dashboard</a>
            @endguest

            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            @auth
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                    <li>
                        <a href="/" class="block py-2 px-3 text-white" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="/about" class="block py-2 px-3 text-white" aria-current="page">About Us</a>
                    </li>
                    <li>
                        <a href="/contact" class="block py-2 px-3 text-white" aria-current="page">Contact Us</a>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                    Revolutionizing Africa's ICT Landscape <br class="hidden lg:inline-block" />
                    with GotelAfrica
                </h1>
                <p class="mb-8 leading-relaxed">
                    GotelAfrica, an ICT vendor registered with the Nigeria Corporate Affairs Commission (Registration Number: BN2902004), is dedicated to catalyzing innovation and progress across Africa. We're committed to creating employment opportunities, empowering the continent's youth, and spearheading technological advancement.
                </p>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img class="object-cover object-center rounded" alt="hero"
                    src="/images/111.png" />
            </div>
        </div>
    </section>
    @include('components.bottom-navbar')

</body>
</html>
