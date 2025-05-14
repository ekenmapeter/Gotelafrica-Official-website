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
<a href="<?php echo e(url()->previous()); ?>" class=" bg-black text-white font-bold py-2 px-4 rounded">
    Back
</a>
<p class="text-white text-2xl font-bold">Withdraw</p>

        </div>
        <div class="lg:flex grid grid-cols-1 lg:w-1/2 w-full gap-4 items-center justify-center">



            <div class="flex flex-col gap-2 py-4 lg:w-1/2 mt-2 w-full lg:px-4 px-2 bg-black rounded-lg">
                <div class="w-full">
                    <div class="text-left">
                        <p class="text-white text-sm">Balance</p>
                        <p class="text-white text-3xl font-extrabold">₦<?php echo e($wallet->balance); ?></p>

                    </div>
                </div>

            </div>

            <div
                class="w-full max-w-sm p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <p class="text-sm font-bold text-white px-4 mb-4">You can ADD your bank info in your <a href="<?php echo e(route('mybankaccount')); ?>" class="text-green-500"> Bank Setting</a></p>
                <form class="space-y-6" action="<?php echo e(route('withdraw_request')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label for="amount"
                            class="block mb-2 text-sm font-medium text-white">Withdraw Amount</label>
                        <input type="number" name="amount" id="amount" value=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                            placeholder="0.000" required>
                    </div>

                    <div>

                            <?php if($account): ?>
                            <label for="name"
                            class="block mb-2 text-sm font-medium text-white">Cardholder Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                value="<?php echo e($account->name); ?>" required readonly>
                          <?php else: ?>
                          <p class="text-red-600 font-extrabold">Add Account Details</p>
                            <?php endif; ?>

                    </div>

                    <div>

                             <?php if($account): ?>
                             <label for="bankname"
                            class="block mb-2 text-sm font-medium  text-white">Bank Name</label>
                        <input type="text" name="bankname" id="bankname"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                            value="<?php echo e($account->bankname); ?>" required readonly>
                            <?php else: ?>
                            <?php endif; ?>
                    </div>

                    <div>
                         <?php if($account): ?>
                             <label for="bankno"
                            class="block mb-2 text-sm font-medium  text-white">Account Number</label>
                        <input type="number" name="bankno" id="bankno"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                            value="<?php echo e($account->bankno); ?>" required readonly>
                            <?php else: ?>
                            <?php endif; ?>
                    </div>

                    <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>" />

                    <button type="submit"
                        class="w-full text-white bg-green-400 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Withdraw</button>

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
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views/withdraw.blade.php ENDPATH**/ ?>