<x-app-layout>
    <div class="flex flex-col items-center justify-center px-2 py-8 mb-44">
        <div class="flex gap-8 py-4">
            <!-- Inside your Blade view file -->
            <a href="{{ route('administrator') }}" class=" bg-black text-white font-bold py-2 px-4 rounded">
                Back
            </a>
            <p class="text-white text-2xl font-bold">All Users</p>

        </div>

        <div class="flex flex-col w-1/2 gap-4 items-center justify-center">




            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Phone</th>
                            <th scope="col" class="px-6 py-3">Registered</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $data)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $data->first_name }} {{ $data->other_name }}
                                </td>
                                <td class="px-6 py-4"><a
                                        href="">{{ $data->email }}</a>
                                </td>
                                <td class="px-6 py-4">{{ $data->phone }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($data->created_at)->format('g:i A') }}
                                </td>

                                    <td class="px-6 py-4 flex gap-2">
                                        <a href="{{ route('delete/user', $data->id) }}" class="bg-red-500 text-white text-sm px-2 py-1 rounded-lg">Delete</a>
                                           <!-- Main modal -->
            <div id="basicModal" x-data="{ open: false }" @open-me="open=false" @close-me="open=true">
                <button class="bg-blue-700 p-2 text-sm rounded text-white float-right md:mr-8 mr-2"
                        @click.prevent="open = true"
                        aria-controls="basic-modal"
                >View</button>
                <div @keydown.window.escape="open = false" x-show="open" class="relative z-10" aria-labelledby="modal-title" x-ref="dialog" aria-modal="true">

                    <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Background backdrop, show/hide based on modal state." class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>


                    <div class="fixed z-10 inset-0 overflow-y-auto">
                        <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">

                            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-description="Modal panel, show/hide based on modal state." class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full" @click.away="open = false">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div
                                        class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3 w-full block transition duration-150">
                                        <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Full Name</p>
                                        {{ $data->first_name }} {{ $data->other_name }}
                                    </div>
                                    <div
                                        class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3 w-full block transition duration-150">
                                        <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Gender</p>
                                        {{ $data->gender }}
                                    </div>
                                    <div
                                        class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3 w-full block transition duration-150">
                                        <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Address</p>
                                        {{ $data->address }}
                                    </div>
                                    <div
                                    class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3 w-full block transition duration-150">
                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Country</p>
                                    {{ $data->country }}
                                </div>
                                <div
                                    class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3 w-full block transition duration-150">
                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">State</p>
                                    {{ $data->state }}
                                </div>
                                <div
                                    class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3 w-full block transition duration-150">
                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Email</p>
                                    {{ $data->email }}
                                </div>
                                <div
                                    class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3 w-full block transition duration-150">
                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Phone</p>
                                    {{ $data->phone }}
                                </div>

                                <div
                                    class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3 w-full block transition duration-150">
                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Last Login</p>
                                    {{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}
                                </div>

                        </div>

                            </div>

                        </div>
                    </div>
                </div>

               <!-- End Main modal -->
                                    </td>

                            </tr>
                        @endforeach

                        @if ($users->isEmpty())
                            <!-- Display a row indicating no transactions found -->
                            <tr class="bg-white border-b">
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No User found</td>
                            </tr>
                        @endif

                        <!-- Pagination Links -->
                        <div class="mt-4">
                            {{ $users->links() }}
                        </div>
                    </tbody>
                </table>

            </div>


        </div>

    </div>
</x-app-layout>
