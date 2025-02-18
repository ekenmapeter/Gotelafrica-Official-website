<x-app-layout>
    <div class="flex flex-col items-center justify-center px-2 py-8 mb-44">
        <div class="flex gap-8 py-4">
            <!-- Inside your Blade view file -->
<a href="{{ route('dashboard') }}" class=" bg-black text-white font-bold py-2 px-4 rounded">
    Back
</a>
<p class="text-white text-2xl font-bold">Customer Services</p>

        </div>
        <div class="flex w-1/2 gap-4 items-center justify-center">

<div class="row mt-2">
    <!-- item -->
    <div class="col-12">
        <a  href="javascript:void(0);"  data-href="7596070695" class="towhatsapp">
        <div class="iconedBox">
            <div class="iconWrap ">
                <img class="w-8 h-8 bg-black rounded-lg" src="images/app-outlined.png">
            </div>
            <h4 class="title">Whats apps</h4>
          <p class="mb-0"> The first contact, the account manager will provide you with professional and fast service</p>

        </div></a>
    </div>
    <!-- item -->
    <div class="divider mt-1 mb-2"></div>
    <!-- item -->
    <div class="col-12">
        <a href="javascript:void(0);" data-href="1" class="totelegram">
        <div class="iconedBox">
            <div class="iconWrap ">
                <img class="w-8 h-8 bg-black rounded-lg" src="images/app-outlined2.png">
            </div>
            <h4 class="title">
                    Telegrams</h4>
        <p class="mb-0">
                    If you don’t have WHATSAPP, you can contact your account manager via Telegram, which will do for you

                </p>

        </div></a>
    </div>

</div>

</div>

</div>
@include('components.live_chat')

</x-app-layout>
