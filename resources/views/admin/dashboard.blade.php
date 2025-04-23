<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-900 to-gray-800 px-4 py-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-white mb-2">Administrator Dashboard</h1>
            <p class="text-gray-300">Welcome back, Administrator</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Total Users Card -->
            <div class="bg-gradient-to-r from-emerald-600 to-emerald-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-200 text-sm font-medium">Total Users</p>
                        <p class="text-white text-3xl font-bold">{{ $totalUsers }}</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Wallet Card -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-200 text-sm font-medium">Total Wallet</p>
                        <p class="text-white text-3xl font-bold">₦{{ number_format($totalWallet, 2) }}</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Transactions Card -->
            <div class="bg-gradient-to-r from-purple-600 to-purple-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-200 text-sm font-medium">Total Transactions</p>
                        <p class="text-white text-3xl font-bold">{{ $totalTransaction }}</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Active Investments Card -->
            <div class="bg-gradient-to-r from-amber-600 to-amber-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-200 text-sm font-medium">Active Investments</p>
                        <p class="text-white text-3xl font-bold">{{ $totalActiveInvestment }}</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Assets Card -->
            <div class="bg-gradient-to-r from-red-600 to-red-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-200 text-sm font-medium">Total Assets</p>
                        <p class="text-white text-3xl font-bold">₦{{ number_format($total_asset, 2) }}</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Products Card -->
            <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-200 text-sm font-medium">Total Products</p>
                        <p class="text-white text-3xl font-bold">{{ $totalProduct }}</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <a href="{{ route('all-transaction') }}" class="bg-gray-800 hover:bg-gray-700 rounded-lg p-4 text-center transition-all duration-300 transform hover:-translate-y-1">
                <div class="bg-emerald-600 bg-opacity-20 p-3 rounded-full inline-flex items-center justify-center mb-2">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 .5a9.5 9.5 0 1 0 0 19 9.5 9.5 0 0 0 0-19ZM8.374 17.4a7.6 7.6 0 0 1-5.9-7.4c0-.83.137-1.655.406-2.441l.239.019a3.887 3.887 0 0 1 2.082 2.5 4.1 4.1 0 0 0 2.441 2.8c1.148.522 1.389 2.007.732 4.522Zm3.6-8.829a.997.997 0 0 0-.027-.225 5.456 5.456 0 0 0-2.811-3.662c-.832-.527-1.347-.854-1.486-1.89a7.584 7.584 0 0 1 8.364 2.47c-1.387.208-2.14 2.237-2.14 3.307a1.187 1.187 0 0 1-1.9 0Zm1.626 8.053-.671-2.013a1.9 1.9 0 0 1 1.771-1.757l2.032.619a7.553 7.553 0 0 1-3.132 3.151Z" />
                    </svg>
                </div>
                <span class="text-white font-medium block">All Transactions</span>
            </a>

            <a href="{{ route('fund-wallet') }}" class="bg-gray-800 hover:bg-gray-700 rounded-lg p-4 text-center transition-all duration-300 transform hover:-translate-y-1">
                <div class="bg-blue-600 bg-opacity-20 p-3 rounded-full inline-flex items-center justify-center mb-2">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                    </svg>
                </div>
                <span class="text-white font-medium block">Fund Account</span>
            </a>

            <a href="{{ route('withdraw-request') }}" class="bg-gray-800 hover:bg-gray-700 rounded-lg p-4 text-center transition-all duration-300 transform hover:-translate-y-1">
                <div class="bg-purple-600 bg-opacity-20 p-3 rounded-full inline-flex items-center justify-center mb-2">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="m7.164 3.805-4.475.38L.327 6.546a1.114 1.114 0 0 0 .63 1.89l3.2.375 3.007-5.006ZM11.092 15.9l.472 3.14a1.114 1.114 0 0 0 1.89.63l2.36-2.362.38-4.475-5.102 3.067Zm8.617-14.283A1.613 1.613 0 0 0 18.383.291c-1.913-.33-5.811-.736-7.556 1.01-1.98 1.98-6.172 9.491-7.477 11.869a1.1 1.1 0 0 0 .193 1.316l.986.985.985.986a1.1 1.1 0 0 0 1.316.193c2.378-1.3 9.889-5.5 11.869-7.477 1.746-1.745 1.34-5.643 1.01-7.556Zm-3.873 6.268a2.63 2.63 0 1 1-3.72-3.72 2.63 2.63 0 0 1 3.72 3.72Z" />
                    </svg>
                </div>
                <span class="text-white font-medium block">Withdraw Requests</span>
            </a>

            <a href="{{ route('deposit') }}" class="bg-gray-800 hover:bg-gray-700 rounded-lg p-4 text-center transition-all duration-300 transform hover:-translate-y-1">
                <div class="bg-amber-600 bg-opacity-20 p-3 rounded-full inline-flex items-center justify-center mb-2">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                    </svg>
                </div>
                <span class="text-white font-medium block">Deposits</span>
            </a>
        </div>

        <!-- Admin Navigation -->
        <div class="bg-gray-800 rounded-xl p-6 shadow-lg">
            <h2 class="text-xl font-bold text-white mb-4">Admin Controls</h2>

            <div class="space-y-3">
                <!-- All Users -->
                <a href="{{ route('allusers') }}" class="flex items-center justify-between p-3 bg-gray-700 hover:bg-gray-600 rounded-lg transition-all duration-300">
                    <div class="flex items-center">
                        <div class="bg-emerald-600 bg-opacity-20 p-2 rounded-lg mr-3">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.077.019a4.658 4.658 0 0 0-4.083 4.714V7H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-1.006V4.68a2.624 2.624 0 0 1 2.271-2.67 2.5 2.5 0 0 1 2.729 2.49V8a1 1 0 0 0 2 0V4.5A4.505 4.505 0 0 0 15.077.019ZM9 15.167a1 1 0 1 1-2 0v-3a1 1 0 1 1 2 0v3Z" />
                            </svg>
                        </div>
                        <span class="text-white font-medium">All Users</span>
                    </div>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>

                <!-- All Orders -->
                <a href="{{ route('all-order') }}" class="flex items-center justify-between p-3 bg-gray-700 hover:bg-gray-600 rounded-lg transition-all duration-300">
                    <div class="flex items-center">
                        <div class="bg-blue-600 bg-opacity-20 p-2 rounded-lg mr-3">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="m19.728 10.686c-2.38 2.256-6.153 3.381-9.875 3.381-3.722 0-7.4-1.126-9.571-3.371L0 10.437V18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-7.6l-.272.286Z" />
                                <path d="m.135 7.847 1.542 1.417c3.6 3.712 12.747 3.7 16.635.01L19.605 7.9A.98.98 0 0 1 20 7.652V6a2 2 0 0 0-2-2h-3V3a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v1H2a2 2 0 0 0-2 2v1.765c.047.024.092.051.135.082ZM10 10.25a1.25 1.25 0 1 1 0-2.5 1.25 1.25 0 0 1 0 2.5ZM7 3a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1H7V3Z" />
                            </svg>
                        </div>
                        <span class="text-white font-medium">All Orders</span>
                    </div>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>

                <!-- All Products -->
                <a href="{{ route('all-product') }}" class="flex items-center justify-between p-3 bg-gray-700 hover:bg-gray-600 rounded-lg transition-all duration-300">
                    <div class="flex items-center">
                        <div class="bg-purple-600 bg-opacity-20 p-2 rounded-lg mr-3">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1ZM2 6v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H2Zm11 3a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0h2a1 1 0 0 1 2 0v1Z"/>
                            </svg>
                        </div>
                        <span class="text-white font-medium">All Products</span>
                    </div>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>

                <!-- All Contestants -->
                <a href="{{ route('admin.contest') }}" class="flex items-center justify-between p-3 bg-gray-700 hover:bg-gray-600 rounded-lg transition-all duration-300">
                    <div class="flex items-center">
                        <div class="bg-amber-600 bg-opacity-20 p-2 rounded-lg mr-3">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1ZM2 6v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H2Zm11 3a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0h2a1 1 0 0 1 2 0v1Z"/>
                            </svg>
                        </div>
                        <span class="text-white font-medium">All Contestants</span>
                    </div>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            <br />
            <br />
            <br />
        </div>
    </div>
</x-app-layout>