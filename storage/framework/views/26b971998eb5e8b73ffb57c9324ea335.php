<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 px-4 py-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                <div class="flex items-center gap-4">
                    <a href="<?php echo e(route('allusers')); ?>" class="flex items-center gap-2 bg-white text-blue-600 font-medium py-2 px-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-200 border border-blue-100 hover:border-blue-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Back to Users
                    </a>
                    <h1 class="text-2xl font-bold text-gray-800">User Details</h1>
                </div>
            </div>

            <!-- User Details Card -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 mb-8">
                <div class="p-6">
                    <div class="flex items-center gap-6 mb-6">
                        <div class="h-20 w-20 rounded-full bg-blue-100 flex items-center justify-center">
                            <span class="text-2xl text-blue-600 font-medium">
                                <?php echo e(strtoupper(substr($user->first_name, 0, 1))); ?><?php echo e(strtoupper(substr($user->other_name, 0, 1))); ?>

                            </span>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900"><?php echo e($user->first_name); ?> <?php echo e($user->other_name); ?></h2>
                            <p class="text-gray-500">ID: <?php echo e($user->id); ?></p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Personal Information</h3>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Email</p>
                                    <p class="mt-1 text-sm text-gray-900"><?php echo e($user->email); ?></p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Phone</p>
                                    <p class="mt-1 text-sm text-gray-900"><?php echo e($user->phone); ?></p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Registration Date</p>
                                    <p class="mt-1 text-sm text-gray-900"><?php echo e($user->created_at->format('M d, Y')); ?></p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Wallet Information</h3>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Current Balance</p>
                                    <p class="mt-1 text-sm text-gray-900">₦<?php echo e(number_format($user->wallet->balance ?? 0, 2)); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fund Management Card -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-6">Fund Management</h3>
                    <form action="<?php echo e(route('admin.user.adjust-funds', $user->id)); ?>" method="POST" class="space-y-6">
                        <?php echo csrf_field(); ?>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                                <input type="number" name="amount" id="amount" step="0.01" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                       placeholder="Enter amount">
                            </div>
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                                <select name="type" id="type" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    <option value="add">Add Funds</option>
                                    <option value="remove">Remove Funds</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="reason" class="block text-sm font-medium text-gray-700">Reason</label>
                            <textarea name="reason" id="reason" rows="3" required
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                      placeholder="Enter reason for fund adjustment"></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Adjust Funds
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views/admin/user_view.blade.php ENDPATH**/ ?>