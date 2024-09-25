<div class="container mx-auto py-10">
    <form class="grid gap-8" id="discountAnchor" action="{{ route('sendGift.buyNow') }}" method="POST">
        @csrf
        <input type="hidden" name="activity_id" value="{{ $activity->id }}">
        <!-- Choose a value section -->
        <div>
            <h3 class="text-lg font-bold mb-3">Choose a value for gift card</h3>
            <div class="flex space-x-3">
                <a href="#discountAnchor" class="border border-yellow-500 text-secondary px-4 py-2" onclick="setDiscount(50)">AED 50</a>
                <a href="#discountAnchor" class="border border-yellow-500 text-secondary px-4 py-2" onclick="setDiscount(100)">AED 100</a>
                <a href="#discountAnchor" class="border border-yellow-500 text-secondary px-4 py-2" onclick="setDiscount(150)">AED 150</a>
                <a href="#discountAnchor" class="border border-yellow-500 text-secondary px-4 py-2" onclick="setDiscount(200)">AED 200</a>
                <a href="#discountAnchor" class="border border-yellow-500 text-secondary px-4 py-2" onclick="setDiscount(250)">AED 250</a>
            </div>
        </div>

        <!-- Discount Input -->
        <div>
            <label class="font-bold block mb-2">Enter Discount</label>
            <input type="number" required name="discount" id="discount" class="w-full p-3 border border-gray-300 rounded" placeholder="Discount">
        </div>

        <!-- Recipient Email -->
        <div>
            <label class="font-bold block mb-2">Recipient Email:</label>
            <input type="email" required id="recipientEmail" name="email" class="w-full p-3 border border-gray-300 rounded" placeholder="Recipient Email">
        </div>

        <!-- Personal Message -->
        <div>
            <label class="font-bold block mb-2">Personal Message</label>
            <textarea id="message" required name="message" class="w-full p-3 border border-gray-300 rounded" rows="5" placeholder="Write Your Personal Message"></textarea>
        </div>

        <!-- Activity Image and Description -->
        <div class=" flex flex-col border p-4 rounded-md gap-5">
            <div class="w-full">
                <img src="{{ $activity->image_url }}" alt="{{ $activity->name }}" class="w-full h-[20rem] object-cover rounded">
            </div>
            <div class="w-full">
                <h4 class="text-xl font-bold mb-3">{{ $activity->name }}</h4>
                <p id="descriptionPreview" class="text-gray-700">
                    {!! Str::limit($activity->description, 320) !!}
                </p>
                @if (strlen($activity->description) > 320)
                    <button type="button" onclick="toggleReadMore()" id="readMoreBtn" class="text-secondary mt-2">Read More</button>
                @endif
            </div>
        </div>

        <!-- Suggest Activity Section -->
        <div class="flex justify-between items-center mt-8">
            <h3 class="text-lg font-bold">Suggest this activity on this gift certificate.</h3>
            <div>
                <label for="yes" class="mr-3">Yes</label>
                <input type="radio" id="yes" name="suggestActivity" value="1" class="mr-3 focus:ring-0 text-[#ee8e3b] accent-[#ee8e3b]">
                <label for="no" class="mr-3">No</label>
                <input type="radio" id="no" name="suggestActivity" value="0" class="focus:ring-0 text-[#ee8e3b] accent-[#ee8e3b]">
            </div>
        </div>


        <!-- Buy and Preview Buttons -->
        <div class="flex space-x-4 mt-8 justify-end">
            <a href="#" id="previewLink" class="bg-gray-700 text-white px-6 py-2 rounded-md">Preview Card</a>

            <button type="submit" onclick="buyNow()" class="bg-orange-500 text-white px-6 py-2 rounded-md">Buy Now</button>
        </div>
    </form>
</div>
