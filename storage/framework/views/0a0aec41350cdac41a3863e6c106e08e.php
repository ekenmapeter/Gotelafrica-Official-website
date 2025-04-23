<?php echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="flex flex-col h-screen items-center justify-center">
    <div class="flex gap-8 py-4 mt-8">
        <!-- Inside your Blade view file -->
<a href="<?php echo e(url()->previous()); ?>" class=" bg-black text-white font-bold py-2 px-4 rounded">
Back
</a>
<p class="text-white text-2xl font-bold">My Team</p>

    </div>    <div class="flex gap-2 py-4 lg:w-1/2 w-full px-4">
        <div class="w-full bg-black text-white text-center lg:px-0 px-4 py-4 rounded-lg">

            <div class="w-full">
                <div class="text-center">
                    <p class="text-white text-sm">Team Size</p>
                    <?php if(isset($teamSize)): ?>
                    <p class="text-white text-1xl"><?php echo e($teamSize); ?></p>
                        <?php else: ?>
                        <p class="text-white text-1xl">0</p>
                        <?php endif; ?>

                </div>

            </div>
        </div>

        <div class="w-full bg-black text-white text-center lg:px-0 px-4 py-4 rounded-lg">

            <div class="w-full ">
                <div class="text-center">
                    <p class="text-white text-sm">Valid team</p>
                    <?php if(isset($teamSize)): ?>
                    <p class="text-white text-1xl"><?php echo e($validTeam); ?></p>
                        <?php else: ?>
                        <p class="text-white text-1xl">0</p>
                        <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <div class="flex gap-2 py-4 lg:w-1/2 w-full px-4">
        <div class="w-full bg-black text-white text-center lg:px-0 px-4 py-4 rounded-lg">

            <div class="w-full">
                <div class="text-center">
                    <p class="text-white text-sm">Invitation</p>
                    <?php if(isset($teamSize)): ?>
                    <p class="text-white text-1xl"><?php echo e($invitation); ?></p>
                        <?php else: ?>
                        <p class="text-white text-1xl">0</p>
                        <?php endif; ?>

                </div>

            </div>
        </div>

    </div>


    <div class="w-1/2 mx-auto mt-4 text-black font-semibold">

        <ul id="tabs" class="inline-flex p-2 w-full border-b [&>*]:border-black border-black">
            <li class="p-2 cursor-pointer rounded-t-md border-t border-l border-r -mb-2 bg-white active" tab-to="first">
                A - Team
            </li>

        </ul>

        <div id="tab-contents">
            <div class="p-4 active" tab-id="first">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">Phone</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $a_downlione; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?php echo e($data->phone); ?></td>
                                    <td class="px-6 py-4"><?php echo e($data->email); ?></td>
                                    <td class="px-6 py-4"><?php echo e(\Carbon\Carbon::parse($data->created_at)->format('g:i A')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if($a_downlione->isEmpty()): ?>
                                <!-- Display a row indicating no transactions found -->
                                <tr class="bg-white border-b">
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No Downline Found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <!-- Add Pagination Links -->
                    <div class="mt-4">
                        <?php echo e($a_downlione->links()); ?>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>




<script>
    document.querySelectorAll('#tabs [tab-to]').forEach(function(item) {
    item.addEventListener('click', function(e) {
        let link = this.getAttribute('tab-to');
        let active_content = document.querySelector('#tab-contents .active');
        let tab_el = document.querySelector('#tab-contents [tab-id="' + link + '"]');
        let active_tab = document.querySelector('#tabs .active')

        active_content.classList.remove("active");
        active_content.classList.add("hidden");

        tab_el.classList.remove("hidden");
        tab_el.classList.add("active");

        active_tab.classList.remove("active", "rounded-t-md", "border-t", "border-l", "border-r", "-mb-2", "bg-white");
        this.classList.add("active", "rounded-t-md", "border-t", "border-l", "border-r", "-mb-2", "bg-white");
    });
});
</script>

<?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views\team.blade.php ENDPATH**/ ?>