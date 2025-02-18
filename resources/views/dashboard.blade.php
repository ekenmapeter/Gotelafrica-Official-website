<x-app-layout>

    <div class="flex flex-col items-center justify-center px-2 py-8  mb-44">
        <p class="text-white text-2xl font-bold">My Account</p>


        <div class="flex  w-1/2 gap-4 items-center justify-start">
            <svg class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
            </svg>

            <p class="text-white text-2xl font-bold">{{ $maskedPhone }}</p>

        </div>
        <div class="flex flex-col gap-2 py-4 lg:w-1/2 mt-2 w-full lg:px-4 px-2 bg-black rounded-lg">
            <div class="flex gap-4 w-full bg-black text-white text-center lg:px-4 px-4 py-4 rounded-lg">
                <div class="w-full">
                    <div class="text-left">
                        <p class="text-white text-sm">Recharge Wallet</p>
                        @if($recharge)
                        <p class="text-white lg:text-3xl text-1xl font-extrabold">₦{{ number_format($recharge->amount, 2) }}</p>
                    @else
                        <p class="text-white text-3xl font-extrabold">₦0</p>
                    @endif

                    </div>
                </div>
                <div class="w-full">
                    <div class="text-left">
                        <p class="text-white text-sm">Balance Wallet</p>
                        <p class="text-white lg:text-3xl text-1xl font-extrabold">₦{{ number_format($wallet->balance, 2) }}</p>

                    </div>
                </div>

            </div>

            <div class="flex gap-4 w-full bg-black text-white text-center lg:px-12 px-4 py-4 rounded-lg">
                <div class="w-full">
                    <div class="text-left">
                        <p class="text-white text-sm">Total Income</p>
                        @if($total_income)
                        <p class="text-white text-1xl font-extrabold">
                            ₦ {{ number_format($total_income, 2) }}
                        </p>
                                            @else
                        <p class="text-white text-1xl font-extrabold">₦0</p>
                    @endif
                    </div>
                </div>
                <div class="w-full">
                    <div class="text-left">
                        <p class="text-white text-sm">Total Recharge</p>
                        @if($total_recharge)
                        <p class="text-white text-1xl font-extrabold">
                            ₦ {{ number_format($total_recharge, 2) }}
                        </p>
                                            @else
                        <p class="text-white text-1xl font-extrabold">₦0</p>
                    @endif

                    </div>
                </div>

                <div class="w-full">
                    <div class="text-left">
                        <p class="text-white text-sm">Total Assests</p>
                        @if($total_asset)
                        <p class="text-white text-1xl font-extrabold">
                            ₦ {{ number_format($total_asset, 2) }}
                        </p>
                                            @else
                        <p class="text-white text-1xl font-extrabold">₦0</p>
                    @endif


                    </div>
                </div>
            </div>
            <div class="flex gap-4 w-full bg-black text-white text-center lg:px-12 px-4 py-4 rounded-lg">
                <div class="w-full">
                    <div class="text-left">
                        <p class="text-white text-sm">Total Withdraw</p>
                        @if($totalWithdraw)
                        <p class="text-white text-1xl font-extrabold">
                            ₦ {{ number_format($totalWithdraw, 2) }}
                        </p>
                                            @else
                        <p class="text-white text-1xl font-extrabold">₦0</p>
                    @endif

                    </div>
                </div>
                <div class="w-full">
                    <div class="text-left">
                        <p class="text-white text-sm">Today's Income</p>
                        @if($today_income)
                        <p class="text-white text-1xl font-extrabold">
                            ₦ {{ number_format($today_income, 2) }}
                        </p>
                                            @else
                        <p class="text-white text-1xl font-extrabold">₦0</p>
                    @endif

                    </div>
                </div>

                <div class="w-full">
                    <div class="text-left">
                        <p class="text-white text-sm">Team Income</p>
                        @if(isset($get_team_income_percentage))
                        <p class="text-white text-1xl font-extrabold">₦{{ $get_team_income_percentage }}</p>
                        @else
                        <p class="text-white text-1xl font-extrabold">₦0</p>
                        @endif

                    </div>
                </div>
            </div>

        </div>
        <div class="flex justify-center items-center px-4 py-2">
            <img src="images/ad2.png" class="rounded-lg lg:w-1/2 w-full" alt="Ad" />
        </div>

        <div class="flex bg-black items-center lg:gap-20 gap-4 justify-center py-4 lg:px-12 px-2 rounded-lg">
            <a href="{{ route('transaction')}}" class="flex flex-col items-center justify-center">
                <svg class="lg:w-14 w-6 lg:h-14 h-6 text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 0 19 9.5 9.5 0 0 0 0-19ZM8.374 17.4a7.6 7.6 0 0 1-5.9-7.4c0-.83.137-1.655.406-2.441l.239.019a3.887 3.887 0 0 1 2.082 2.5 4.1 4.1 0 0 0 2.441 2.8c1.148.522 1.389 2.007.732 4.522Zm3.6-8.829a.997.997 0 0 0-.027-.225 5.456 5.456 0 0 0-2.811-3.662c-.832-.527-1.347-.854-1.486-1.89a7.584 7.584 0 0 1 8.364 2.47c-1.387.208-2.14 2.237-2.14 3.307a1.187 1.187 0 0 1-1.9 0Zm1.626 8.053-.671-2.013a1.9 1.9 0 0 1 1.771-1.757l2.032.619a7.553 7.553 0 0 1-3.132 3.151Z" />
                </svg>
                <span class="mt-1 text-sm text-center text-white font-semibold">Transaction</span>
            </a>

            <a href="{{ route('recharge')}}" class="flex flex-col items-center justify-center">
                <svg class="lg:w-14 w-6 lg:h-14 h-6 text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                    <path
                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                    <path
                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                </svg>
                <span class="mt-1 text-sm text-center text-white font-semibold">Recharge</span>
            </a>
            <a href="{{ route('withdraw') }}" class="flex flex-col items-center justify-center">
                <svg class="lg:w-14 w-6 lg:h-14 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 10H1m0 0 3-3m-3 3 3 3m1-9h10m0 0-3 3m3-3-3-3"/>
                  </svg>
                <span class="mt-1 text-sm text-center text-white font-semibold">Withdraw </span>
            </a>
            <a href="{{ route('refer') }}" class="flex flex-col items-center justify-center">
                <svg class="lg:w-14 w-6 lg:h-14 h-6 text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="m7.164 3.805-4.475.38L.327 6.546a1.114 1.114 0 0 0 .63 1.89l3.2.375 3.007-5.006ZM11.092 15.9l.472 3.14a1.114 1.114 0 0 0 1.89.63l2.36-2.362.38-4.475-5.102 3.067Zm8.617-14.283A1.613 1.613 0 0 0 18.383.291c-1.913-.33-5.811-.736-7.556 1.01-1.98 1.98-6.172 9.491-7.477 11.869a1.1 1.1 0 0 0 .193 1.316l.986.985.985.986a1.1 1.1 0 0 0 1.316.193c2.378-1.3 9.889-5.5 11.869-7.477 1.746-1.745 1.34-5.643 1.01-7.556Zm-3.873 6.268a2.63 2.63 0 1 1-3.72-3.72 2.63 2.63 0 0 1 3.72 3.72Z" />
                </svg>
                <span class="mt-1 text-sm text-center text-white font-semibold">Refer a friend</span>
            </a>
        </div>

        <div class="flex flex-col gap-2 py-4 lg:w-1/2 mt-2 w-full px-4 bg-black rounded-lg space-y-4 ">
            <a href="{{ route('myorder') }}" class="flex gap-2 hover:bg-gray-500 hover:py-2 hover:px-2 hover:rounded-lg">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M19.728 10.686c-2.38 2.256-6.153 3.381-9.875 3.381-3.722 0-7.4-1.126-9.571-3.371L0 10.437V18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-7.6l-.272.286Z" />
                    <path
                        d="m.135 7.847 1.542 1.417c3.6 3.712 12.747 3.7 16.635.01L19.605 7.9A.98.98 0 0 1 20 7.652V6a2 2 0 0 0-2-2h-3V3a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v1H2a2 2 0 0 0-2 2v1.765c.047.024.092.051.135.082ZM10 10.25a1.25 1.25 0 1 1 0-2.5 1.25 1.25 0 0 1 0 2.5ZM7 3a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1H7V3Z" />
                </svg>
                <div class="flex justify-between w-full">
                    <span class="mt-1 text-sm text-center text-white font-semibold">My Order</span>
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                </div>
            </a>
            <a href="{{ route('mybankaccount')}}" class="flex gap-2 hover:bg-gray-500 hover:py-2 hover:px-2 hover:rounded-lg">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M11.074 4 8.442.408A.95.95 0 0 0 7.014.254L2.926 4h8.148ZM9 13v-1a4 4 0 0 1 4-4h6V6a1 1 0 0 0-1-1H1a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1v-2h-6a4 4 0 0 1-4-4Z" />
                    <path
                        d="M19 10h-6a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1Zm-4.5 3.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM12.62 4h2.78L12.539.41a1.086 1.086 0 1 0-1.7 1.352L12.62 4Z" />
                </svg>
                <div class="flex justify-between w-full">
                    <span class="mt-1 text-sm text-center text-white font-semibold">My Bank Account</span>
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                </div>
            </a>
            <div class="flex gap-2 hover:bg-gray-500 hover:py-2 hover:px-2 hover:rounded-lg">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M15.077.019a4.658 4.658 0 0 0-4.083 4.714V7H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-1.006V4.68a2.624 2.624 0 0 1 2.271-2.67 2.5 2.5 0 0 1 2.729 2.49V8a1 1 0 0 0 2 0V4.5A4.505 4.505 0 0 0 15.077.019ZM9 15.167a1 1 0 1 1-2 0v-3a1 1 0 1 1 2 0v3Z" />
                </svg>
                <a href="{{ route('resetpassword')}}" class="flex justify-between w-full">
                    <span class="mt-1 text-sm text-center text-white font-semibold">Change Password</span>
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>

                </a>
            </div>
            <a href="{{ route('withdrawpassword')}}" class="flex gap-2 hover:bg-gray-500 hover:py-2 hover:px-2 hover:rounded-lg">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 19 20">
                    <path
                        d="M8 14.5a6.474 6.474 0 0 1 8-6.318V8a1 1 0 0 0-1-1h-2.5V4.5a4.5 4.5 0 1 0-9 0V7H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9.052A6.494 6.494 0 0 1 8 14.5Zm-2.5-10a2.5 2.5 0 1 1 5 0V7h-5V4.5Z" />
                    <path
                        d="M14.5 10a4.5 4.5 0 1 0 0 9 4.5 4.5 0 0 0 0-9Zm2.06 6.561a1 1 0 0 1-1.414 0l-1.353-1.354a1 1 0 0 1-.293-.707v-1.858a1 1 0 0 1 2 0v1.444l1.06 1.06a1.001 1.001 0 0 1 0 1.415Z" />
                </svg>
                <div class="flex justify-between w-full">
                    <span class="mt-1 text-sm text-center text-white font-semibold">Withdraw Password</span>
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                </div>
            </a>
            <a href="{{ route('customerservice') }}" class="flex gap-2 hover:bg-gray-500 hover:py-2 hover:px-2 hover:rounded-lg">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M7.824 5.937a1 1 0 0 0 .726-.312 2.042 2.042 0 0 1 2.835-.065 1 1 0 0 0 1.388-1.441 3.994 3.994 0 0 0-5.674.13 1 1 0 0 0 .725 1.688Z" />
                    <path
                        d="M17 7A7 7 0 1 0 3 7a3 3 0 0 0-3 3v2a3 3 0 0 0 3 3h1a1 1 0 0 0 1-1V7a5 5 0 1 1 10 0v7.083A2.92 2.92 0 0 1 12.083 17H12a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h1a1.993 1.993 0 0 0 1.722-1h.361a4.92 4.92 0 0 0 4.824-4H17a3 3 0 0 0 3-3v-2a3 3 0 0 0-3-3Z" />
                </svg>
                <div class="flex justify-between w-full">
                    <span class="mt-1 text-sm text-center text-white font-semibold">Online Service</span>
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                </div>
            </a>
        </div>
    </div>

</x-app-layout>
