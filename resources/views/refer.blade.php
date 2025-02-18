<x-app-layout>
    <div class="flex flex-col items-center justify-center px-2 py-8 mb-44">
        <div class="flex gap-8 py-4">
            <!-- Inside your Blade view file -->
<a href="{{ url()->previous() }}" class=" bg-black text-white font-bold py-2 px-4 rounded">
    Back
</a>
<p class="text-white text-2xl font-bold">Refer Friends</p>

        </div>
        <div class="flex flex-col lg:w-1/2 w-full gap-4 items-center justify-center bg-black">
            <div class="text-white py-4 flex flex-col items-center justify-center">
                <p class="mb-2 mt-2">Your Invitation Code:</p>
                <div class="flex flex-col items-center justify-center gap-2">
                    <span class="pt-1 font-extrabold text-3xl" id="inviteCode">{{ $userCode->invite }}</span>

                    <p class="text-center px-2 mx-8 p-4 w-1/2 bg-green-400 py-2 text-white rounded-lg my-4" onclick="copyText()">Copy</p>

                </div>
                <div class="flex flex-col items-center justify-center gap-2">
                    <span class="text-center pt-1 font-extrabold text-1xl" id="inviteCode2">{{ $url }}</span>

                    <p class="text-center px-2 mx-8 p-4 w-1/2 bg-green-400 py-2 text-white rounded-lg my-4" onclick="copyText2()">Copy</p>

                </div>
            </div>
        </div>





<div class="relative overflow-x-auto mt-8 rounded-lg mb-32 lg:w-1/2 w-full">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-2 py-3">
                    Email
                </th>
                <th scope="col" class="px-2 py-3">
                    status
                </th>
                <th scope="col" class="px-2 py-3">
                    Registered
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($get_referral as $data)
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ \Illuminate\Support\Str::limit($data->email, 8) }}

                </th>
                <td class="px-2 py-4">
                    @if($data->status == 0)
                                        <span class="text-yellow-600">InActive</span>
                                    @elseif($data->status == 1)
                                        <span class="text-green-600">Active</span>
                                    @else
                                        Unknown Status
                                    @endif
                </td>
                <td class="px-2 py-4">
                    {{ \Carbon\Carbon::parse($data->created_at)->format('g:i A') }}
                </td>
            </tr>
            @endforeach

                        @if ($get_referral->isEmpty())
                            <!-- Display a row indicating no transactions found -->
                            <tr class="bg-white border-b">
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No transaction found</td>
                            </tr>
                        @endif
        </tbody>
    </table>
</div>


    </div>
<script>
function copyText() {
  // Get the text to be copied
  var copyText = document.getElementById("inviteCode").textContent;

  // Create a temporary element to hold the text
  var tempElement = document.createElement("textarea");
  tempElement.value = copyText;

  // Add the element to the body (but hidden)
  document.body.appendChild(tempElement);

  // Select all text in the temporary element
  tempElement.select();

  // Copy the text to the clipboard
  document.execCommand("copy");

  // Remove the temporary element
  document.body.removeChild(tempElement);

  // Display a success message using SweetAlert2 toast
  Swal.fire({
        icon: 'success',
        title: 'Invitation code copied!',
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000 // 3 seconds
    });
}


</script>

<script>
    function copyText2() {
      // Get the text to be copied
      var copyText2 = document.getElementById("inviteCode2").textContent;

      // Create a temporary element to hold the text
      var tempElement = document.createElement("textarea");
      tempElement.value = copyText2;

      // Add the element to the body (but hidden)
      document.body.appendChild(tempElement);

      // Select all text in the temporary element
      tempElement.select();

      // Copy the text to the clipboard
      document.execCommand("copy");

      // Remove the temporary element
      document.body.removeChild(tempElement);

      // Display a success message using SweetAlert2 toast
      Swal.fire({
            icon: 'success',
            title: 'Invitation code copied!',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000 // 3 seconds
        });
    }


    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</x-app-layout>
