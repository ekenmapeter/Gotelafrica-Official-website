<x-app-layout>
    <div class="flex flex-col items-center justify-center px-2 py-8 mb-44">
        <p class="text-white text-2xl font-bold py-4">Reset Password</p>

        <div class="flex lg:w-1/2 w-full gap-4 items-center justify-center">


            <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">


                <form class="flex flex-col" method="post" action="{{ route('resetPasswordSave') }}">
                    @csrf
                    <div class="mb-2  flex flex-col">
                        <label for="cardholder-name" class="text-white">Old Password</label>
                        <input type="password" value="" name="old_password" id="cardholder-name"
                            class="border border-gray-300 rounded px-2 py-1" placeholder="">
                    </div>
                    <div class="mb-2  flex flex-col">
                        <label for="bank-account" class="text-white">New Password</label>
                        <input type="password" value="" name="new_password" id="bank-account"
                            class="border border-gray-300 rounded px-2 py-1" placeholder="">
                    </div>
                    <div class="mb-2  flex flex-col">
                        <label for="mobile" class="text-white">New Password</label>
                        <input type="password" value="" name="new_password" id="mobile"
                            class="border border-gray-300 rounded px-2 py-1" placeholder="">
                    </div>

                    <div>
                        <button type="submit"
                            class="bg-green-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full">
                            Comfirm
                        </button>
                    </div>
                </form>
            </div>
        </div>
	</div>
</x-app-layout>
