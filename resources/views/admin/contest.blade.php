<x-app-layout>
    <div class="flex flex-col px-4 py-8 mb-44">
        <!-- Header Section -->
        <div class="max-w-7xl mx-auto w-full mb-8">
            <div class="lg:flex grid grid-cols-1 md:grid-cols-2 mt-4 justify-between items-center mb-6">
                <div class="flex items-center gap-4">
                    <a href="{{ route('administrator') }}" class="bg-black text-white font-bold py-2 px-4 rounded hover:bg-gray-800">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                            Back
                        </div>
                    </a>
                    <h1 class="text-white text-2xl font-bold">Contest Management</h1>
                </div>
                <div class="flex gap-4 mt-4">
                    <div class="bg-blue-500 p-4 rounded-lg text-white text-center">
                        <div class="text-2xl font-bold">{{ $submissions->total() }}</div>
                        <div class="text-sm">Total Submissions</div>
                    </div>
                    <div class="bg-green-500 p-4 rounded-lg text-white text-center">
                        <div class="text-2xl font-bold">{{ $submissions->where('is_approved', true)->count() }}</div>
                        <div class="text-sm">Approved</div>
                    </div>
                    <div class="bg-yellow-500 p-4 rounded-lg text-white text-center">
                        <div class="text-2xl font-bold">{{ $submissions->where('is_approved', false)->count() }}</div>
                        <div class="text-sm">Pending</div>
                    </div>
                </div>
            </div>

            <!-- Search and Filter Section -->
            <div class="bg-white p-4 rounded-lg shadow mb-6">
                <form action="{{ route('admin.contest') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Search name or email..."
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">All Status</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                        <select name="sort" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest First</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                            <option value="votes" {{ request('sort') == 'votes' ? 'selected' : '' }}>Most Votes</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                            Apply Filters
                        </button>
                    </div>
                </form>
        </div>

            <!-- Main Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                                <th scope="col" class="px-4 py-3">Name</th>
                                <th scope="col" class="px-4 py-3 hidden md:table-cell">Email</th>
                                <th scope="col" class="px-4 py-3 hidden md:table-cell">Phone</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3 hidden md:table-cell">Votes</th>
                                <th scope="col" class="px-4 py-3 hidden md:table-cell">Submitted</th>
                                <th scope="col" class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($submissions as $submission)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-4 py-3 font-medium text-gray-900">
                                    {{ $submission->full_name }}
                                </td>
                                    <td class="px-4 py-3 hidden md:table-cell">{{ $submission->email }}</td>
                                    <td class="px-4 py-3 hidden md:table-cell">{{ $submission->user->phone }}</td>
                                    <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $submission->is_approved ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $submission->is_approved ? 'Approved' : 'Pending' }}
                                    </span>
                                </td>
                                    <td class="px-4 py-3 hidden md:table-cell">
                                    <div class="flex items-center gap-2">
                                        <span class="font-medium">
                                            @if($submission->user && $submission->user->contestEntries)
                                                {{ $submission->user->contestEntries->sum('votes_count') }}
                                            @else
                                                0
                                            @endif
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                        </svg>
                                    </div>
                                </td>
                                    <td class="px-4 py-3 hidden md:table-cell">
                                    {{ $submission->created_at->format('M d, Y H:i') }}
                                </td>
                                    <td class="px-4 py-3">
                                    <div class="flex gap-2">
                                    @if(!$submission->is_approved)
                                            <button onclick="approveSubmission({{ $submission->id }})"
                                                    class="bg-green-500 text-white text-sm px-3 py-1 rounded-lg hover:bg-green-600">
                                                Approve
                                            </button>
                                    @endif
                                            <a href="{{ route('admin.submission.details', $submission->id) }}"
                                               class="bg-blue-500 text-white text-sm px-3 py-1 rounded-lg hover:bg-blue-600">
                                                View
                                            </a>
                                            <form action="{{ route('delete.submission', $submission->id) }}"
                                                  method="POST"
                                                  class="inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this submission?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="bg-red-500 text-white text-sm px-3 py-1 rounded-lg hover:bg-red-600">
                                                    Delete
                                                </button>
                                            </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                    No submissions found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>

                <!-- Pagination -->
                <div class="px-6 py-4 bg-gray-50">
                    {{ $submissions->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
