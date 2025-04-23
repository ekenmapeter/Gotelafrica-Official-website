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
            <p class="text-white text-2xl font-bold"># Transaction Details</p>

        </div>

        <div class="flex flex-col w-1/2 gap-4 items-center justify-center  mb-44 bg-gray-200">

            <div class="w-full">
                <div class="mt-5 w-full text-sm">
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div
                            class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-green-100 transition duration-150">
                            <p class="font-bold text-black">Payment Type</p>
                            <?php echo e($transaction->type); ?>

                        </div>
                        <div
                            class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-green-100 transition duration-150">
                            <p class="font-bold text-black">Payment Description</p>
                            <?php echo e($transaction->description); ?>

                        </div>
                        <div
                            class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-green-100 transition duration-150">
                            <p class="font-bold text-black">Amount</p>
                            <?php echo e($transaction->balance); ?>

                        </div>
                        <?php if($transaction->status == 0): ?>
                            <div
                                class="text-black font-extrabold py-4 pl-6 pr-3 w-full block bg-yellow-400  transition duration-150">
                                <p class="font-bold text-black">Status</p>
                                Pending
                            </div>
                        <?php elseif($transaction->status == 1): ?>
                            <div
                                class="text-black font-extrabold py-4 pl-6 pr-3 w-full block bg-green-400  transition duration-150">
                                <p class="font-bold text-black">Status</p>
                                Approved
                            </div>
                        <?php elseif($transaction->status == 2): ?>
                            <div
                                class="text-black font-extrabold py-4 pl-6 pr-3 w-full block bg-red-400  transition duration-150">
                                <p class="font-bold text-black">Status</p>
                                Rejected
                            </div>
                        <?php else: ?>
                            Unknown Status
                        <?php endif; ?>

                        <div
                            class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block transition duration-150">
                            <p class="font-bold text-black">Payment Proof</p>
                            <img src="<?php echo e(asset('payment_proof/' . $transaction->proof_payment)); ?>" alt="" onclick="showModal('<?php echo e(asset('payment_proof/' . $transaction->proof_payment)); ?>')" />
                            <a href="<?php echo e(asset('payment_proof/' . $transaction->proof_payment)); ?>" class="flex justify-center font-bold rounded-lg text-white bg-green-500 p-2 items-center mt-2" download>Download</a>
                        </div>



                    </div>
                </div>
            </div>



        </div>

    </div>
<?php echo $__env->make('components.image_preview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views\transaction_details.blade.php ENDPATH**/ ?>