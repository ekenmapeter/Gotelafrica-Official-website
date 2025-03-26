<x-app-layout>
    <div class="flex flex-col px-4 py-8 mb-44">
        <div class="max-w-4xl mx-auto w-full">
            <!-- Header -->
            <div class="flex items-center gap-4 mb-6">
                <a href="{{ route('admin.contest') }}" class="bg-black text-white font-bold py-2 px-4 rounded hover:bg-gray-800">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Back
                    </div>
                </a>
                <h1 class="text-white text-2xl font-bold">Submission Details</h1>
            </div>

            <!-- Details Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6 space-y-6">
                    <!-- Status Banner -->
                    <div class="flex justify-between items-center bg-gray-50 p-4 rounded-lg">
                        <span class="text-lg font-semibold">Status:</span>
                        <span class="px-4 py-2 rounded-full text-sm font-semibold {{ $submission->is_approved ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $submission->is_approved ? 'Approved' : 'Pending' }}
                        </span>
                    </div>

                    <!-- Basic Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-gray-600 text-sm font-medium">Full Name</h3>
                            <p class="text-gray-900 font-semibold">{{ $submission->full_name }}</p>
                        </div>
                        <div>
                            <h3 class="text-gray-600 text-sm font-medium">Email</h3>
                            <p class="text-gray-900">{{ $submission->email }}</p>
                        </div>
                        <div>
                            <h3 class="text-gray-600 text-sm font-medium">Phone Number</h3>
                            <p class="text-gray-900">{{ $submission->user->phone ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <h3 class="text-gray-600 text-sm font-medium">Submission Date</h3>
                            <p class="text-gray-900">{{ $submission->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div>
                            <h3 class="text-gray-600 text-sm font-medium">Total Votes</h3>
                            <p class="text-gray-900">
                                @if($submission->user && $submission->user->contestEntries)
                                    {{ $submission->user->contestEntries->sum('votes_count') }}
                                @else
                                    0
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- Description -->
                    @if($submission->description)
                    <div>
                        <h3 class="text-gray-600 text-sm font-medium mb-2">Description</h3>
                        <p class="text-gray-900 bg-gray-50 p-4 rounded-lg">{{ $submission->description }}</p>
                    </div>
                    @endif

                    <!-- Payment Proof -->
                    @if($submission->payment_proof)
                    <div>
                        <h3 class="text-gray-600 text-sm font-medium mb-2">Payment Proof</h3>
                        <img src="{{ Storage::url('uploads/' . $submission->payment_proof) }}" alt="Payment Proof" class="max-w-full h-auto rounded-lg shadow">
                    </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="flex gap-4 pt-4 border-t">
                        @if(!$submission->is_approved)
                            <form action="{{ route('admin.submission.approve', $submission->id) }}"
                                  method="POST"
                                  class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                        class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">
                                    Approve Submission
                                </button>
                            </form>
                        @endif

                        <!-- Add Share Button -->
                        <button onclick="copyShareLink(this)"
                                class="bg-indigo-500 text-white px-6 py-2 rounded-lg hover:bg-indigo-600"
                                data-share-url="{{ route('contest.vote', ['shareToken' => $submission->share_token]) }}">
                            Share Entry
                        </button>

                        <form action="{{ route('delete.submission', $submission->id) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this submission? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600">
                                Delete Submission
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function approveSubmission(id) {
            if (confirm('Are you sure you want to approve this submission?')) {
                fetch(`/admin/submission/${id}/approve`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                }).then(response => {
                    if (response.ok) {
                        window.location.reload();
                    }
                });
            }
        }

        function copyShareLink(button) {
            const shareUrl = button.dataset.shareUrl;
            navigator.clipboard.writeText(shareUrl).then(() => {
                alert('Share link copied to clipboard!');
            }).catch(() => {
                // Fallback for browsers that don't support clipboard API
                const tempInput = document.createElement('input');
                tempInput.value = shareUrl;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);
                alert('Share link copied to clipboard!');
            });
        }
    </script>
    @endpush
</x-app-layout>