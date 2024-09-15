<a href="{{ url($card_link ?? '#') }}" class="card mx-auto card-compact bg-base-100 w-full border">
  <figure class="h-[13rem] bg-cover bg-center" style="background-image: url('{{ url($card_image) }}')">
  </figure>
  <div class="card-body h-[8rem] flex flex-column justify-between">
    <h2 class="text-md font-extrabold">{{ Str::limit($card_title, 55, '...') }}</h2>
    
    <div>
      @include('components.rating', ['card_rating', $card_rating??0, 'reviews' => $card_reviews??0])
    
    @if(!empty($activity))
    <div class="flex">

        @if($activity->packages[0]->category == "private")
            @if($activity->discount_offer > 0)
              <span class="text-sm font-extrabold mr-1 text-gray-500 line-through">From AED {{ $activity->packages[0]->price }}</span>
              <span class="text-sm font-extrabold mr-1 text-gray-500 text-secondary">From AED {{ getDiscountPrice($activity, 'private') }}</span>
            @else
              <span class="text-sm font-extrabold mr-1 text-gray-500">From AED {{ $activity->packages[0]->price }}</span>
            @endif
            
            <span class="text-sm text-gray-500 mr-1">Per Group</span>
        @else
            @if($activity->discount_offer > 0)
              <span class="text-sm font-extrabold mr-1 text-gray-500 line-through">From AED {{ $activity->packages[0]->adult_price }}</span>
              <span class="text-sm font-extrabold mr-1 text-gray-500 text-secondary">From AED {{ getDiscountPrice($activity) }}</span>
            @else
              <span class="text-sm font-extrabold mr-1 text-secondary">From AED {{ $activity->packages[0]->adult_price }}</span>
            @endif
            
            <span class="text-sm text-gray-500 mr-1">Per person</span>
        @endif
        
        
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
