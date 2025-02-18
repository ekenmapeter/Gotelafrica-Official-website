<x-app-layout>
    <div class="flex flex-col items-center justify-center px-2 py-8 mb-44">
        <div class="flex gap-8 py-4">
            <!-- Inside your Blade view file -->
<a href="{{ route('administrator') }}" class=" bg-black text-white font-bold py-2 px-4 rounded">
    Back
</a>
<p class="text-white text-2xl font-bold">Deposit</p>

        </div>

        <div class="flex flex-col w-1/2 gap-4 items-center justify-center">




            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Description</th>
                            <th scope="col" class="px-6 py-3">Type</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Date</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deposit as $data)

                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4"><a href="{{ route('deposit/details', $data->id) }}">{{ $data->description }}</a></td>
                                <td class="px-6 py-4">{{ $data->type }}</td>
                                <td class="px-6 py-4">
                                    @if($data->status == 0)
                                        <span class="px-2 py-1 text-white  rounded-lg bg-yellow-600">Pending</span>
                                    @elseif($data->status == 1)
                                        <span class="px-2 py-1 text-white  rounded-lg bg-green-600">Approved</span>
                                    @elseif($data->status == 2)
                                        <span class="px-2 py-1 text-white  rounded-lg bg-red-600">Rejected</span>
                                    @else
                                        Unknown Status
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($data->created_at)->format('g:i A') }}</td>
                                <td class="px-6 py-4 flex gap-2">
                                    @if($data->status == 0)
                                    <a href="{{ route('deposit/approve', $data->id) }}" class="bg-blue-500 text-white text-sm px-2 py-1 rounded-lg">Approve</a>
                                    <a href="{{ route('deposit/reject', $data->id) }}" class="bg-red-500 text-white text-sm px-2 py-1 rounded-lg">Reject</a>
                                    @elseif($data->status == 1)
                                        <span class="px-2 py-1 text-white  rounded-lg bg-green-600">Approved</span>
                                    @elseif($data->status == 2)
                                        <span class="px-2 py-1 text-white  rounded-lg bg-red-600">Rejected</span>
                                    @else
                                        Unknown Status
                                    @endif

                                </td>
                            </tr>

                        @endforeach

                        @if ($deposit->isEmpty())
                            <!-- Display a row indicating no transactions found -->
                            <tr class="bg-white border-b">
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No transaction found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>


        </div>

    </div>
</x-app-layout>
