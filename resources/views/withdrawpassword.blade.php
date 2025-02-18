<x-app-layout>
    <div class="flex flex-col items-center justify-center px-2 py-8 mb-44">
        <div class="flex gap-8 py-4">
            <!-- Inside your Blade view file -->
<a href="{{ url()->previous() }}" class=" bg-black text-white font-bold py-2 px-4 rounded">
    Back
</a>
<p class="text-white text-2xl font-bold">Set Withdrawal Password</p>

        </div>
        <div class="flex lg:w-1/2 w-full gap-4 items-center justify-center">


            <div class="w-full max-w-sm p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-8">


                <form class="flex flex-col" method="post" action="">
                    <div class="mb-2  flex flex-col">
                        <label for="email" class="text-white">Email</label>
                        <input type="text" value="{{ Auth::user()->email }}" name="username" id="email"
                            class="border border-gray-300 rounded px-2 py-1" placeholder="{{ Auth::user()->email }}" readonly>
                    </div>
                    <div class="mb-2  flex flex-col">
                        <label for="password" class="text-white">Password</label>
                        <input type="text" value="" name="password" id="password"
                            class="border border-gray-300 rounded px-2 py-1" placeholder="">
                    </div>
                    <div class="mb-2  flex flex-col">
                        <label for="confirm_password" class="text-white">Confirm Password</label>
                        <input type="number" value="" name="confirm_password" id="confirm_password"
                            class="border border-gray-300 rounded px-2 py-1" placeholder="">
                    </div>

                    <div class="mb-2  flex  gap-2 w-full">
                        <div class="flex flex-col">
                            <input type="number" value="" name="otp" id="otp"
                                class="border border-gray-300 rounded px-2 py-1" placeholder="OTP Code">
                        </div>
                        <div>
                            <button onclick="sendOTP()" class="px-2 rounded-lg w-full bg-green-400 text-white py-1">Get OTP</button>
                        </div>
                    </div>

                    <div class="py-4">
                        <button
                            class="bg-green-400  hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full">
                            Confirm
                        </button>
                    </div>
                </form>
            </div>
        </div>
	</div>


    <script>
        function sendOTP() {
    // Make an AJAX request to your server-side endpoint
    // Use Fetch or XMLHttpRequest to make the request
    fetch('/otp', {
        method: 'POST', // Use the appropriate method (POST or GET)
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({
            email: '{{ Auth::user()->email }}', // Replace with the user's email
        }),
    })
    .then(response => {
        // Handle the response from the server if needed
        toast('OTP sent successfully!', 'success');
    })
    .catch(error => {
        // Handle any errors from the request
        toast('Failed to send OTP. Please try again.');
    });
}


    </script>

</x-app-layout>
