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
            <a href="<?php echo e(url()->previous()); ?>" class=" bg-black text-white font-bold py-2 px-4 rounded">
                Back
            </a>
            <p class="text-white text-2xl font-bold">My Account</p>

        </div>

        <div class="w-5/6 md:w-5/6  lg:w-4/6 xl:w-3/6 mx-auto">
            <div class="mt-16 mb-16 bg-white border-b shadow-lg roundedshadow-blue-500/50 py-8 rounded-lg">
                <div class="w-full">
                    <div class="mt-5 w-full text-sm">
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <?php if($account): ?>
                                <div
                                    class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <p class="font-bold text-black">Cardholder Name</p>
                                    <?php echo e($account->name ?: 'null'); ?>

                                </div>
                                <div
                                    class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <p class="font-bold text-black">Bank Name</p>
                                    <?php echo e($account->bankname ?: 'null'); ?>

                                </div>
                                <div
                                    class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <p class="font-bold text-black">Bank Account</p>
                                    <?php echo e($account->bankno ?: 'null'); ?>

                                </div>
                                <div
                                    class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <p class="font-bold text-black">Mobile</p>
                                    <?php echo e($account->phone ?: 'null'); ?>

                                </div>
                                <div
                                    class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <p class="font-bold text-black">Withdraw password</p>
                                    <?php echo e($account->withdrawpassword ?: 'null'); ?>

                                </div>
                            <?php else: ?>
                                <!-- If $account is null, display default values or 'null' -->
                                <div
                                    class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <p class="font-bold text-black">Cardholder Name</p>
                                    Empty
                                </div>
                                <div
                                    class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <p class="font-bold text-black">Bank Name</p>
                                    Empty
                                </div>
                                <div
                                    class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <p class="font-bold text-black">Bank Account</p>
                                    Empty
                                </div>
                                <div
                                    class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <p class="font-bold text-black">Mobile</p>
                                    Empty
                                </div>
                                <div
                                    class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <p class="font-bold text-black">Withdraw password</p>
                                    Empty
                                </div>
                            <?php endif; ?>


                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center pb-6 pt-12">
                    <div id="basicModal" x-data="{ open: false }" @open-me="open=false" @close-me="open=true">
                        <button
                            class="block w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                            @click.prevent="open = true" aria-controls="basic-modal">Edit Account </button>
                        <div @keydown.window.escape="open = false" x-show="open" class="relative z-10"
                            aria-labelledby="modal-title" x-ref="dialog" aria-modal="true">

                            <div x-show="open" x-transition:enter="ease-out duration-300"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                x-description="Background backdrop, show/hide based on modal state."
                                class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>


                            <div class="fixed z-10 inset-0 overflow-y-auto">
                                <div
                                    class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">

                                    <div x-show="open" x-transition:enter="ease-out duration-300"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="ease-in duration-200"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-description="Modal panel, show/hide based on modal state."
                                        class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full"
                                        @click.away="open = false">
                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                            <form class="flex flex-col" method="post"
                                                action="<?php echo e(route('updateAccount')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <div class="mb-2 flex flex-col">
                                                    <label for="cardholder-name" class="text-white">Cardholder
                                                        Name</label>
                                                    <?php if($account): ?>
                                                    <input type="text" value="<?php echo e($account->name); ?>"
                                                    name="name" id="cardholder-name"
                                                    class="border border-gray-300 rounded px-2 py-1">
                                                    <?php else: ?>
                                                    <input type="text" value=""
                                                    name="name" id="cardholder-name"
                                                    class="border border-gray-300 rounded px-2 py-1"
                                                    placeholder="Cardholder Name">
                                                    <?php endif; ?>

                                                </div>
                                                <div class="mb-2 flex flex-col">
                                                    <label for="bank-name" class="text-white">Bank Name</label>
                                                    <select name="bankname" id="bankname"
                                                        class="border border-gray-300 rounded px-2 py-1">
                                                        <option value="0">Please select a bank</option>
                                                        <option value="Access Bank">Access Bank</option>
                                                        <option value="Fidelity Bank">Fidelity Bank</option>
                                                        <option value="Guaranty Trust Bank">Guaranty Trust Bank</option>
                                                        <option value="Polaris bank">Polaris bank</option>
                                                        <option value="Stanbic IBTC Bank">Stanbic IBTC Bank</option>
                                                        <option value="United Bank for Africa">United Bank for Africa
                                                        </option>
                                                        <option value="Keystone Bank">Keystone Bank</option>
                                                        <option value="Jaiz Bank">Jaiz Bank</option>
                                                        <option value="Heritage Bank">Heritage Bank</option>
                                                        <option value="Suntrust Bank">Suntrust Bank</option>
                                                        <option value="TCF MFB">TCF MFB</option>
                                                        <option value="Globus Bank">Globus Bank</option>
                                                        <option value="One Finance">One Finance</option>
                                                        <option value="Coronation Merchant Bank">Coronation Merchant
                                                            Bank</option>
                                                        <option value="Abbey Mortgage Bank">Abbey Mortgage Bank
                                                        </option>
                                                        <option value="Hasal Microfinance Bank">Hasal Microfinance Bank
                                                        </option>
                                                        <option value="Hackman Microfinance Bank">Hackman Microfinance
                                                            Bank</option>
                                                        <option value="Bowen Microfinance Bank">Bowen Microfinance Bank
                                                        </option>
                                                        <option value="CEMCS Microfinance Bank">CEMCS Microfinance Bank
                                                        </option>
                                                        <option value="Parallex Bank">Parallex Bank</option>
                                                        <option value="PALMPAY">PALMPAY</option>
                                                        <option value="Opay">Opay</option>
                                                    </select>
                                                    </select>
                                                </div>
                                                <div class="mb-2  flex flex-col">
                                                    <label for="bank-account" class="text-white">Account
                                                        Number</label>
                                                    <input type="text" value="" name="bankno"
                                                        id="bank-account"
                                                        class="border border-gray-300 rounded px-2 py-1"
                                                        placeholder="Bank Account">
                                                </div>
                                                <div class="mb-2  flex flex-col">
                                                    <label for="mobile" class="text-white">Mobile</label>
                                                    <input type="number" value="" name="phone"
                                                        id="mobile"
                                                        class="border border-gray-300 rounded px-2 py-1"
                                                        placeholder="Mobile phone">
                                                </div>
                                                <div class="mb-2  flex flex-col">
                                                    <label for="withdraw-password" class="text-white">Withdraw
                                                        password</label>
                                                    <input type="password" name="withdrawpassword"
                                                        id="withdrawpassword"
                                                        class="border border-gray-300 rounded px-2 py-1"
                                                        placeholder="Withdraw password">
                                                </div>

                                                <div class="text-sm mb-2 text-yellow-600">
                                                    * Cardholder name (5-30 characters).<br>
                                                    * Mobile number is 10 digits.
                                                </div>

                                                <div>
                                                    <button type="submit"
                                                        class="bg-green-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full">
                                                        Save Account
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
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
<?php /**PATH C:\xampp\htdocs\Gotelafrica-Official-website\resources\views\mybankaccount.blade.php ENDPATH**/ ?>