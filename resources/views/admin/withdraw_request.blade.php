<x-app-layout>
    <div class="flex flex-col items-center justify-center px-2 py-8 mb-44">
        <div class="flex gap-8 py-4">
            <!-- Inside your Blade view file -->
            <a href="{{ route('administrator') }}" class=" bg-black text-white font-bold py-2 px-4 rounded">
                Back
            </a>
            <p class="text-white text-2xl font-bold">All Withdrawal Request</p>

        </div>

        <div class="flex flex-col w-1/2 gap-4 items-center justify-center">




            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID</th>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Date</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($withdrawal_list as $data)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $data->id }}
                                </td>
                                <td class="px-6 py-4"><a
                                        href="{{ route('admin/withdraw/details', $data->id) }}">{{ $data->account_name }}</a>
                                </td>
                                <td class="px-6 py-4">{{ $data->amount }}</td>
                                <td class="px-6 py-4">
                                    @if ($data->status == 0)
                                        <span class="text-yellow-600">Pending</span>
                                    @elseif($data->status == 1)
                                        <span class="text-green-600">Approved</span>
                                    @elseif($data->status == 2)
                                        <span class="text-red-600">Rejected</span>
                                    @else
                                        Unknown Status
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($data->created_at)->format('g:i A') }}
                                </td>

                                @if ($data->status == 0)
                                    <td class="px-6 py-4"><a href="{{ route('approve/withdraw', $data->id) }}"
                                            class="bg-yellow-500 text-white text-sm px-2 py-1 rounded-lg">Approve</a>
                                    </td>
                                @elseif($data->status == 1)
                                    <td class="px-6 py-4"><a
                                            class="bg-green-500 text-white text-sm px-2 py-1 rounded-lg">Approved</a>
                                    </td>
                                @elseif($data->status == 2)
                                    <td class="px-6 py-4"><a
                                            class="bg-red-500 text-white text-sm px-2 py-1 rounded-lg">Rejected</a></td>
                                @else
                                    Unknown Status
                                @endif
                            </tr>
                        @endforeach

                        @if ($withdrawal_list->isEmpty())
                            <!-- Display a row indicating no transactions found -->
                            <tr class="bg-white border-b">
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No Withdrawal found</td>
                            </tr>
                        @endif

                        <!-- Pagination Links -->
                        <div class="mt-4">
                            {{ $withdrawal_list->links() }}
                        </div>
                    </tbody>
                </table>

            </div>


        </div>

    </div>
</x-app-layout>
