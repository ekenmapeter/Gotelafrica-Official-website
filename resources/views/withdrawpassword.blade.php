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
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 w-full" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 w-full" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="w-full max-w-sm p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-8">


                <form class="flex flex-col" method="POST" action="{{ route('withdrawal.password.store') }}">
                    @csrf
                    <div class="mb-2  flex flex-col">
                        <label for="email" class="text-white">Email</label>
                        <input type="text" value="{{ Auth::user()->email }}" name="username" id="email"
                            class="border border-gray-300 rounded px-2 py-1" placeholder="{{ Auth::user()->email }}" readonly>
                    </div>
                    <div class="mb-2  flex flex-col">
                        <label for="password" class="text-white">Password</label>
                        <input type="password" value="" name="password" id="password"
                            class="border border-gray-300 rounded px-2 py-1" placeholder="">
                    </div>
                    <div class="mb-2  flex flex-col">
                        <label for="confirm_password" class="text-white">Confirm Password</label>
                        <input type="password" value="" name="confirm_password" id="confirm_password"
                            class="border border-gray-300 rounded px-2 py-1" placeholder="">
                    </div>

                    <div class="mb-2  flex  gap-2 w-full">
                        <div class="flex flex-col">
                            <input type="number" value="" name="otp" id="otp"
                                class="border border-gray-300 rounded px-2 py-1" placeholder="OTP Code">
                        </div>
                        <div>
                            <button type="button" onclick="sendOTP()" id="otpButton" class="px-2 rounded-lg w-full bg-green-400 text-white py-1 flex items-center justify-center gap-2">
                                <span id="otpButtonText">Get OTP</span>
                                <span id="otpSpinner" class="hidden">
                                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </button>
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

    <!-- Add SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function sendOTP() {
            const button = document.getElementById('otpButton');
            const buttonText = document.getElementById('otpButtonText');
            const spinner = document.getElementById('otpSpinner');

            // Show loading state with SweetAlert2
            Swal.fire({
                title: 'Sending OTP',
                text: 'Please wait...',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            });

            // Disable button and show loading state
            button.disabled = true;
            buttonText.textContent = 'Sending...';
            spinner.classList.remove('hidden');

            // Make an AJAX request to your server-side endpoint
            fetch('/send-otp', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    email: '{{ Auth::user()->email }}',
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.otp) {
                    // For development only - show OTP in console
                    console.log('Your OTP:', data.otp);
                }
                // Show success message with SweetAlert2
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'OTP sent successfully! Please check your email.',
                    timer: 3000,
                    showConfirmButton: false
                });
            })
            .catch(error => {
                console.error('Error:', error);
                // Show error message with SweetAlert2
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Failed to send OTP. Please try again.',
                });
            })
            .finally(() => {
                // Reset button state after 2 seconds
                setTimeout(() => {
                    button.disabled = false;
                    buttonText.textContent = 'Get OTP';
                    spinner.classList.add('hidden');
                }, 2000);
            });
        }

        // Show session messages with SweetAlert2
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                showConfirmButton: true
            });
        @endif

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>

</x-app-layout>
