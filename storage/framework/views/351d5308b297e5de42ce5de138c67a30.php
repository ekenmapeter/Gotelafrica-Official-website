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
            <p class="text-white text-2xl font-bold">All Withdrawal Request</p>

        </div>

        <div class="flex flex-col w-1/2 gap-4 items-center justify-center">




            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID</th>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Date</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $withdrawal_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?php echo e($data->id); ?>

                                </td>
                                <td class="px-6 py-4"><a
                                        href="<?php echo e(route('admin/withdraw/details', $data->id)); ?>"><?php echo e($data->account_name); ?></a>
                                </td>
                                <td class="px-6 py-4"><?php echo e($data->amount); ?></td>
                                <td class="px-6 py-4">
                                    <?php if($data->status == 0): ?>
                                        <span class="text-yellow-600">Pending</span>
                                    <?php elseif($data->status == 1): ?>
                                        <span class="text-green-600">Approved</span>
                                    <?php elseif($data->status == 2): ?>
                                        <span class="text-red-600">Rejected</span>
                                    <?php else: ?>
                                        Unknown Status
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4"><?php echo e(\Carbon\Carbon::parse($data->created_at)->format('g:i A')); ?>

                                </td>

                                <?php if($data->status == 0): ?>
                                    <td class="px-6 py-4"><a href="<?php echo e(route('approve/withdraw', $data->id)); ?>"
                                            class="bg-yellow-500 text-white text-sm px-2 py-1 rounded-lg">Approve</a>
                                    </td>
                                <?php elseif($data->status == 1): ?>
                                    <td class="px-6 py-4"><a
                                            class="bg-green-500 text-white text-sm px-2 py-1 rounded-lg">Approved</a>
                                    </td>
                                <?php elseif($data->status == 2): ?>
                                    <td class="px-6 py-4"><a
                                            class="bg-red-500 text-white text-sm px-2 py-1 rounded-lg">Rejected</a></td>
                                <?php else: ?>
                                    Unknown Status
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($withdrawal_list->isEmpty()): ?>
                            <!-- Display a row indicating no transactions found -->
                            <tr class="bg-white border-b">
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No Withdrawal found</td>
                            </tr>
                        <?php endif; ?>

                        <!-- Pagination Links -->
                        <div class="mt-4">
                            <?php echo e($withdrawal_list->links()); ?>

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
<?php /**PATH /home/goteonji/public_html/resources/views/admin/withdraw_request.blade.php ENDPATH**/ ?>