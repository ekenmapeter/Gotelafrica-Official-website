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
                    <a href="<?php echo e(route('administrator')); ?>" class="flex items-center gap-2 bg-white text-blue-600 font-medium py-2 px-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-200 border border-blue-100 hover:border-blue-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Back to Dashboard
                    </a>
                    <h1 class="text-2xl font-bold text-gray-800">User Management</h1>
                </div>

                <!-- Search Form -->
                <form method="GET" action="<?php echo e(route('allusers')); ?>" class="w-full md:w-auto">
                    <div class="relative flex items-center">
                        <input type="text" name="search" placeholder="Search users..."
                               class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm"
                               value="<?php echo e(request('search')); ?>">
                        <button type="submit" class="absolute right-2 p-1 text-gray-400 hover:text-gray-600">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total Users</p>
                            <p class="text-xl font-bold text-gray-800"><?php echo e($total_users ?? 0); ?></p>
                        </div>
                        <div class="bg-blue-100 p-2 rounded-full">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Active Today</p>
                            <p class="text-xl font-bold text-green-600"><?php echo e($active_today ?? 0); ?></p>
                        </div>
                        <div class="bg-green-100 p-2 rounded-full">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">New This Week</p>
                            <p class="text-xl font-bold text-purple-600"><?php echo e($new_this_week ?? 0); ?></p>
                        </div>
                        <div class="bg-purple-100 p-2 rounded-full">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Inactive Users</p>
                            <p class="text-xl font-bold text-red-600"><?php echo e($inactive_users ?? 0); ?></p>
                        </div>
                        <div class="bg-red-100 p-2 rounded-full">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-12.728 12.728M5.636 5.636l12.728 12.728"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Users Table -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registration</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                            <span class="text-blue-600 font-medium">
                                                <?php echo e(strtoupper(substr($user->first_name, 0, 1))); ?><?php echo e(strtoupper(substr($user->other_name, 0, 1))); ?>

                                            </span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                <?php echo e($user->first_name); ?> <?php echo e($user->other_name); ?>

                                            </div>
                                            <div class="text-sm text-gray-500">
                                                ID: <?php echo e($user->id); ?>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"><?php echo e($user->email); ?></div>
                                    <div class="text-sm text-gray-500"><?php echo e($user->phone); ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        <?php echo e($user->created_at->format('M d, Y')); ?>

                                    </div>
                                    <div class="text-sm text-gray-500">
                                        <?php echo e($user->created_at->diffForHumans()); ?>

                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                    <!-- View Button -->
                                    <a href="<?php echo e(route('admin.user.view', $user->id)); ?>" class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                        View
                                    </a>

                                    <!-- Delete Button -->
                                    <form method="POST" action="<?php echo e(route('delete/user', $user->id)); ?>" class="inline" x-data="{ confirmDelete() { if(confirm('Are you sure you want to delete this user? This action cannot be undone.')) { this.submit(); } } }">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="button" @click="confirmDelete" class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                    No users found
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <?php if($users->hasPages()): ?>
                <div class="px-6 py-3 bg-gray-50 border-t border-gray-200">
                    <?php echo e($users->appends(request()->query())->links()); ?>

                </div>
                <?php endif; ?>
            </div>
        </div>
        <br>
        <br>
        <br>

        <br>
    </div>

    <!-- User Modal -->
    <div x-data="userModal"
         x-show="userModalOpen"
         x-cloak
         class="fixed z-10 inset-0 overflow-y-auto"
         style="display: none;">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="userModalOpen = false">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Modal panel -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" x-text="currentUser ? currentUser.first_name + ' ' + currentUser.other_name : ''"></h3>

                            <!-- User Details -->
                            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="border-t border-gray-100 pt-2">
                                    <p class="text-sm font-medium text-gray-500">Email</p>
                                    <p class="mt-1 text-sm text-gray-900" x-text="currentUser?.email"></p>
                                </div>
                                <div class="border-t border-gray-100 pt-2">
                                    <p class="text-sm font-medium text-gray-500">Phone</p>
                                    <p class="mt-1 text-sm text-gray-900" x-text="currentUser?.phone"></p>
                                </div>
                                <div class="border-t border-gray-100 pt-2">
                                    <p class="text-sm font-medium text-gray-500">Wallet Balance</p>
                                    <p class="mt-1 text-sm text-gray-900" x-text="'₦' + (currentUser?.wallet?.balance || 0).toLocaleString()"></p>
                                </div>
                                <div class="border-t border-gray-100 pt-2">
                                    <p class="text-sm font-medium text-gray-500">Registration Date</p>
                                    <p class="mt-1 text-sm text-gray-900" x-text="currentUser ? new Date(currentUser.created_at).toLocaleDateString() : ''"></p>
                                </div>
                            </div>

                            <!-- Fund Management -->
                            <div class="mt-6 border-t border-gray-200 pt-4">
                                <h4 class="text-md font-medium text-gray-900 mb-4">Fund Management</h4>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Amount</label>
                                        <input type="number" x-model="amount" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Enter amount">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Type</label>
                                        <select x-model="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                            <option value="add">Add Funds</option>
                                            <option value="remove">Remove Funds</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Reason</label>
                                        <textarea x-model="reason" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" rows="3" placeholder="Enter reason for fund adjustment"></textarea>
                                    </div>
                                    <div class="flex justify-end space-x-3">
                                        <button @click="adjustFunds()"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                                :disabled="processing">
                                            <span x-show="!processing">Adjust Funds</span>
                                            <span x-show="processing" class="flex items-center">
                                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                </svg>
                                                Processing...
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" @click="userModalOpen = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        // Initialize Alpine.js data
        document.addEventListener('alpine:init', () => {
            Alpine.data('userModal', () => ({
                userModalOpen: false,
                currentUser: null,
                amount: '',
                type: 'add',
                reason: '',
                processing: false,

                openUserModal(userId) {
                    console.log('Opening modal for user:', userId); // Debug log
                    fetch(`/api/users/${userId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(user => {
                            console.log('User data received:', user); // Debug log
                            this.currentUser = user;
                            this.userModalOpen = true;
                            console.log('Modal state:', this.userModalOpen); // Debug log
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Failed to load user details');
                        });
                },

                adjustFunds() {
                    if (!this.amount || !this.reason) {
                        alert('Please fill in all fields');
                        return;
                    }

                    this.processing = true;
                    const userId = this.currentUser.id;
                    const data = {
                        amount: this.amount,
                        type: this.type,
                        reason: this.reason
                    };

                    fetch(`/api/users/${userId}/adjust-funds`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            this.currentUser.wallet.balance = result.new_balance;
                            alert(result.message);
                            this.amount = '';
                            this.reason = '';
                        } else {
                            alert(result.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while processing your request');
                    })
                    .finally(() => {
                        this.processing = false;
                    });
                }
            }));
        });
    </script>

    <style>
        [x-cloak] { display: none !important; }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views/admin/all_users.blade.php ENDPATH**/ ?>