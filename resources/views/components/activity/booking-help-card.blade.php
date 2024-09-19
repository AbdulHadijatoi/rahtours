<li class="mb-5">
    <div class="flex items-center p-4 shadow-md rounded-none hover:bg-gray-100 ">
        <a>
            <img src="{{ url($order->package->activity->image_url) }}" class="w-[12rem] min-h-[12rem] rounded object-cover mr-4">
        </a>
        <div class="flex flex-col justify-start items-between">
            <p class="text-3xl font-semibold text-gray-900 text-wrap mb-1">
                {{ $order->package->activity->name }}
            </p>
            <p class="text-lg font-semibold text-gray-700 text-wrap mb-1">
                {{ $order->package->title }}
            </p>
            <p class="text-2xl text-gray-700 text-wrap mb-2">
                {!! $order->package->highlight !!}
            </p>
            <p class="text-sm font-normal text-gray-700 text-wrap mb-1">
                Adult: {{ $order->adult }}
                Child: {{ $order->child }}
                Infant: {{ $order->infant }}
            </p>
            
            <span class="text-lg font-bold text-gray-600">Total Amount: <span class="text-secondary">AED {{ $order->total_price }}</span></span>
            
        </div>
    </div>
</li>



