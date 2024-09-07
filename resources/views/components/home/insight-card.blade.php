<div class="relative col-span-2 md:col-span-2 lg:col-span-2 group h-full">
    <img src="{{ url($insight_image) }}" alt="Placeholder" class="w-full h-full md:h-full object-cover rounded-lg">
    <div class="absolute inset-0 bg-black bg-opacity-50 rounded-lg flex flex-col justify-end p-6 text-white transition-all duration-300 ease-in-out">
        <!-- Container for the h3 and a tag -->
        <div class="absolute bottom-0 left-0 right-0 p-6 transform group-hover:translate-y-[-110px] transition-transform duration-300 ease-in-out">
            <a href="#" class="text-xs block">{{ $insight_category }} {{ $insight_datetime }}</a>
            <h3 class="text-xl">{{ Str::limit($insight_title, 80) }}</h3> <!-- Limit title to 50 characters -->
        </div>
        <!-- Hidden elements that appear on hover -->
        <p class="text-sm mb-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 ease-in-out">
            {{ Str::limit($insight_text, 100) }} <!-- Limit text to 100 characters -->
        </p>
        <div class="flex items-center opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 ease-in-out">
            <img src="{{ $insight_user_image }}" alt="Author" class="rounded-full w-10 h-10 mr-3">
            <div class="text-sm">
                <p class="font-semibold">{{ $insight_user_name }}</p>
                <p>{{ $insight_user_designation }}</p>
            </div>
        </div>
    </div>
</div>
