<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Gotelafrica</title>
        <!-- Scripts -->

        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body class="bg-green-400 mb-44">
        <nav class="fixed w-full z-20 top-0 start-0 bg-black">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-1xl font-semibold whitespace-nowrap">Flowbite</span>
                </a>
                <div class="flex gap-2 md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <?php if(auth()->guard()->guest()): ?> <?php if(Route::has('register')): ?>
                    <a href="<?php echo e(route('register')); ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 text-center">Register</a>
                    <?php endif; ?>
                    <a href="<?php echo e(route('login')); ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Login</a>
                    <?php else: ?>
                    <a href="<?php echo e(url('/dashboard')); ?>" class="text-black bg-green-400 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 text-center">Dashboard</a>
                    <?php endif; ?>

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
                    <?php if(auth()->guard()->check()): ?>
                    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                        <li>
                            <a href="/" class="block py-2 px-3 text-white" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="/" class="block py-2 px-3 text-white" aria-current="page">About Us</a>
                        </li>
                        <li>
                            <a href="/" class="block py-2 px-3 text-white" aria-current="page">Contact Us</a>
                        </li>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </nav>

      <div class="flex flex-col items-center justify-center mt-44">
                    <p class="text-white font-bold text-5xl uppercase">404 Error</p>
                    <p class="text-3xl font-bold">Look like you're lost</p>
                    <a href="/" class="bg-black mt-4 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Home</a>
                </div>
            </div>
        </div>



        <?php echo $__env->make('components.bottom-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
    <script>
        var cont = 0;
        function loopSlider() {
            var xx = setInterval(function () {
                switch (cont) {
                    case 0: {
                        $("#slider-1").fadeOut(400);
                        $("#slider-2").delay(400).fadeIn(400);
                        $("#sButton1").removeClass("bg-purple-800");
                        $("#sButton2").addClass("bg-purple-800");
                        cont = 1;

                        break;
                    }
                    case 1: {
                        $("#slider-2").fadeOut(400);
                        $("#slider-1").delay(400).fadeIn(400);
                        $("#sButton2").removeClass("bg-purple-800");
                        $("#sButton1").addClass("bg-purple-800");

                        cont = 0;

                        break;
                    }
                }
            }, 8000);
        }

        function reinitLoop(time) {
            clearInterval(xx);
            setTimeout(loopSlider(), time);
        }

        function sliderButton1() {
            $("#slider-2").fadeOut(400);
            $("#slider-1").delay(400).fadeIn(400);
            $("#sButton2").removeClass("bg-purple-800");
            $("#sButton1").addClass("bg-purple-800");
            reinitLoop(4000);
            cont = 0;
        }

        function sliderButton2() {
            $("#slider-1").fadeOut(400);
            $("#slider-2").delay(400).fadeIn(400);
            $("#sButton1").removeClass("bg-purple-800");
            $("#sButton2").addClass("bg-purple-800");
            reinitLoop(4000);
            cont = 1;
        }

        $(window).ready(function () {
            $("#slider-2").hide();
            $("#sButton1").addClass("bg-purple-800");

            loopSlider();
        });
    </script>
</html>
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views/errors/404.blade.php ENDPATH**/ ?>