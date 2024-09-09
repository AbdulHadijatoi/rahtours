<a href="{{ url($card_link ?? '#') }}" class="card mx-auto card-compact bg-base-100 w-full border">
  <figure class="h-[13rem] bg-cover bg-center" style="background-image: url({{ url($card_image) }})">
  </figure>
  <div class="card-body h-[8rem] flex flex-column justify-between">
    <h2 class="text-md font-extrabold">{{ Str::limit($card_title, 55, '...') }}</h2>
    
    <div>
    @if(!empty($card_rating))
        @include('components.rating', ['card_rating', $card_rating, 'reviews' => $card_reviews])
    @endif
    
    @if(!empty($card_price))
    <div class="flex">
        <span class="text-sm font-extrabold mr-1 text-secondary">From AED {{ $card_price }}</span>
        <span class="text-sm text-gray-500 mr-1">Per person</span>
    </div>
    @endif
    
    @if(!empty($card_btn_text))
        <div class="card-actions justify-end">
            <button class="btn btn-primary">{{ $card_btn_text }}</button>
        </div>
    @endif
    </div>
  </div>
</a>
