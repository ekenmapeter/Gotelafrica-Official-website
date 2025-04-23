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
<a href="<?php echo e(route('dashboard')); ?>" class=" bg-black text-white font-bold py-2 px-4 rounded">
    Back
</a>
<p class="text-white text-2xl font-bold">Recharge</p>

        </div>
        <div class="flex lg:w-1/2 w-full gap-4 items-center justify-center">





<div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    <form class="space-y-6" action="<?php echo e(route('rechargePayment')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div>
            <p class="px-4 text-white font-extrabold">1027475790 -
                GOTELAFRICA COMPANY LIMITED,
                UBA</p>
        </div>
        <div>
            <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recharge Amount</label>
            <input type="number" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="" placeholder="0.00" required>
        </div>

        <div class="mt-1 form-group">
            <label class="text-white">Choose amount</label>
            <div class="grid grid-cols-3 gap-2">
                <button id="click" type="button" class="bg-green-400 px-2 py-2 text-white font-bold rounded-lg" data-item="25000">₦25,000</button>
                <button id="click" type="button" class="bg-green-400 px-2 py-2 text-white font-bold rounded-lg" data-item="50000">₦50,000</button>
                <button id="click" type="button" class="bg-green-400 px-2 py-2 text-white font-bold rounded-lg" data-item="100000">₦100,000</button>
                <button id="click" type="button" class="bg-green-400 px-2 py-2 text-white font-bold rounded-lg" data-item="500000">₦500,000</button>
                <button id="click" type="button" class="bg-green-400 px-2 py-2 text-white font-bold rounded-lg" data-item="1000000">₦1,000,000</button>
                <button id="click" type="button" class="bg-green-400 px-2 py-2 text-white font-bold rounded-lg" data-item="5000000">₦5,000,000</button>
                <button id="click" type="button" class="bg-green-400 px-2 py-2 text-white font-bold rounded-lg" data-item="10000000">₦10,000,000</button>
            </div>
        </div>


<div class="flex flex-col  w-full">
    <label class="text-white">Proof Of Payment</label>

    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-22 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
        <div class="flex flex-col items-center justify-center pt-2 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
        </div>
        <input id="dropzone-file" name="payment_proof" type="file" class="hidden" required/>
    </label>
</div>


        <button type="submit" class="w-full text-white bg-green-400 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Confirm payment</button>

    </form>
</div>



        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Get all the <p> elements with the specified class
    const amounts = document.querySelectorAll('#click');

    // Attach a click event listener to each <p> element
    amounts.forEach((amount) => {
        amount.addEventListener('click', function() {
            // Get the value from the 'data-item' attribute of the clicked <p> element
            const selectedItem = this.getAttribute('data-item');

            // Set the value of the input field to the selected value
            document.getElementById('amount').value = selectedItem;
        });
    });
});

    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views\recharge.blade.php ENDPATH**/ ?>