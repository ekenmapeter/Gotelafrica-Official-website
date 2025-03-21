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
            <a href="<?php echo e(route('administrator')); ?>" class="bg-black text-white font-bold py-2 px-4 rounded">
                Back
            </a>
            <div class="flex items-center gap-4">
                <p class="text-white text-2xl font-bold">All Submissions</p>
                <span class="bg-blue-500 text-white text-sm px-3 py-1 rounded-full">
                    Total: <?php echo e($submissions->total()); ?>

                </span>
            </div>
        </div>
        <div class="flex flex-col w-1/2 gap-4 items-center justify-center">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Phone</th>
                            <th scope="col" class="px-6 py-3">Description</th>
                            <th scope="col" class="px-6 py-3">Submitted</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $submissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <?php echo e($submission->full_name); ?>

                                </td>
                                <td class="px-6 py-4"><?php echo e($submission->email); ?></td>
                                <td class="px-6 py-4"><?php echo e($submission->phone); ?></td>
                                <td class="px-6 py-4"><?php echo e(Str::limit($submission->description, 40)); ?></td>
                                <td class="px-6 py-4">
                                    <?php echo e(\Carbon\Carbon::parse($submission->created_at)->format('M d, Y H:i')); ?>

                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    <a href="<?php echo e(route('delete/submission', $submission->id)); ?>" 
                                       class="bg-red-500 text-white text-sm px-2 py-1 rounded-lg">
                                        Delete
                                    </a>
                                    <!-- View Modal -->
                                    <div id="basicModal" x-data="{ open: false }" @open-me="open=false" @close-me="open=true">
                                        <button class="bg-blue-700 p-2 text-sm rounded text-white"
                                                @click.prevent="open = true"
                                                aria-controls="basic-modal">
                                            View
                                        </button>
                                        <div @keydown.window.escape="open = false" x-show="open" class="relative z-10" aria-labelledby="modal-title" x-ref="dialog" aria-modal="true">
                                            <div x-show="open" x-transition:enter="ease-out duration-300" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                                            <div class="fixed z-10 inset-0 overflow-y-auto">
                                                <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                                                    <div x-show="open" x-transition:enter="ease-out duration-300" class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full" @click.away="open = false">
                                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                            <div class="grid md:grid-cols-2 md:gap-6">
                                                                <div class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3">
                                                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Full Name</p>
                                                                    <?php echo e($submission->full_name); ?>

                                                                </div>
                                                                <div class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3">
                                                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Email</p>
                                                                    <?php echo e($submission->email); ?>

                                                                </div>
                                                                <div class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3">
                                                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Email</p>
                                                                    <?php echo e($submission->phone); ?>

                                                                </div>
                                                                <div class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3">
                                                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Description</p>
                                                                    <?php echo e($submission->description); ?>

                                                                </div>
                                                                <div class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3">
                                                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Payment Proof</p>
                                                                    <a href="https://apply.gotelafrica.com/uploads/<?php echo e($submission->payment_proof); ?>" 
                                                                       class="text-blue-500 hover:underline"
                                                                       target="_blank">
                                                                        View Document
                                                                    </a>
                                                                </div>
                                                                <div class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3">
                                                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Submission ID</p>
                                                                    <?php echo e($submission->submission_id); ?>

                                                                </div>
                                                                <div class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3">
                                                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Submitted At</p>
                                                                    <?php if($submission->created_at): ?>
                                                                        <?php echo e($submission->created_at->format('M d, Y H:i')); ?>

                                                                    <?php else: ?>
                                                                        N/A
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($submissions->isEmpty()): ?>
                            <tr class="bg-white border-b">
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No submissions found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                
                <!-- Pagination Links -->
                <div class="mt-4 px-4">
                    <?php echo e($submissions->links()); ?>

                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH /home/goteonji/public_html/resources/views/admin/contest.blade.php ENDPATH**/ ?>