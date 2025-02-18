<x-app-layout>
    <div class="flex flex-col items-center justify-center px-2 py-8 mb-44">
        <div class="flex gap-8 py-4">
            <!-- Inside your Blade view file -->
            <a href="{{ route('administrator') }}" class=" bg-black text-white font-bold py-2 px-4 rounded">
                Back
            </a>
            <p class="text-white text-2xl font-bold">All Ruuning Order</p>

        </div>

        <div class="flex flex-col w-1/2 gap-4 items-center justify-center">




            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">User</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                            <th scope="col" class="px-6 py-3">Started</th>
                            <th scope="col" class="px-6 py-3">Daily Income</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($running_product as $data)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $data->name }}
                                </td>
                                <td class="px-6 py-4"><a
                                        href="">{{ $data->user_id }}</a>
                                </td>
                                <td class="px-6 py-4">{{ $data->price }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($data->created_at)->format('g:i A') }}
                                </td>

                                    <td class="px-6 py-4 flex gap-2">
                                        {{ $data->daily_income }}
                                    </td>

                            </tr>
                        @endforeach

                        @if ($running_product->isEmpty())
                            <!-- Display a row indicating no transactions found -->
                            <tr class="bg-white border-b">
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No Order found</td>
                            </tr>
                        @endif

                        <!-- Pagination Links -->
                        <div class="mt-4">
                            {{ $running_product->links() }}
                        </div>
                    </tbody>
                </table>

            </div>


        </div>

    </div>
</x-app-layout>
