<?php echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="flex gap-8 py-4 mt-28 items-center justify-center">
    <!-- Inside your Blade view file -->
<a href="<?php echo e(route('dashboard')); ?>" class=" bg-black text-white font-bold py-2 px-4 rounded">
Back
</a>
<p class="text-white text-2xl font-bold">Products</p>

</div>
<div class="flex flex-col items-center justify-center">
    <div class="flex lg:w-1/2 w-full gap-4 bg-black text-white text-center py-4 lg:px-12 px-4 rounded-lg">
        <p class="text-red-500 text-sm">Product</p>
        <p class="text-white text-sm">On Shelves</p>
    </div>
    <?php $__currentLoopData = $get_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="flex lg:w-1/2 w-full gap-2 bg-black text-white text-center  px-4 py-4 mt-4 rounded-lg">
        <div>
            <img src="product_image/<?php echo e($data->image); ?>" class="w-28 h-24 rounded-lg" />
        </div>
        <div class="flex w-full justify-between">
            <div class="text-left">
                <p class="text-white text-sm">Price</p>
                <p class="text-white text-sm">Daily Income</p>
                <p class="text-white text-sm">Validity Period</p>
                <p class="text-white text-sm">Total Income</p>
                <p class="text-white text-sm">Business Value</p>
            </div>
            <div class="text-right">
                <p class="text-white text-sm">₦<?php echo e(number_format($data->price, 2)); ?></p>
                <p class="text-white text-sm">₦<?php echo e(number_format($data->daily_income, 2)); ?></p>
                <p class="text-white text-sm"> <?php echo e($data->validity_period); ?> Days</p>
                <p class="text-white text-sm">₦<?php echo e(number_format($data->total_income , 2)); ?></p>
                <p class="text-white text-sm"> <?php echo e($data->business_value); ?></p>
                <a href="<?php echo e(route('invest', $data->id)); ?>" class="text-black text-sm px-2 py-1 bg-green-400 rounded-lg">Invest Now</a>
            </div> 

        </div>
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($get_product->isEmpty()): ?>

            <p colspan="5" class="px-6 py-4 text-center text-gray-500">No Product Available</p>

    <?php endif; ?>

</div>






<?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views\product.blade.php ENDPATH**/ ?>