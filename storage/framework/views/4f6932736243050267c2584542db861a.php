<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="flex flex-col items-center justify-center px-2 py-8 mb-44">
        <div class="flex gap-8 py-4">
            <!-- Inside your Blade view file -->
<a href="<?php echo e(route('administrator')); ?>" class=" bg-black text-white font-bold py-2 px-4 rounded">
    Back
</a>
<p class="text-white text-2xl font-bold">Fund Wallet</p>

        </div>

        <div class="flex lg:w-1/2 w-full gap-4 items-center justify-center">
            <div class="w-full max-w-sm p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 mb-44">
                <!-- Search Form -->
                <form action="<?php echo e(route('fund-wallet')); ?>" method="GET" class="mb-6">
                    <div class="relative">
                        <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 pr-10"
                               placeholder="Search users...">
                        <button type="submit" class="absolute right-2.5 bottom-2.5 text-gray-500 hover:text-gray-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </form>

                <form class="space-y-6" action="<?php echo e(route('admin-fund-wallet')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-white">Select User</label>
                        <select id="user" name="user" class="bg-gray-50 border border-gray-300 text-black font-extrabold hover:text-black text-sm rounded-lg block w-full p-2.5" required autocomplete="user">
                            <option value="" disabled selected>Select User</option>
                            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option class="hover:text-black" value="<?php echo e($data->id); ?>">
                                    <?php echo e($data->first_name); ?> <?php echo e($data->other_name); ?> (<?php echo e($data->email); ?>)
                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div>
                        <label for="type" class="block mb-2 text-sm font-medium text-white">Wallet Type</label>
                        <select id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required autocomplete="type">
                            <option value="" disabled selected>Select Wallet Type</option>
                            <option class="text-black" value="recharge">Recharge Wallet</option>
                            <option class="text-black" value="balance">Balance Account</option>
                        </select>
                    </div>
                    <div>
                        <label for="amount" class="block mb-2 text-sm font-medium text-white">Recharge Amount</label>
                        <input type="number" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="0.00" required>
                    </div>

                    <button type="submit" class="w-full text-white bg-green-400 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Confirm payment</button>
                </form>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views/admin/fund_wallet.blade.php ENDPATH**/ ?>