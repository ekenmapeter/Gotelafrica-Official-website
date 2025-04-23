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
        <p class="text-white text-2xl font-bold py-4">Reset Password</p>

        <div class="flex lg:w-1/2 w-full gap-4 items-center justify-center">


            <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">


                <form class="flex flex-col" method="post" action="<?php echo e(route('resetPasswordSave')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="mb-2  flex flex-col">
                        <label for="cardholder-name" class="text-white">Old Password</label>
                        <input type="password" value="" name="old_password" id="cardholder-name"
                            class="border border-gray-300 rounded px-2 py-1" placeholder="">
                    </div>
                    <div class="mb-2  flex flex-col">
                        <label for="bank-account" class="text-white">New Password</label>
                        <input type="password" value="" name="new_password" id="bank-account"
                            class="border border-gray-300 rounded px-2 py-1" placeholder="">
                    </div>
                    <div class="mb-2  flex flex-col">
                        <label for="mobile" class="text-white">New Password</label>
                        <input type="password" value="" name="new_password" id="mobile"
                            class="border border-gray-300 rounded px-2 py-1" placeholder="">
                    </div>

                    <div>
                        <button type="submit"
                            class="bg-green-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full">
                            Comfirm
                        </button>
                    </div>
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
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views\resetpassword.blade.php ENDPATH**/ ?>