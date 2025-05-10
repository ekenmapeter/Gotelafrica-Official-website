<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h2 class="text-2xl font-bold"><?php echo e($entry->title); ?></h2>
                        <a href="<?php echo e(route('creative.contest')); ?>" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-200 active:bg-gray-600 disabled:opacity-25 transition">
                            Back to Contest
                        </a>
                    </div>

                    <div class="aspect-w-16 aspect-h-9 mb-4">
                        <video class="w-full h-full object-cover" controls>
                            <source src="<?php echo e($entry->video_url); ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>

                    <p class="text-gray-600 mb-4"><?php echo e($entry->description); ?></p>

                    <div class="flex items-center space-x-4">
                        <button onclick="submitVote()" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-600 disabled:opacity-25 transition">
                            Vote for this entry
                        </button>
                        <span class="text-gray-600">Votes: <span id="voteCount"><?php echo e($entry->votes_count); ?></span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function submitVote() {
        fetch('<?php echo e(route('contest.vote.submit', $entry->share_token)); ?>', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('voteCount').textContent = data.new_count;
                alert('Thank you for your vote!');
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            alert('Error submitting vote. Please try again.');
        });
    }
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views/contest/vote.blade.php ENDPATH**/ ?>