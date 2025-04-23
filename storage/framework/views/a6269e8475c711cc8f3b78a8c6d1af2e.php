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
        <h1 class="text-white text-3xl font-bold mb-8">Video Contest Dashboard</h1>

        <!-- Main Content Container with Sidebar -->
        <div class="w-full max-w-7xl flex flex-col md:flex-row gap-8">
            <!-- Sidebar with User Info -->
            <div class="w-full md:w-64 flex-shrink-0">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="text-center mb-4">
                        <div class="w-24 h-24 rounded-full bg-gray-200 mx-auto mb-4 overflow-hidden">
                            <?php if(auth()->user()->profile_photo_url): ?>
                                <img src="<?php echo e(auth()->user()->profile_photo_url); ?>" alt="<?php echo e(auth()->user()->name); ?>" class="w-full h-full object-cover">
                            <?php else: ?>
                                <svg class="w-full h-full text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            <?php endif; ?>
                        </div>
                        <h3 class="text-xl font-semibold"><?php echo e(auth()->user()->name); ?></h3>
                        <p class="text-gray-500 text-sm truncate"><?php echo e(auth()->user()->email); ?></p>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">Account Status</span>
                                <span class="px-2 py-1 text-xs rounded-full <?php echo e($userSubmission && $userSubmission->is_approved ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'); ?>">
                                    <?php echo e($userSubmission && $userSubmission->is_approved ? 'Approved' : 'Pending'); ?>

                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">Submissions</span>
                                <span class="text-sm font-medium"><?php echo e($contestEntries->where('user_id', auth()->id())->count()); ?></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">Total Votes</span>
                                <span class="text-sm font-medium"><?php echo e($contestEntries->where('user_id', auth()->id())->sum('votes_count')); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Add Logout Button -->
                    <div class="border-t border-gray-200 pt-4 mt-4">
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit"
                                    class="w-full px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors duration-200">
                                <div class="flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                                    </svg>
                                    Logout
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="flex-1 space-y-8">
                <!-- Upload Section -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-semibold mb-4">Share Your Video</h2>

                    <?php if($userSubmission && $userSubmission->is_approved): ?>
                        <?php if($contestEntries->where('user_id', auth()->id())->count() > 0): ?>
                            <div class="rounded-md bg-blue-50 p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-blue-800">Video Already Submitted</h3>
                                        <div class="mt-2 text-sm text-blue-700">
                                            <p>You have already submitted your video entry. Only one submission is allowed per participant.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <form id="uploadForm" action="<?php echo e(route('contest.upload')); ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
                                <?php echo csrf_field(); ?>
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">Video Title</label>
                                    <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                                </div>
                                <div>
                                    <label for="video" class="block text-sm font-medium text-gray-700">Upload Your Video</label>
                                    <input type="file" name="video" id="video" accept="video/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">

                                    <!-- Progress Bar Container -->
                                    <div id="progressContainer" class="hidden mt-4">
                                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                                            <div id="progressBar" class="bg-indigo-600 h-2.5 rounded-full" style="width: 0%"></div>
                                        </div>
                                        <div class="flex justify-between mt-1">
                                            <span id="progressText" class="text-sm text-gray-500">0%</span>
                                            <span id="uploadSpeed" class="text-sm text-gray-500">0 MB/s</span>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="submitButton" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Submit Entry
                                </button>
                            </form>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="rounded-md bg-yellow-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-yellow-800">Payment Approval Required</h3>
                                    <div class="mt-2 text-sm text-yellow-700">
                                        <p>
                                            <?php if(!$userSubmission): ?>
                                                Please submit your payment proof to participate in the video contest.
                                                <a href="<?php echo e(route('submission.create')); ?>" class="underline text-yellow-800 hover:text-yellow-900">
                                                    Click here to submit payment proof
                                                </a>
                                            <?php else: ?>
                                                Your payment proof is pending approval. You will be able to upload videos once approved.
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>


                <!-- Contest Entries Section -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-semibold mb-6">Contest Entries</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php $__empty_1 = true; $__currentLoopData = $contestEntries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="bg-gray-50 rounded-lg overflow-hidden shadow">
                                <div class="aspect-w-16 aspect-h-9">
                                    <?php if($entry->video_url): ?>
                                        <video class="w-full h-full object-cover" controls>
                                            <source src="<?php echo e($entry->video_url); ?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    <?php else: ?>
                                        <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                            <span class="text-gray-500">No video available</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold"><?php echo e($entry->title); ?></h3>
                                    <p class="text-sm text-gray-600 mt-1"><?php echo e($entry->description); ?></p>
                                    <div class="mt-4 flex items-center justify-between">
                                        <div class="flex items-center space-x-2">
                                            <span class="text-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                                </svg>
                                                <span class="ml-1"><?php echo e($entry->votes_count ?? 0); ?></span>
                                            </span>
                                        </div>
                                        <button onclick="copyShareLink(this)"
                                                class="inline-flex items-center px-3 py-1 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700"
                                                data-share-url="<?php echo e(route('contest.vote', ['shareToken' => $entry->share_token])); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                            </svg>
                                            Share
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-span-full text-center py-8 text-gray-500">
                                No contest entries yet. Be the first to submit!
                            </div>
                        <?php endif; ?>
                    </div>
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

<script>
function copyShareLink(button) {
    const shareUrl = button.dataset.shareUrl;
    navigator.clipboard.writeText(shareUrl).then(() => {
        // Change button text temporarily to show success
        const originalContent = button.innerHTML;
        button.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Copied!
        `;
        button.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
        button.classList.add('bg-green-600', 'hover:bg-green-700');

        setTimeout(() => {
            button.innerHTML = originalContent;
            button.classList.remove('bg-green-600', 'hover:bg-green-700');
            button.classList.add('bg-indigo-600', 'hover:bg-indigo-700');
        }, 2000);
    }).catch(() => {
        alert('Failed to copy link. Please try again.');
    });
}

// Add this script section at the bottom of your form
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.getElementById('uploadForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = this;
        const formData = new FormData(form);
        const submitButton = document.getElementById('submitButton');
        const progressContainer = document.getElementById('progressContainer');
        const progressBar = document.getElementById('progressBar');
        const progressText = document.getElementById('progressText');
        const uploadSpeed = document.getElementById('uploadSpeed');

        // Show progress bar
        progressContainer.classList.remove('hidden');
        submitButton.disabled = true;
        submitButton.classList.add('opacity-50');

        let startTime = Date.now();
        let lastLoaded = 0;

        axios.post(form.action, formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            onUploadProgress: function(progressEvent) {
                const percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                progressBar.style.width = percentCompleted + '%';
                progressText.textContent = percentCompleted + '%';

                // Calculate upload speed
                const currentTime = Date.now();
                const timeElapsed = (currentTime - startTime) / 1000; // in seconds
                const uploadedBytes = progressEvent.loaded - lastLoaded;
                const speed = (uploadedBytes / timeElapsed) / (1024 * 1024); // MB/s

                uploadSpeed.textContent = speed.toFixed(2) + ' MB/s';

                // Reset for next calculation
                startTime = currentTime;
                lastLoaded = progressEvent.loaded;
            }
        })
        .then(function(response) {
            if (response.data.redirect) {
                window.location.href = response.data.redirect;
            } else {
                window.location.reload();
            }
        })
        .catch(function(error) {
            console.error('Upload error:', error);
            alert('Error uploading video. Please try again.');
            submitButton.disabled = false;
            submitButton.classList.remove('opacity-50');
            progressContainer.classList.add('hidden');
        });
    });
</script>
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views\contest\dashboard.blade.php ENDPATH**/ ?>