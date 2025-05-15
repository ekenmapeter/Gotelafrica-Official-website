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
                    <a href="<?php echo e(route('withdraw-request')); ?>" class="flex items-center gap-2 bg-white text-blue-600 font-medium py-2 px-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-200 border border-blue-100 hover:border-blue-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Back to Requests
                    </a>
                    <h1 class="text-2xl font-bold text-gray-800">Withdrawal Details #<?php echo e($details->id); ?></h1>
                </div>

                <div class="flex items-center gap-4">
                    <?php if(session()->has('impersonator_id')): ?>
                        <a href="<?php echo e(route('stop-impersonating')); ?>"
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Stop Impersonating
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('impersonate', $details->user_id)); ?>"
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Impersonate User
                        </a>
                    <?php endif; ?>

                    <?php if($details->status == 0): ?>
                        <button onclick="openRemoveFundsModal()"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Remove Funds
                        </button>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Withdrawal Details Card -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Withdrawal Information</h2>
                        <dl class="space-y-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Amount</dt>
                                <dd class="mt-1 text-2xl font-bold text-gray-900">₦<?php echo e(number_format($details->amount, 2)); ?></dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Status</dt>
                                <dd class="mt-1">
                                    <?php if($details->status == 0): ?>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Pending
                                        </span>
                                    <?php elseif($details->status == 1): ?>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Approved
                                        </span>
                                    <?php else: ?>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Rejected
                                        </span>
                                    <?php endif; ?>
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Request Date</dt>
                                <dd class="mt-1 text-sm text-gray-900"><?php echo e($details->created_at->format('M d, Y h:i A')); ?></dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Bank Details Card -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Bank Information</h2>
                        <dl class="space-y-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Account Name</dt>
                                <dd class="mt-1 text-sm text-gray-900"><?php echo e($details->account_name); ?></dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Account Number</dt>
                                <dd class="mt-1 text-sm text-gray-900"><?php echo e($details->account_number); ?></dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Bank Name</dt>
                                <dd class="mt-1 text-sm text-gray-900"><?php echo e($details->bank_name); ?></dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <?php if($details->status == 0): ?>
            <div class="mt-8 flex justify-end gap-4">
                <a href="<?php echo e(route('approve/withdraw', $details->id)); ?>"
                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Approve Withdrawal
                </a>
                <a href="<?php echo e(route('reject/withdraw', $details->id)); ?>"
                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Reject Withdrawal
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Remove Funds Modal -->
    <div id="removeFundsModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden transition-opacity">
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Remove Funds</h3>
                        <form action="<?php echo e(route('admin.remove-funds')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="user_id" value="<?php echo e($details->user_id); ?>">
                            <div class="mb-4">
                                <label for="amount" class="block text-sm font-medium text-gray-700">Amount to Remove</label>
                                <input type="number" name="amount" id="amount" step="0.01" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                                <button type="submit"
                                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:col-start-2 sm:text-sm">
                                    Remove Funds
                                </button>
                                <button type="button" onclick="closeRemoveFundsModal()"
                                        class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:col-start-1 sm:mt-0 sm:text-sm">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openRemoveFundsModal() {
            document.getElementById('removeFundsModal').classList.remove('hidden');
        }

        function closeRemoveFundsModal() {
            document.getElementById('removeFundsModal').classList.add('hidden');
        }
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views/admin/withdrawDetails.blade.php ENDPATH**/ ?>