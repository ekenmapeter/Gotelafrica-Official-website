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
            <p class="text-white text-2xl font-bold">All Ruuning Order</p>

        </div>

        <div class="flex flex-col w-1/2 gap-4 items-center justify-center">




            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">User</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                            <th scope="col" class="px-6 py-3">Started</th>
                            <th scope="col" class="px-6 py-3">Daily Income</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $running_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?php echo e($data->name); ?>

                                </td>
                                <td class="px-6 py-4"><a
                                        href=""><?php echo e($data->user_id); ?></a>
                                </td>
                                <td class="px-6 py-4"><?php echo e($data->price); ?></td>
                                <td class="px-6 py-4"><?php echo e(\Carbon\Carbon::parse($data->created_at)->format('g:i A')); ?>

                                </td>

                                    <td class="px-6 py-4 flex gap-2">
                                        <?php echo e($data->daily_income); ?>

                                    </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($running_product->isEmpty()): ?>
                            <!-- Display a row indicating no transactions found -->
                            <tr class="bg-white border-b">
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No Order found</td>
                            </tr>
                        <?php endif; ?>

                        <!-- Pagination Links -->
                        <div class="mt-4">
                            <?php echo e($running_product->links()); ?>

                        </div>
                    </tbody>
                </table>

            </div>


        </div>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views\admin\all_order.blade.php ENDPATH**/ ?>