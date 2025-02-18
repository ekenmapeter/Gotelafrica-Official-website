<x-app-layout>
    <div class="flex flex-col items-center justify-center px-2 py-8 mb-44">
        <div class="flex gap-8 py-4">
            <!-- Inside your Blade view file -->
<a href="{{ route('administrator') }}" class=" bg-black text-white font-bold py-2 px-4 rounded">
    Back
</a>
<p class="text-white text-2xl font-bold">Fund Wallet</p>

        </div>
        <div class="flex lg:w-1/2 w-full gap-4 items-center justify-center">





<div class="w-full max-w-sm p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 mb-44">
    <form class="space-y-6" action="{{ route('admin-fund-wallet') }}" method="POST">
        @csrf

        <div>
            <label class="block mb-2 text-sm font-medium text-white">Select User</label>
            <select id="user" name="user" class="bg-gray-50 border border-gray-300 text-black font-extrabold hover:text-black text-sm rounded-lg block w-full p-2.5" name="user" required autocomplete="user">
                <option value="" disabled selected>Select User</option>
                @foreach($user as $data)
                    <option class="hover:text-black" value="{{ $data->id }}">{{ $data->first_name }} {{ $data->other_name }}</option>
                @endforeach
            </select>
        </div>


        <div>
            <label for="type" class="block mb-2 text-sm font-medium text-white">Wallet Type</label>
            <select id="type" value="" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" name="type" required autocomplete="type">
                <option value="" disabled selected>Select Wallet Type</option>
                <option class="text-black" value="recharge">Recharge Wallet</option>
                <option class="text-black" value="balance">Balance Account</option>
            </select>
        </div>
        <div>
            <label for="amount" class="block mb-2 text-sm font-medium text-white">Recharge Amount</label>
            <input type="number" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="" placeholder="0.00" required>
        </div>



        <button type="submit" class="w-full text-white bg-green-400 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Confirm payment</button>

    </form>
</div>



        </div>

    </div>

</x-app-layout>
