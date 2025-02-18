<x-app-layout>
    <div class="flex flex-col items-center justify-center px-2 py-8 mb-44">
        <div class="flex gap-8 py-4">
            <!-- Inside your Blade view file -->
            <a href="{{ url()->previous() }}" class=" bg-black text-white font-bold py-2 px-4 rounded">
                Back
            </a>
            <p class="text-white text-2xl font-bold"># Investment Details</p>

        </div>

        <div class="flex flex-col lg:w-1/2 w-full gap-4 items-center justify-center  mb-22">

            <div class="w-full p-6 bg-white rounded shadow-sm my-6" id="invoice">

                <div class="grid grid-cols-2 items-center">
                    <div>
                        <!--  Company logo  -->
                        <img class="h-44 w-44 rounded-lg" src="../product_image/{{ $invest->image }}"
                            alt="{{ $invest->name }}">
                    </div>

                    <div class="text-right">
                        <div class="flex gap-2 items-center justify-end bg-green-400 px-4 rounded-lg">
                            <p class="text-sm text-black font-extrabold">Current Wallet</p>
                            <p class="text-1xl text-black font-extrabold">₦{{ number_format($recharge->amount, 2) }}</p>

                        </div>
                        <p>
                            {{ $invest->name }}
                        </p>
                        <p class="text-gray-500 text-sm">
                            {{ $invest->validity_period }} Days
                        </p>
                        <p class="text-gray-500 text-sm mt-1">
                            {{ $invest->business_value }}
                        </p>
                        <p class="text-gray-500 text-sm mt-1">
                            VAT: 0.5%
                        </p>
                    </div>
                </div>
                <p class="font-bold text-gray-800 mt-4">
                    {{ $invest->description }}
                </p>
                <!-- Invoice Items -->
                <div class="-mx-4 mt-8 flow-root sm:mx-0">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <colgroup>
                                <col class="w-1/4">
                                <col class="w-1/6">
                                <col class="w-1/6">
                                <col class="w-1/6">
                                <col class="w-1/6">
                            </colgroup>
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Price</th>
                                    <th scope="col"
                                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Daily Income</th>
                                    <th scope="col"
                                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Validity Period</th>
                                    <th scope="col"
                                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total Income</th>
                                    <th scope="col"
                                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Business Value</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-2 py-4 whitespace-nowrap">{{ $invest->price }}</td>
                                    <td class="px-2 py-4 whitespace-nowrap">{{ $invest->daily_income }}</td>
                                    <td class="px-2 py-4 whitespace-nowrap">{{ $invest->validity_period }}</td>
                                    <td class="px-2 py-4 whitespace-nowrap">{{ $invest->total_income }}</td>
                                    <td class="px-2 py-4 whitespace-nowrap">{{ $invest->business_value }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="px-6 py-4" colspan="5">
                                        <form method="POST" action="{{ route('investPay') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $invest->id }}">
                                            <input type="hidden" name="price" value="{{ $invest->price }}">
                                            <input type="hidden" name="daily_income" value="{{ $invest->daily_income }}">
                                            <input type="hidden" name="validity_period" value="{{ $invest->validity_period }}">
                                            <input type="hidden" name="total_income" value="{{ $invest->total_income }}">
                                            <input type="hidden" name="business_value" value="{{ $invest->business_value }}">
                                            <input type="hidden" name="name" value="{{ $invest->name }}">
                                            <input type="hidden" name="description" value="{{ $invest->description }}">
                                            <button type="submit" class="w-full px-4 py-2 text-black bg-green-400 rounded-lg">Invest
                                                Now</button>
                                        </form>

                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div id="investPopup"
                            class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-100 flex justify-center items-center">
                            <div class="text-center">
                                <div role="status">
                                    <svg aria-hidden="true"
                                        class="inline w-8 h-8 text-gray-200 animate-spin fill-blue-600"
                                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                            fill="currentColor" />
                                        <path
                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                            fill="currentFill" />
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--  Footer  -->
                <div class="border-t-2 pt-4 text-xs text-gray-500 text-center">
                    For any inquiries or assistance, our customer care team is available around the clock to support
                    you. Your satisfaction and confidence in your investment are our top priorities. </div>

            </div>



        </div>

    </div>
    @include('components.image_preview');

    <script>
        // Function to display the investment pop-up
        function displayInvestmentPopup() {
            const investPopup = document.getElementById('investPopup');
            investPopup.classList.remove('hidden');
            // Implement your pop-up content here
        }

        // Event listener for the "Invest Now" button
        const investButton = document.querySelector('.bg-green-400.rounded-lg');
        investButton.addEventListener('click', displayInvestmentPopup);
    </script>
</x-app-layout>
