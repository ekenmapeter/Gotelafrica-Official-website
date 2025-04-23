<?php echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="flex flex-col h-screen items-center justify-center mt-44 px-2">
    <div class="flex gap-8 py-4">
        <!-- Inside your Blade view file -->
<a href="<?php echo e(url()->previous()); ?>" class=" bg-black text-white font-bold py-2 px-4 rounded">
Back
</a>
<p class="text-white text-2xl font-bold">Comments</p>

    </div>
    <div class="flex flex-col gap-2 py-4 lg:w-1/2 mt-2 w-full px-4 bg-black rounded-lg">
        <div class="flex gap-4 w-full bg-black text-white text-center lg:px-4 px-4 py-4 rounded-lg">
            <div>
                <img src="product_image/p1.jpg" class="w-20 h-20 rounded-lg" />
            </div>
            <div class="w-full">
                <div class="text-left">
                    <p class="text-white text-sm">John Doe</p>
                    <p class="text-white text-sm">To give you a head start building your new Laravel application, we are
                        happy to offer authentication and application starter kits.</p>

                </div>

            </div>
        </div>
        <div>
            <img src="product_image/p1.jpg" class="w-40 h-40 rounded-lg" />
        </div>
        <li class="flex items-center">
            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
            </svg>
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">03/12/23
                09:23:34</span>
        </li>

        <li class="flex items-center">
            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 18 18">
                <path
                    d="M3 7H1a1 1 0 0 0-1 1v8a2 2 0 0 0 4 0V8a1 1 0 0 0-1-1Zm12.954 0H12l1.558-4.5a1.778 1.778 0 0 0-3.331-1.06A24.859 24.859 0 0 1 6 6.8v9.586h.114C8.223 16.969 11.015 18 13.6 18c1.4 0 1.592-.526 1.88-1.317l2.354-7A2 2 0 0 0 15.954 7Z" />
            </svg>
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">23342 people think
                this is great</span>
        </li>

    </div>
    <div class="flex flex-col gap-2 py-4 lg:w-1/2 w-full px-4 bg-black rounded-lg mt-2">
        <div class="flex gap-4 w-full bg-black text-white text-center lg:px-4 px-4 py-4 rounded-lg">
            <div>
                <img src="product_image/p1.jpg" class="w-20 h-20 rounded-lg" />
            </div>
            <div class="w-full">
                <div class="text-left">
                    <p class="text-white text-sm">John Doe</p>
                    <p class="text-white text-sm">To give you a head start building your new Laravel application, we are
                        happy to offer authentication and application starter kits.</p>

                </div>

            </div>
        </div>
        <div>
            <img src="product_image/p1.jpg" class="w-40 h-40 rounded-lg" />
        </div>
        <li class="flex items-center">
            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
            </svg>
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">03/12/23
                09:23:34</span>
        </li>

        <li class="flex items-center">
            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 18 18">
                <path
                    d="M3 7H1a1 1 0 0 0-1 1v8a2 2 0 0 0 4 0V8a1 1 0 0 0-1-1Zm12.954 0H12l1.558-4.5a1.778 1.778 0 0 0-3.331-1.06A24.859 24.859 0 0 1 6 6.8v9.586h.114C8.223 16.969 11.015 18 13.6 18c1.4 0 1.592-.526 1.88-1.317l2.354-7A2 2 0 0 0 15.954 7Z" />
            </svg>
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">23342 people think
                this is great</span>
        </li>

    </div>



</div>





<?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views\community.blade.php ENDPATH**/ ?>