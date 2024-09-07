<div class="w-full mx-auto mb-10 md:mb-0">
    <a href="{{ url($card_link ?? '#') }}">
        <img src="{{ url($card_image) }}" alt="" class="rounded-t shadow-2xl w-full object-cover"/>
        <div class="bg-white shadow rounded-b min-h-[10rem]">
            <div class="px-4">
                <h2 class="text-gray-700 text-xl font-medium pt-6">{!! $card_title !!}</h2>
                <p class="text-gray-500 pt-2 text-sm">{!! $card_text !!}</p>
            </div>
            @if(!empty($card_btn_text))
                <div class="bg-blue-700 w-72 lg:w-5/6 m-auto my-6 p-2 hover:bg-indigo-500 rounded text-white text-center shadow-xl">
                    <button class="lg:text-sm text-lg font-bold">{{ $card_btn_text }}</button>
                </div>
            @endif
        </div>
    </a>
</div>
