<x-app-layout>
    <div class="flex flex-col items-center justify-center px-2 py-8 mb-44">
        <div class="flex gap-8 py-4">
            <!-- Inside your Blade view file -->
            <a href="{{ route('administrator') }}" class=" bg-black text-white font-bold py-2 px-4 rounded">
                Back
            </a>
            <p class="text-white text-2xl font-bold">Deposit Details</p>

        </div>

        <div class="flex flex-col lg:w-1/2 w-full gap-4 items-center justify-center  mb-44 bg-gray-200">

            <div class="w-full">
                <div class="mt-5 w-full text-sm">
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div
                            class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3 w-full block transition duration-150">
                            <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Depositor Name</p>
                            {{ $details->first_name }} {{ $details->other_name }}
                        </div>
                        <div
                            class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3 w-full block transition duration-150">
                            <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Payment Description</p>
                            {{ $details->description }}
                        </div>
                        <div
                            class="w-full border-t border-gray-100 text-black font-bold py-4 pl-6 pr-3 w-full block transition duration-150">
                            <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Amount</p>
                            {{ $details->balance }}
                        </div>
                        @if ($details->status == 0)
                            <div
                                class="text-black font-extrabold py-4 pl-6 pblack font-boldll block bg-yellow-400  transition duration-150">
                                <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Status</p>
                                Pending
                            </div>
                        @elseif($details->status == 1)
                            <div
                                class="text-black font-extrabold py-4 pl-6 pblack font-boldll block bg-green-400  transition duration-150">
                                <p class="font-bold text-white bg-black mb-2 px-2 py-1 rounded-lg">Status</p>
                                Approved
                            </div>
                        @elseif($details->status == 2)
                            <div
                                class="text-black font-extrabold py-4 pl-6 pr-3 w-full block bg-red-400  transition duration-150">
                                <p class="font-bold text-black">Status</p>
                                Rejected
                            </div>
                        @else
                            Unknown Status
                        @endif
                        <div
                        class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-green-100 transition duration-150">
                        <p class="font-bold text-black">Payment Proof</p>
                        <img src="{{ asset('payment_proof/' . $details->proof_payment) }}" alt="" onclick="showModal('{{ asset('payment_proof/' . $details->proof_payment) }}')" />
                        <a href="{{ asset('payment_proof/' . $details->proof_payment) }}" class="flex justify-center font-bold rounded-lg text-white bg-green-800 p-2 items-center mt-2" download>Download</a>
                    </div>
                </div>
                </div>
            </div>



        </div>

    </div>
    @include('components.image_preview');

</x-app-layout>
