<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="flex flex-col px-4 py-8 mb-44">
        <!-- Header Section -->
        <div class="max-w-7xl mx-auto w-full mb-8">
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center gap-4">
                    <a href="<?php echo e(route('administrator')); ?>" class="bg-black text-white font-bold py-2 px-4 rounded hover:bg-gray-800">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                            Back
                        </div>
                    </a>
                    <h1 class="text-white text-2xl font-bold">Contest Management</h1>
                </div>
                <div class="flex gap-4">
                    <div class="bg-blue-500 p-4 rounded-lg text-white text-center">
                        <div class="text-2xl font-bold"><?php echo e($submissions->total()); ?></div>
                        <div class="text-sm">Total Submissions</div>
                    </div>
                    <div class="bg-green-500 p-4 rounded-lg text-white text-center">
                        <div class="text-2xl font-bold"><?php echo e($submissions->where('is_approved', true)->count()); ?></div>
                        <div class="text-sm">Approved</div>
                    </div>
                    <div class="bg-yellow-500 p-4 rounded-lg text-white text-center">
                        <div class="text-2xl font-bold"><?php echo e($submissions->where('is_approved', false)->count()); ?></div>
                        <div class="text-sm">Pending</div>
                    </div>
                </div>
            </div>

            <!-- Search and Filter Section -->
            <div class="bg-white p-4 rounded-lg shadow mb-6">
                <form action="<?php echo e(route('admin.contest')); ?>" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                        <input type="text"
                               name="search"
                               value="<?php echo e(request('search')); ?>"
                               placeholder="Search name or email..."
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">All Status</option>
                            <option value="approved" <?php echo e(request('status') == 'approved' ? 'selected' : ''); ?>>Approved</option>
                            <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                        <select name="sort" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="latest" <?php echo e(request('sort') == 'latest' ? 'selected' : ''); ?>>Latest First</option>
                            <option value="oldest" <?php echo e(request('sort') == 'oldest' ? 'selected' : ''); ?>>Oldest First</option>
                            <option value="votes" <?php echo e(request('sort') == 'votes' ? 'selected' : ''); ?>>Most Votes</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                            Apply Filters
                        </button>
                    </div>
                </form>
        </div>

            <!-- Main Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Phone</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Votes</th>
                            <th scope="col" class="px-6 py-3">Submitted</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $submissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    <?php echo e($submission->full_name); ?>

                                </td>
                                <td class="px-6 py-4"><?php echo e($submission->email); ?></td>
                                <td class="px-6 py-4"><?php echo e($submission->user->phone); ?></td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold <?php echo e($submission->is_approved ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'); ?>">
                                        <?php echo e($submission->is_approved ? 'Approved' : 'Pending'); ?>

                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <span class="font-medium">
                                            <?php if($submission->user && $submission->user->contestEntries): ?>
                                                <?php echo e($submission->user->contestEntries->sum('votes_count')); ?>

                                            <?php else: ?>
                                                0
                                            <?php endif; ?>
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                        </svg>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo e($submission->created_at->format('M d, Y H:i')); ?>

                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                    <?php if(!$submission->is_approved): ?>
                                            <button onclick="approveSubmission(<?php echo e($submission->id); ?>)"
                                                    class="bg-green-500 text-white text-sm px-3 py-1 rounded-lg hover:bg-green-600">
                                                Approve
                                            </button>
                                    <?php endif; ?>
                                        <button onclick="viewDetails(<?php echo e($submission->id); ?>)"
                                                class="bg-blue-500 text-white text-sm px-3 py-1 rounded-lg hover:bg-blue-600">
                                            View
                                        </button>
                                        <button onclick="deleteSubmission(<?php echo e($submission->id); ?>)"
                                                class="bg-red-500 text-white text-sm px-3 py-1 rounded-lg hover:bg-red-600">
                                            Delete
                                                            </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                    No submissions found
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="px-6 py-4 bg-gray-50">
                    <?php echo e($submissions->withQueryString()->links()); ?>

                </div>
            </div>
        </div>
    </div>

    <!-- View Modal (Keep your existing modal code) -->
    <!-- ... existing modal code ... -->

    <?php $__env->startPush('scripts'); ?>
    <script>
        function approveSubmission(id) {
            if (confirm('Are you sure you want to approve this submission?')) {
                fetch(`/admin/submission/${id}/approve`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                        'Content-Type': 'application/json'
                    }
                }).then(response => {
                    if (response.ok) {
                        window.location.reload();
                    }
                });
            }
        }

        function deleteSubmission(id) {
            if (confirm('Are you sure you want to delete this submission?')) {
                fetch(`/admin/submission/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                        'Content-Type': 'application/json'
                    }
                }).then(response => {
                    if (response.ok) {
                        window.location.reload();
                    }
                });
            }
        }
    </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views/admin/contest.blade.php ENDPATH**/ ?>