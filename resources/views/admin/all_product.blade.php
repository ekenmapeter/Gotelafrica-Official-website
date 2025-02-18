<x-app-layout>
    <div class="flex flex-col items-center justify-center px-2 py-8 mb-44">
        <div class="flex gap-8 py-4">
            <!-- Inside your Blade view file -->
            <a href="{{ route('administrator') }}" class=" bg-black text-white font-bold py-2 px-4 rounded">
                Back
            </a>
            <p class="text-white text-2xl font-bold">All Product</p>

        </div>

        <div class="flex flex-col lg:w-3/5 w-full gap-4 items-center justify-center">




            <div class="relative overflow-x-auto">
                <!-- Main modal -->
                <div id="basicModal" x-data="{ open: false }" @open-me="open=false" @close-me="open=true">
                    <button class="bg-black p-2 mb-4 text-sm rounded text-white float-right md:mr-8 mr-2"
                        @click.prevent="open = true" aria-controls="basic-modal">Create Product</button>
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
                                        <form class="space-y-6" method="POST" action="{{ route('product-create') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div>
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-black font-extrabold">Product
                                                    Name</label>
                                                <input type="text" name="name" id="name"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    name="name" value="" placeholder="" required>
                                            </div>
                                            <div>

                                                <label for="description"
                                                    class="block mb-2 text-sm font-medium text-black">Description</label>
                                                <textarea id="description" name="description" rows="4"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                                    placeholder="Write about the product..."></textarea>

                                            </div>
                                            <div>
                                                <label for="price"
                                                    class="block mb-2 text-sm font-medium text-black font-extrabold">Product
                                                    Price </label>
                                                <input type="number" name="price" id="price"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    value="" placeholder="0.00" required>
                                            </div>
                                            <div>
                                                <label for="daily_income"
                                                    class="block mb-2 text-sm font-medium text-black font-extrabold">Daily
                                                    Income </label>
                                                <input type="number" name="daily_income" id="daily_income"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    value="" placeholder="" required>
                                            </div>
                                            <div>
                                                <label for="validity_period"
                                                    class="block mb-2 text-sm font-medium text-black font-extrabold">Validity
                                                    Period</label>
                                                <input type="number" name="validity_period" id="validity_period"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    value="" placeholder="30" required>
                                            </div>
                                            <div>
                                                <label for="total_income"
                                                    class="block mb-2 text-sm font-medium text-black font-extrabold">Total
                                                    Income</label>
                                                <input type="number" name="total_income" id="total_income"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    value="" placeholder="30" required>
                                            </div>
                                            <div>
                                                <label for="business_value"
                                                    class="block mb-2 text-sm font-medium text-black font-extrabold">Business
                                                    Value</label>
                                                <input type="number" name="business_value" id="business_value"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    value="" placeholder="30" required>
                                            </div>


                                            <label class="block mb-2 text-sm font-medium text-black font-extrabold"
                                                for="file_input">Upload file</label>
                                            <input
                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-500 focus:outline-none"
                                                aria-describedby="file_input_help" name="image" id="file_input"
                                                type="file">
                                            <p class="mt-1 text-sm text-black" id="file_input_help">PNG, JPG, JPEG.
                                            </p>



                                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                <button type="submit"
                                                    class="mt-3 w-full inline-flex justify-center rounded-md border text-white shadow-sm px-4 py-2 bg-green-600 text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                                    @click="open = false">
                                                    Create
                                                </button>
                                                <button type="button"
                                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 text-base font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                                    @click="open = false">
                                                    Cancel
                                                </button>
                                            </div>

                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main modal -->
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Date</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $data)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $data->name }}</td>
                                <td class="px-6 py-4 font-bold">{{ $data->price }}</td>
                                <td class="px-6 py-4">
                                    @if ($data->status == 0)
                                        <span class="px-2 py-1 text-white  rounded-lg bg-yellow-600">InActive</span>
                                    @elseif($data->status == 1)
                                        <span class="px-2 py-1 text-white  rounded-lg bg-green-600">Active</span>
                                    @else
                                        Unknown Status
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($data->created_at)->format('g:i A') }}
                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    @if ($data->status == 0)
                                        <a href="{{ route('product/activate', $data->id) }}"
                                            class="bg-green-600 text-white text-sm px-2 py-1 rounded-lg">Activate</a>
                                        <!-- Main modal -->
                                        <div id="basicModal" x-data="{ open: false }" @open-me="open=false"
                                            @close-me="open=true">
                                            <button class="bg-yellow-600 text-white text-sm px-2 py-1 rounded-lg"
                                                @click.prevent="open = true" aria-controls="basic-modal">Edit</button>
                                            <div @keydown.window.escape="open = false" x-show="open"
                                                class="relative z-10" aria-labelledby="modal-title" x-ref="dialog"
                                                aria-modal="true">

                                                <div x-show="open" x-transition:enter="ease-out duration-300"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100"
                                                    x-transition:leave="ease-in duration-200"
                                                    x-transition:leave-start="opacity-100"
                                                    x-transition:leave-end="opacity-0"
                                                    x-description="Background backdrop, show/hide based on modal state."
                                                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
                                                </div>


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
                                                                <form class="space-y-6" method="POST"
                                                                    action="{{ route('product-edit') }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div>
                                                                        <label for="name"
                                                                            class="block mb-2 text-sm font-medium text-black font-extrabold">Product
                                                                            Name</label>
                                                                        <input type="text" name="name"
                                                                            id="name"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                            name="name" value="{{ $data->name }}"
                                                                            placeholder="" required>
                                                                    </div>
                                                                    <div>

                                                                        <label for="description"
                                                                            class="block mb-2 text-sm font-medium text-black">Description</label>
                                                                        <textarea id="description" name="description" rows="4"
                                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ $data->description }}</textarea>

                                                                    </div>
                                                                    <div>
                                                                        <label for="price"
                                                                            class="block mb-2 text-sm font-medium text-black font-extrabold">Product
                                                                            Price </label>
                                                                        <input type="number" name="price"
                                                                            id="price"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                            value="{{ $data->price }}"
                                                                            placeholder="0.00" required>
                                                                    </div>
                                                                    <div>
                                                                        <label for="daily_income"
                                                                            class="block mb-2 text-sm font-medium text-black font-extrabold">Daily
                                                                            Income </label>
                                                                        <input type="number" name="daily_income"
                                                                            id="daily_income"
                                                                            value="{{ $data->daily_income }}"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                            value="" placeholder="" required>
                                                                    </div>
                                                                    <div>
                                                                        <label for="validity_period"
                                                                            class="block mb-2 text-sm font-medium text-black font-extrabold">Validity
                                                                            Period</label>
                                                                        <input type="number" name="validity_period"
                                                                            id="validity_period"
                                                                            value="{{ $data->validity_period }}"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                            value="" placeholder="30" required>
                                                                    </div>
                                                                    <div>
                                                                        <label for="total_income"
                                                                            class="block mb-2 text-sm font-medium text-black font-extrabold">Total
                                                                            Income</label>
                                                                        <input type="number" name="total_income"
                                                                            id="total_income"
                                                                            value="{{ $data->total_income }}"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                            value="" placeholder="30" required>
                                                                    </div>
                                                                    <div>
                                                                        <label for="business_value"
                                                                            class="block mb-2 text-sm font-medium text-black font-extrabold">Business
                                                                            Value</label>
                                                                        <input type="number" name="business_value"
                                                                            id="business_value"
                                                                            value="{{ $data->business_value }}"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                            value="" placeholder="30" required>
                                                                    </div>


                                                                    <label
                                                                        class="block mb-2 text-sm font-medium text-black font-extrabold"
                                                                        for="file_input">Upload file</label>

                                                                    <input
                                                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-no"
                                                                        name="image" id="file_input"
                                                                        value="{{ $data->image }}" type="file">
                                                                    <div
                                                                        class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                                        <button type="submit"
                                                                            class="mt-3 w-full inline-flex justify-center rounded-md border text-white shadow-sm px-4 py-2 bg-green-600 text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                                                            @click="open = false">
                                                                            Create
                                                                        </button>
                                                                        <button type="button"
                                                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 text-base font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                                                            @click="open = false">
                                                                            Cancel
                                                                        </button>
                                                                    </div>

                                                                </form>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Main modal -->
                                        <a href="{{ route('product/delete', $data->id) }}"
                                            class="bg-red-600 text-white text-sm px-2 py-1 rounded-lg">Delete</a>
                                    @elseif($data->status == 1)
                                        <a href="{{ route('product/deactivate', $data->id) }}"
                                            class="bg-red-600 text-white text-sm px-2 py-1 rounded-lg">Deactivate</a>
                                        <!-- Main modal -->
                                        <div id="basicModal" x-data="{ open: false }" @open-me="open=false"
                                            @close-me="open=true">
                                            <button class="bg-yellow-600 text-white text-sm px-2 py-1 rounded-lg"
                                                @click.prevent="open = true" aria-controls="basic-modal">Edit</button>
                                            <div @keydown.window.escape="open = false" x-show="open"
                                                class="relative z-10" aria-labelledby="modal-title" x-ref="dialog"
                                                aria-modal="true">

                                                <div x-show="open" x-transition:enter="ease-out duration-300"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100"
                                                    x-transition:leave="ease-in duration-200"
                                                    x-transition:leave-start="opacity-100"
                                                    x-transition:leave-end="opacity-0"
                                                    x-description="Background backdrop, show/hide based on modal state."
                                                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
                                                </div>


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
                                                                <form class="space-y-6" method="POST"
                                                                    action="{{ route('product-edit') }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $data->id }}" />
                                                                    <div>
                                                                        <label for="name"
                                                                            class="block mb-2 text-sm font-medium text-black font-extrabold">Product
                                                                            Name</label>
                                                                        <input type="text" name="name"
                                                                            id="name"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                            name="name"
                                                                            value="{{ $data->name }}"
                                                                            placeholder="" required>
                                                                    </div>
                                                                    <div>

                                                                        <label for="description"
                                                                            class="block mb-2 text-sm font-medium text-black">Description</label>
                                                                        <textarea id="description" name="description" rows="4"
                                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ $data->description }}</textarea>

                                                                    </div>
                                                                    <div>
                                                                        <label for="price"
                                                                            class="block mb-2 text-sm font-medium text-black font-extrabold">Product
                                                                            Price </label>
                                                                        <input type="number" name="price"
                                                                            id="price"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                            value="{{ $data->price }}"
                                                                            placeholder="0.00" required>
                                                                    </div>
                                                                    <div>
                                                                        <label for="daily_income"
                                                                            class="block mb-2 text-sm font-medium text-black font-extrabold">Daily
                                                                            Income </label>
                                                                        <input type="number" name="daily_income"
                                                                            id="daily_income"
                                                                            value="{{ $data->daily_income }}"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                            value="" placeholder="" required>
                                                                    </div>
                                                                    <div>
                                                                        <label for="validity_period"
                                                                            class="block mb-2 text-sm font-medium text-black font-extrabold">Validity
                                                                            Period</label>
                                                                        <input type="number" name="validity_period"
                                                                            id="validity_period"
                                                                            value="{{ $data->validity_period }}"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                            value="" placeholder="30" required>
                                                                    </div>
                                                                    <div>
                                                                        <label for="total_income"
                                                                            class="block mb-2 text-sm font-medium text-black font-extrabold">Total
                                                                            Income</label>
                                                                        <input type="number" name="total_income"
                                                                            id="total_income"
                                                                            value="{{ $data->total_income }}"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                            value="" placeholder="30" required>
                                                                    </div>
                                                                    <div>
                                                                        <label for="business_value"
                                                                            class="block mb-2 text-sm font-medium text-black font-extrabold">Business
                                                                            Value</label>
                                                                        <input type="number" name="business_value"
                                                                            id="business_value"
                                                                            value="{{ $data->business_value }}"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                            value="" placeholder="30" required>
                                                                    </div>


                                                                    <label
                                                                        class="block mb-2 text-sm font-medium text-black font-extrabold"
                                                                        for="file_input">Upload file</label>

                                                                    <input
                                                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-no"
                                                                        name="image" id="file_input"
                                                                        value="{{ $data->image }}" type="file">
                                                                    <div
                                                                        class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                                        <button type="submit"
                                                                            class="mt-3 w-full inline-flex justify-center rounded-md border text-white shadow-sm px-4 py-2 bg-green-600 text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                                                            @click="open = false">
                                                                            Create
                                                                        </button>
                                                                        <button type="button"
                                                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 text-base font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                                                            @click="open = false">
                                                                            Cancel
                                                                        </button>
                                                                    </div>

                                                                </form>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Main modal -->
                                        <a href="{{ route('product/delete', $data->id) }}"
                                            class="bg-red-600 text-white text-sm px-2 py-1 rounded-lg">Delete</a>
                                    @else
                                        Unknown Status
                                    @endif

                                </td>
                            </tr>
                        @endforeach

                        @if ($product->isEmpty())
                            <!-- Display a row indicating no transactions found -->
                            <tr class="bg-white border-b">
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No transaction found
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>


        </div>

    </div>
</x-app-layout>
