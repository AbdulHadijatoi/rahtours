<div class="rating flex items-center">
    @for ($i = 1; $i <= 5; $i++)
        @if($i <= $card_rating)
            <input type="radio" name="rating-2" class="mask mask-star-2 border-none mr-1 bg-orange-400" disabled />
        @else
            <input type="radio" name="rating-2" class="mask mask-star-2 border-none mr-1 bg-gray-300" disabled />
        @endif
    @endfor
    <span class="mr-1 {{ $textColor??'' }}">{{ $card_rating }}</span>
    <span class="{{ $textColor??'' }}">({{ $card_reviews }})</span>
</div>
