<div class="rating">
    @for ($i = 1; $i < 5; $i++)
        @if($i <= $card_rating)
            <input type="radio" name="rating-2" class="mask mask-star-2 border-none mr-1 bg-orange-400"/>
        @else
            <input type="radio" name="rating-2" class="mask mask-star-2 border-none mr-1 bg-gray-300"/>
        @endif
    @endfor
    <span class="mr-1">{{ $card_rating }}</span>
    <span>({{ $card_reviews }})</span>
</div>