<x-app-layout>
    <div class="flex flex-col items-center justify-center px-2 py-8 mb-44">
        <h1 class="text-white text-3xl font-bold mb-8">Video Contest Dashboard</h1>

        <!-- Main Content Container with Sidebar -->
        <div class="w-full max-w-7xl flex flex-col md:flex-row gap-8">
            <!-- Sidebar with User Info -->
            <div class="w-full md:w-64 flex-shrink-0">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="text-center mb-4">
                        <div class="w-24 h-24 rounded-full bg-gray-200 mx-auto mb-4 overflow-hidden">
                            @if(auth()->user()->profile_photo_url)
                                <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" class="w-full h-full object-cover">
                            @else
                                <svg class="w-full h-full text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            @endif
                        </div>
                        <h3 class="text-xl font-semibold">{{ auth()->user()->name }}</h3>
                        <p class="text-gray-500 text-sm truncate">{{ auth()->user()->email }}</p>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">Account Status</span>
                                <span class="px-2 py-1 text-xs rounded-full {{ $userSubmission && $userSubmission->is_approved ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $userSubmission && $userSubmission->is_approved ? 'Approved' : 'Pending' }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">Submissions</span>
                                <span class="text-sm font-medium">{{ $contestEntries->where('user_id', auth()->id())->count() }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">Total Votes</span>
                                <span class="text-sm font-medium">{{ $contestEntries->where('user_id', auth()->id())->sum('votes_count') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="flex-1 space-y-8">
                <!-- Upload Section -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-semibold mb-4">Share Your Video</h2>

                    @if($userSubmission && $userSubmission->is_approved)
                        <form action="{{ route('contest.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Video Title</label>
                                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                            </div>
                            <div>
                                <label for="video" class="block text-sm font-medium text-gray-700">Upload Video</label>
                                <input type="file" name="video" id="video" accept="video/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            </div>
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Submit Entry
                            </button>
                        </form>
                    @else
                        <div class="rounded-md bg-yellow-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-yellow-800">Payment Approval Required</h3>
                                    <div class="mt-2 text-sm text-yellow-700">
                                        <p>
                                            @if(!$userSubmission)
                                                Please submit your payment proof to participate in the video contest.
                                                <a href="{{ route('submission.create') }}" class="underline text-yellow-800 hover:text-yellow-900">
                                                    Click here to submit payment proof
                                                </a>
                                            @else
                                                Your payment proof is pending approval. You will be able to upload videos once approved.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Contest Entries Section -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <form action="{{ route('contest.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Video Title</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        </div>
                        <div>
                            <label for="video" class="block text-sm font-medium text-gray-700">Upload Video</label>
                            <input type="file" name="video" id="video" accept="video/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        </div>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Submit Entry
                        </button>
                    </form>
                </div>

                <!-- Contest Entries Section -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-semibold mb-6">Contest Entries</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($contestEntries ?? [] as $entry)
                            <div class="bg-gray-50 rounded-lg overflow-hidden shadow">
                                <div class="aspect-w-16 aspect-h-9">
                                    <video class="w-full h-full object-cover" controls>
                                        <source src="{{ $entry->video_url }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold">{{ $entry->title }}</h3>
                                    <p class="text-sm text-gray-600 mt-1">{{ $entry->description }}</p>
                                    <div class="mt-4 flex items-center justify-between">
                                        <div class="flex items-center space-x-2">
                                            <button class="text-indigo-600 hover:text-indigo-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                                </svg>
                                            </button>
                                            <span class="text-gray-600">{{ $entry->votes_count ?? 0 }}</span>
                                        </div>
                                        <span class="text-sm text-gray-500">By {{ $entry->user->name }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-8 text-gray-500">
                                No contest entries yet. Be the first to submit!
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>