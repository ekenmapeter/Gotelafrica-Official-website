<x-app-layout>
    <div class="flex flex-col items-center justify-center px-2 py-8 mb-44">
        <div class="flex gap-8 py-4">
            <a href="{{ route('administrator') }}" class="bg-black text-white font-bold py-2 px-4 rounded">
                Back
            </a>
            <div class="flex items-center gap-4">
                <p class="text-white text-2xl font-bold">All Submissions</p>
                <span class="bg-blue-500 text-white text-sm px-3 py-1 rounded-full">
                    Total: {{ $submissions->total() }}
                </span>
            </div>
        </div>
        <div class="flex flex-col w-1/2 gap-4 items-center justify-center">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Phone</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Submitted</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($submissions as $submission)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $submission->full_name }}
                                </td>
                                <td class="px-6 py-4">{{ $submission->email }}</td>
                                <td class="px-6 py-4">{{ $submission->user->phone }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $submission->is_approved ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $submission->is_approved ? 'Approved' : 'Pending' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($submission->created_at)->format('M d, Y H:i') }}
                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    @if(!$submission->is_approved)
                                        <form action="{{ route('approve.submission', $submission->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="bg-green-500 text-white text-sm px-2 py-1 rounded-lg"
                                                onclick="return confirm('Are you sure you want to approve this submission?')">
                                                Approve
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ route('delete.submission', $submission->id) }}"
                                          method="POST"
                                          class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this submission?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-500 text-white text-sm px-2 py-1 rounded-lg">
                                            Delete
                                        </button>
                                    </form>
                                    <!-- View Modal -->
                                    <div id="basicModal" x-data="{ open: false }" @open-me="open=false" @close-me="open=true">
                                        <button class="bg-gray-800 p-2 text-sm rounded text-white rounded-lg"
                                                @click.prevent="open = true"
                                                aria-controls="basic-modal">
                                            View
                                        </button>
                                        <div @keydown.window.escape="open = false" x-show="open" class="relative z-10" aria-labelledby="modal-title" x-ref="dialog" aria-modal="true">
                                            <div x-show="open" x-transition:enter="ease-out duration-300" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                                            <div class="fixed z-10 inset-0 overflow-y-auto">
                                                <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                                                    <div x-show="open" x-transition:enter="ease-out duration-300" class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full" @click.away="open = false">
                                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                            <div class="grid md:grid-cols-2 md:gap-6">
                                                                <div class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3">
                                                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Full Name</p>
                                                                    {{ $submission->full_name }}
                                                                </div>
                                                                <div class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3">
                                                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Email</p>
                                                                    {{ $submission->email }}
                                                                </div>
                                                                <div class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3">
                                                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Phone</p>
                                                                    {{ $submission->user->phone }}
                                                                </div>
                                                                <div class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3">
                                                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Description</p>
                                                                    {{ $submission->description }}
                                                                </div>
                                                                <div class="w-full col-span-2 border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3">
                                                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Payment Proof</p>
                                                                    <div class="mt-2">
                                                                        @if($submission->payment_proof)
                                                                        <img src="{{ asset('storage/uploads/' . $submission->payment_proof) }}" alt="Payment Proof"
                                                                                 alt="Payment Proof"
                                                                                 class="max-w-full h-auto rounded-lg shadow-lg cursor-pointer"
                                                                                 onclick="window.open(this.src, '_blank')"
                                                                            >
                                                                        @else
                                                                            <p class="text-red-500">No payment proof uploaded</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3">
                                                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Status</p>
                                                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $submission->is_approved ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                                        {{ $submission->is_approved ? 'Approved' : 'Pending' }}
                                                                    </span>
                                                                </div>
                                                                <div class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3">
                                                                    <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Submitted At</p>
                                                                    @if($submission->created_at)
                                                                        {{ $submission->created_at->format('M d, Y H:i') }}
                                                                    @else
                                                                        N/A
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                            <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false">
                                                                Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        @if ($submissions->isEmpty())
                            <tr class="bg-white border-b">
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">No submissions found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="mt-4 px-4">
                    {{ $submissions->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
