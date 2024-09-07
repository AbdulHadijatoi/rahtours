<div class="w-full mx-auto max-w-xs overflow-hidden bg-white">
    <img class="object-cover w-full h-56" src="{{ url($card_image) }}" alt="card_image">

    <div class="py-5 text-center">
        <a href="#" class="block text-xl font-bold text-gray-800" tabindex="0" role="link">{!! $card_title !!}</a>
        <span class="text-sm text-gray-700">{!! $card_text !!}</span>
    </div>
</div>