<x-guest-layout>
    <div class="flex flex-col items-center justify-center px-2 py-8 mb-44">
        <div class="flex gap-8 py-4">
            <!-- Inside your Blade view file -->
<a href="{{ route('dashboard') }}" class=" bg-white text-black font-bold py-2 px-4 rounded">
    Back
</a>
<p class="text-white text-2xl font-bold">Customer Services</p>

        </div>
        <div class="flex w-1/2 gap-4 items-center justify-center">


</div>

</div>
@include('components.live_chat')

</x-guest-layout>
