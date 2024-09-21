<li class="mb-5">
    <div class="flex items-center p-4 shadow-md rounded-none hover:bg-gray-100 ">
        <a href="{{ url('dubai-activities/'.$activity->category->slug . '/' . $activity->slug) }}">
            <img src="{{ url($activity->image_url) }}" class="min-w-[12rem] max-w-[12rem] min-h-[12rem] rounded object-cover mr-4">
        </a>
        <div class="flex flex-col justify-start items-between">
            <a href="{{ url('dubai-activities/'.$activity->category->slug . '/' . $activity->slug) }}" class="text-2xl font-semibold text-gray-900 text-wrap mb-1">
                {{ $activity->name }}
            </a>
            <p class="text-sm font-normal text-gray-700 text-wrap mb-2">
                {!! Str::limit($activity->description, 300, '...') !!}
            </p>
            <p class="text-sm font-normal text-gray-700 text-wrap mb-1">
                Duration: {{ $activity->duration??0 }} hours
            </p>
            <p class="text-sm font-normal text-gray-700 text-wrap mb-1">Cancellation Before : {{ $activity->cancellation_duration ?? 0 }} hours</p>
            @if($activity->packages[0]->category == 'private')
            <span class="text-lg font-bold text-secondary">AED {{ $activity->packages[0]->price }}</span>
            @else
            <span class="text-lg font-bold text-secondary">AED {{ $activity->packages[0]->adult_price }}</span>
            @endif
            
            <a href="{{ url('remove-from-wishlist/'. $activity->id) }}" class="btn btn-sm w-[15rem] remove-from-wishlist">Remove from wishlist</a>
        </div>
    </div>
</li>