<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>About Us | Gotelafrica</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />

    <!-- Alpine JS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Google Ads -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9764183583019968" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
        }
        .heading-font {
            font-family: 'Playfair Display', serif;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #10b981 0%, #047857 100%);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .transition-all {
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Navigation -->
    <nav class="fixed w-full z-20 top-0 start-0 gradient-bg shadow-lg">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="images/logo.jpeg" class="h-10 rounded-lg" alt="{{ config('app.name', 'Gotelafrica') }}" />
                <span class="self-center text-2xl font-bold whitespace-nowrap text-white">{{ config('app.name', 'Gotelafrica') }}</span>
            </a>
            <div class="flex gap-2 md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                @guest
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center transition-all hover:shadow-lg">
                        <i class="fas fa-user-plus mr-2"></i>Register
                    </a>
                @endif
                <a href="{{ route('login') }}"
                    class="text-emerald-800 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center transition-all hover:shadow-lg">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </a>
                @else
                <a href="{{ url('/dashboard') }}"
                    class="text-white bg-emerald-600 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center transition-all hover:shadow-lg">
                    <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                </a>
                @endguest

                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-white"
                    aria-controls="navbar-sticky" aria-expanded="false">
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
                        <a href="/" class="block py-2 px-3 text-white hover:text-emerald-200 transition-all rounded md:bg-transparent md:p-0" aria-current="page">
                            <i class="fas fa-home mr-2"></i>Home
                        </a>
                    </li>
                    <li>
                        <a href="/about" class="block py-2 px-3 text-white bg-emerald-700 rounded md:bg-transparent md:text-emerald-200 md:p-0" aria-current="page">
                            <i class="fas fa-info-circle mr-2"></i>About Us
                        </a>
                    </li>
                    <li>
                        <a href="/contact" class="block py-2 px-3 text-white hover:text-emerald-200 transition-all rounded md:bg-transparent md:p-0" aria-current="page">
                            <i class="fas fa-envelope mr-2"></i>Contact Us
                        </a>
                    </li>
                </ul>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="container mx-auto flex px-5 py-10 md:flex-row flex-col items-center">
            <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="heading-font sm:text-5xl text-4xl mb-6 font-bold text-gray-800 leading-tight">
                    Revolutionizing Africa's ICT Landscape
                    <span class="text-emerald-600">with GotelAfrica</span>
                </h1>
                <p class="mb-8 leading-relaxed text-gray-600 text-lg">
                    GotelAfrica, an ICT vendor registered with the Nigeria Corporate Affairs Commission, is dedicated to catalyzing innovation and progress across Africa. We're committed to creating employment opportunities, empowering the continent's youth, and spearheading technological advancement.
                </p>
                <div class="flex justify-center gap-4">
                    <a href="#mission" class="inline-flex text-white bg-emerald-600 border-0 py-3 px-6 focus:outline-none hover:bg-emerald-700 rounded-lg text-lg font-medium transition-all hover:shadow-lg">
                        Our Mission
                    </a>
                    <a href="#services" class="inline-flex text-emerald-700 bg-white border-2 border-emerald-600 py-3 px-6 focus:outline-none hover:bg-gray-50 rounded-lg text-lg font-medium transition-all hover:shadow-lg">
                        Our Services
                    </a>
                </div>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img class="object-cover object-center rounded-lg shadow-xl" alt="hero" src="/images/111.png" />
            </div>
        </div>
    </section>



    <!-- Mission Section -->
    <section id="mission" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="heading-font text-4xl font-bold text-gray-800 mb-4">Our Mission & Vision</h2>
                <div class="w-20 h-1 bg-emerald-500 mx-auto"></div>
            </div>

            <div class="flex flex-wrap items-center">
                <div class="w-full lg:w-1/2 px-4 mb-12 lg:mb-0">
                    <div class="bg-gray-50 p-8 rounded-xl shadow-md">
                        <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-bullseye text-emerald-600 text-2xl"></i>
                        </div>
                        <h3 class="heading-font text-2xl font-bold text-gray-800 mb-4">Our Mission</h3>
                        <p class="text-gray-600 mb-6">
                            To empower African businesses and individuals through cutting-edge ICT solutions that drive growth, innovation, and digital transformation across the continent.
                        </p>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-emerald-500 mt-1 mr-3"></i>
                                <span class="text-gray-600">Bridge the digital divide in Africa</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-emerald-500 mt-1 mr-3"></i>
                                <span class="text-gray-600">Create sustainable employment opportunities</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-emerald-500 mt-1 mr-3"></i>
                                <span class="text-gray-600">Foster technological innovation</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 px-4">
                    <div class="bg-gray-50 p-8 rounded-xl shadow-md">
                        <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-eye text-emerald-600 text-2xl"></i>
                        </div>
                        <h3 class="heading-font text-2xl font-bold text-gray-800 mb-4">Our Vision</h3>
                        <p class="text-gray-600 mb-6">
                            To be Africa's leading ICT solutions provider, recognized for our commitment to excellence, innovation, and the transformative power of technology in driving economic and social development.
                        </p>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-emerald-500 mt-1 mr-3"></i>
                                <span class="text-gray-600">Digital transformation across Africa</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-emerald-500 mt-1 mr-3"></i>
                                <span class="text-gray-600">Youth empowerment through tech</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-emerald-500 mt-1 mr-3"></i>
                                <span class="text-gray-600">Sustainable technological growth</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <!-- CTA Section -->
    <section class="py-20 bg-gray-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="heading-font text-4xl font-bold mb-6">Ready to Transform Your Business?</h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto mb-8">
                Partner with GotelAfrica today and take your business to the next level with our innovative ICT solutions.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/contact" class="inline-flex text-white bg-emerald-600 border-0 py-3 px-8 focus:outline-none hover:bg-emerald-700 rounded-lg text-lg font-medium transition-all hover:shadow-lg">
                    <i class="fas fa-envelope mr-2"></i> Contact Us
                </a>
                <a href="#" class="inline-flex text-white bg-transparent border-2 border-white py-3 px-8 focus:outline-none hover:bg-white hover:text-gray-800 rounded-lg text-lg font-medium transition-all hover:shadow-lg">
                    <i class="fas fa-phone-alt mr-2"></i> Call Us
                </a>
            </div>
        </div>
    </section>

    @include('components.bottom-navbar')
</body>
</html>