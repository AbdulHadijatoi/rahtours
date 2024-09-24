{{-- Back to homepage button --}}
<div class="mb-4">
    <button onclick="window.location.href='{{ url('/') }}'" class="inline-flex items-center px-4 py-2 bg-secondary2 text-white font-semibold rounded">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to homepage
    </button>
</div>
<form action="{{ route('search.index') }}" method="GET">
    {{-- Category Selection with Checkboxes --}}
    <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-700">Select Categories</label>
        @foreach ($categories as $category)
        <div class="flex items-center mb-5">
            <input type="checkbox" id="category_{{ $category->id }}" value="{{ $category->id }}"
                name="categories[]" class="h-4 w-4 text-[#ee8e3b] border-gray-300 rounded focus:ring-[#ee8e3b]"
                {{ in_array($category->id, request()->input('categories', [])) ? 'checked' : '' }}>
            <label for="category_{{ $category->id }}" class="ml-2 text-sm text-gray-600">{{ $category->name }}</label>
        </div>
        @endforeach
    </div>

    {{-- Price Range with Dual Slider --}}
    <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-700">Budget</label>

        {{-- Min Budget Slider --}}
        <div class="flex items-center mb-4">
            <label class="text-sm font-medium text-gray-700 mr-3">Min</label>
            <input type="range" id="min_budget" name="min_budget" min="0" max="5000" value="{{ request()->input('min_budget', 0) }}" class="range range-accent w-full" oninput="document.getElementById('minBudgetLabel').innerText = this.value;">
            <span id="minBudgetLabel" class="ml-4 text-sm text-gray-700">{{ request()->input('min_budget', 0) }}</span> {{-- Dynamic label for min value --}}
        </div>

        {{-- Max Budget Slider --}}
        <div class="flex items-center">
            <label class="text-sm font-medium text-gray-700 mr-3">Max</label>
            <input type="range" id="max_budget" name="max_budget" min="0" max="5000" value="{{ request()->input('max_budget', 5000) }}" class="range range-accent w-full" oninput="document.getElementById('maxBudgetLabel').innerText = this.value;">
            <span id="maxBudgetLabel" class="ml-4 text-sm text-gray-700">{{ request()->input('max_budget', 5000) }}</span> {{-- Dynamic label for max value --}}
        </div>
    </div>

    <div class="text-right">
        <button type="submit"
            class="bg-[#ee8e3b] text-white px-4 py-2 rounded shadow hover:bg-[#d87a34] focus:outline-none focus:ring-2 focus:ring-[#ee8e3b]">
            Apply Filter
        </button>
    </div>
</form>
