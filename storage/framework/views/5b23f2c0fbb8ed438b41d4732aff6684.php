<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <div class="flex flex-col items-center justify-center px-2 py-8  mb-44">
        <p class="text-white text-2xl font-bold">Administrator Panel</p>



        <div class="flex flex-col gap-2 py-4 lg:w-1/2 mt-2 w-full lg:px-4 px-2 bg-gray-700 rounded-lg">
            <div class="flex gap-4 w-full text-white text-center lg:px-4 px-4 py-4 rounded-lg">
                <div class="w-full">
                    <div class="text-left">
                        <p class="text-white text-sm">Total User</p>
                        <p class="text-white text-3xl font-extrabold"><?php echo e($totalUsers); ?></p>

                    </div>
                </div>
                <div class="w-full">
                    <div class="text-left">
                        <p class="text-white text-sm">Total Wallet</p>
                        <p class="text-white text-3xl font-extrabold">₦<?php echo e(number_format($totalWallet, 2)); ?></p>

                    </div>
                </div>

                <div class="w-full">
                    <div class="text-left">
                        <p class="text-white text-sm">Total Transaction</p>
                        <p class="text-white text-3xl font-extrabold"><?php echo e($totalTransaction); ?></p>

                    </div>
                </div>
            </div>

            <div class="flex gap-4 w-full bg-black text-white text-center lg:px-12 px-4 py-4 rounded-lg">
                <div class="w-full">
                    <div class="text-left">
                        <p class="text-white text-sm">Active Investment</p>

                        <p class="text-white text-1xl font-extrabold"><?php echo e($totalActiveInvestment); ?></p>
                    </div>
                </div>
                <div class="w-full">
                    <div class="text-left">
                        <p class="text-white text-sm">Total Asset</p>

                        <p class="text-white text-1xl font-extrabold">₦<?php echo e(number_format($total_asset, 2)); ?></p>

                    </div>
                </div>

                <div class="w-full">
                    <div class="text-left">
                        <p class="text-white text-sm">Total Products</p>

                        <p class="text-white text-1xl font-extrabold"><?php echo e($totalProduct); ?></p>


                    </div>
                </div>
            </div>

        </div>

        <div class="flex bg-black mt-2 items-center lg:gap-20 gap-4 justify-center py-4 lg:px-12 px-2 rounded-lg">
            <a href="<?php echo e(route('all-transaction')); ?>" class="flex flex-col items-center justify-center">
                <svg class="lg:w-14 w-6 lg:h-14 h-6 text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 0 19 9.5 9.5 0 0 0 0-19ZM8.374 17.4a7.6 7.6 0 0 1-5.9-7.4c0-.83.137-1.655.406-2.441l.239.019a3.887 3.887 0 0 1 2.082 2.5 4.1 4.1 0 0 0 2.441 2.8c1.148.522 1.389 2.007.732 4.522Zm3.6-8.829a.997.997 0 0 0-.027-.225 5.456 5.456 0 0 0-2.811-3.662c-.832-.527-1.347-.854-1.486-1.89a7.584 7.584 0 0 1 8.364 2.47c-1.387.208-2.14 2.237-2.14 3.307a1.187 1.187 0 0 1-1.9 0Zm1.626 8.053-.671-2.013a1.9 1.9 0 0 1 1.771-1.757l2.032.619a7.553 7.553 0 0 1-3.132 3.151Z" />
                </svg>
                <span class="mt-1 text-sm text-center text-white font-semibold">All Transaction</span>
            </a>

            <a href="<?php echo e(route('fund-wallet')); ?>" class="flex flex-col items-center justify-center">
                <svg class="lg:w-14 w-6 lg:h-14 h-6 text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                    <path
                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                    <path
                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                </svg>
                <span class="mt-1 text-sm text-center text-white font-semibold">Fund Account</span>
            </a>
            <a href="<?php echo e(route('withdraw-request')); ?>" class="flex flex-col items-center justify-center">
                <svg class="lg:w-14 w-6 lg:h-14 h-6 text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="m7.164 3.805-4.475.38L.327 6.546a1.114 1.114 0 0 0 .63 1.89l3.2.375 3.007-5.006ZM11.092 15.9l.472 3.14a1.114 1.114 0 0 0 1.89.63l2.36-2.362.38-4.475-5.102 3.067Zm8.617-14.283A1.613 1.613 0 0 0 18.383.291c-1.913-.33-5.811-.736-7.556 1.01-1.98 1.98-6.172 9.491-7.477 11.869a1.1 1.1 0 0 0 .193 1.316l.986.985.985.986a1.1 1.1 0 0 0 1.316.193c2.378-1.3 9.889-5.5 11.869-7.477 1.746-1.745 1.34-5.643 1.01-7.556Zm-3.873 6.268a2.63 2.63 0 1 1-3.72-3.72 2.63 2.63 0 0 1 3.72 3.72Z" />
                </svg>
                <span class="mt-1 text-sm text-center text-white font-semibold">Withdraw Request</span>
            </a>
            <a href="<?php echo e(route('deposit')); ?>" class="flex flex-col items-center justify-center">
                <svg class="lg:w-14 w-6 lg:h-14 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                  </svg>
                <span class="mt-1 text-sm text-center text-white font-semibold">Deposit</span>
            </a>
        </div>

        <div class="flex mb-44 flex-col gap-2 py-4 lg:w-1/2 mt-2 w-full px-4 bg-black rounded-lg space-y-4 ">
            <div class="flex gap-2 hover:bg-gray-500 hover:py-2 hover:px-2 hover:rounded-lg">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M15.077.019a4.658 4.658 0 0 0-4.083 4.714V7H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-1.006V4.68a2.624 2.624 0 0 1 2.271-2.67 2.5 2.5 0 0 1 2.729 2.49V8a1 1 0 0 0 2 0V4.5A4.505 4.505 0 0 0 15.077.019ZM9 15.167a1 1 0 1 1-2 0v-3a1 1 0 1 1 2 0v3Z" />
                </svg>
                <a href="<?php echo e(route('allusers')); ?>" class="flex justify-between w-full">
                    <span class="mt-1 text-sm text-center text-white font-semibold">All User</span>
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>

                </a>
            </div>
            <div class="flex gap-2 hover:bg-gray-500 hover:py-2 hover:px-2 hover:rounded-lg">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M19.728 10.686c-2.38 2.256-6.153 3.381-9.875 3.381-3.722 0-7.4-1.126-9.571-3.371L0 10.437V18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-7.6l-.272.286Z" />
                    <path
                        d="m.135 7.847 1.542 1.417c3.6 3.712 12.747 3.7 16.635.01L19.605 7.9A.98.98 0 0 1 20 7.652V6a2 2 0 0 0-2-2h-3V3a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v1H2a2 2 0 0 0-2 2v1.765c.047.024.092.051.135.082ZM10 10.25a1.25 1.25 0 1 1 0-2.5 1.25 1.25 0 0 1 0 2.5ZM7 3a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1H7V3Z" />
                </svg>
                <a href="<?php echo e(route('all-order')); ?>" class="flex justify-between w-full">
                    <span class="mt-1 text-sm text-center text-white font-semibold">All Order</span>
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                </a>
            </div>


            <div class="flex gap-2 hover:bg-gray-500 hover:py-2 hover:px-2 hover:rounded-lg">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                    <path d="M19 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1ZM2 6v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H2Zm11 3a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0h2a1 1 0 0 1 2 0v1Z"/>
                  </svg>
                <a href="<?php echo e(route('all-product')); ?>" class="flex justify-between w-full">
                    <span class="mt-1 text-sm text-center text-white font-semibold">All Product</span>
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>

                </a>
            </div>
            
            
            <div class="flex gap-2 hover:bg-gray-500 hover:py-2 hover:px-2 hover:rounded-lg">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                    <path d="M19 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1ZM2 6v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H2Zm11 3a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0h2a1 1 0 0 1 2 0v1Z"/>
                  </svg>
                <a href="<?php echo e(route('admin.contest')); ?>" class="flex justify-between w-full">
                    <span class="mt-1 text-sm text-center text-white font-semibold">All Contestant</span>
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>

                </a>
            </div
        </div>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /home/goteonji/public_html/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>