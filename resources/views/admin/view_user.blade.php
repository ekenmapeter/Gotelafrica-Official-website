<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 px-4 py-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                <div class="flex items-center gap-4">
                    <a href="{{ route('administrator') }}" class="flex items-center gap-2 bg-white text-blue-600 font-medium py-2 px-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-200 border border-blue-100 hover:border-blue-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Back
                    </a>
                    <h1 class="text-2xl font-bold text-gray-800">User Details</h1>
                </div>

                @if(session()->has('impersonator_id'))
                    <a href="{{ route('stop-impersonating') }}"
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Stop Impersonating
                    </a>
                @else
                    <a href="{{ route('impersonate', $user->id) }}"
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Impersonate User
                    </a>
                @endif
            </div>

            <!-- User Details Card -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 mb-8">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Personal Information</h2>
                            <dl class="space-y-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $user->first_name }} {{ $user->other_name }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $user->email }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Phone</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $user->phone }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Joined Date</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $user->created_at->format('M d, Y') }}</dd>
                                </div>
                            </dl>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Account Information</h2>
                            <dl class="space-y-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Wallet Balance</dt>
                                    <dd class="mt-1 text-sm text-gray-900">₦{{ number_format($user->wallet->balance ?? 0, 2) }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Recharge Balance</dt>
                                    <dd class="mt-1 text-sm text-gray-900">₦{{ number_format($user->recharge->amount ?? 0, 2) }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Account Status</dt>
                                    <dd class="mt-1">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $user->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Transactions -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Recent Transactions</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($transactions as $transaction)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ $transaction->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $transaction->type }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">₦{{ number_format($transaction->amount, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $transaction->status ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $transaction->status ? 'Completed' : 'Pending' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $transaction->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No transactions found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
