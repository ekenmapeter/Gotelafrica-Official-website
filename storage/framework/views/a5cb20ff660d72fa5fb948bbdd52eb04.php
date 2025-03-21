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
<p class="text-white text-2xl font-bold">Customer Services</p>

        </div>
        <div class="flex w-1/2 gap-4 items-center justify-center">

<div class="row mt-2">
    <!-- item -->
    <div class="col-12">
        <a  href="javascript:void(0);"  data-href="7596070695" class="towhatsapp">
        <div class="iconedBox">
            <div class="iconWrap ">
                <img class="w-8 h-8 bg-black rounded-lg" src="images/app-outlined.png">
            </div>
            <h4 class="title">Whats apps</h4>
          <p class="mb-0"> The first contact, the account manager will provide you with professional and fast service</p>

        </div></a>
    </div>
    <!-- item -->
    <div class="divider mt-1 mb-2"></div>
    <!-- item -->
    <div class="col-12">
        <a href="javascript:void(0);" data-href="1" class="totelegram">
        <div class="iconedBox">
            <div class="iconWrap ">
                <img class="w-8 h-8 bg-black rounded-lg" src="images/app-outlined2.png">
            </div>
            <h4 class="title">
                    Telegrams</h4>
        <p class="mb-0">
                    If you don’t have WHATSAPP, you can contact your account manager via Telegram, which will do for you

                </p>

        </div></a>
    </div>

</div>

</div>

</div>
<?php echo $__env->make('components.live_chat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /home/goteonji/public_html/resources/views/customerservice.blade.php ENDPATH**/ ?>