@extends('layouts.app')



@section('content')
    @include('components.breadcrumb')
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-10">

        {{-- Grid layout --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-7 mt-5">
            {{-- Left aside --}}
            <div class="col-span-1 shadow-md p-3 h-[40rem] mx-auto w-full">
                @include('components.search.left-aside')
            </div>

            {{-- Right aside --}}
            <div class="col-span-3 mx-auto w-full">
                @include('components.search.right-aside')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Grab the button, dropdown items, and dropdown menu
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownItems = document.querySelectorAll('.dropdown-item');
        const dropdownMenu = document.getElementById('dropdownMenu');

        // Toggle the dropdown visibility on button click
        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        // Add a click event listener to each dropdown item
        dropdownItems.forEach(item => {
            item.addEventListener('click', function() {
                // Set the button text to the selected item
                dropdownButton.textContent = this.textContent;

                // Hide the dropdown menu after selection
                dropdownMenu.classList.add('hidden');

                // Optional: You can add additional logic here for sorting or filtering the results
            });
        });

        // Close dropdown if clicked outside
        document.addEventListener('click', function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });

</script>

{{-- Custom Styles for the slider --}}
<style>
    .range {
        -webkit-appearance: none;
        width: 100%;

        background: #eee;
        outline: none;
        opacity: 0.7;
        transition: opacity 0.2s;
    }

    .range:hover {
        opacity: 1;
    }

    .range::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 20px;
        height: 20px;
        background: #ee8e3b;
        border-radius: 50%;
        cursor: pointer;
    }

    .range::-moz-range-thumb {
        width: 20px;
        height: 20px;
        background: #ee8e3b;
        border-radius: 50%;
        cursor: pointer;
    }
</style>

{{-- JavaScript to update the values dynamically --}}
<script>
    const minSlider = document.getElementById('min_budget');
    const maxSlider = document.getElementById('max_budget');
    const minLabel = document.getElementById('minBudgetLabel');
    const maxLabel = document.getElementById('maxBudgetLabel');

    // Update the displayed value as the sliders are dragged
    function updateBudgetValues() {
        minLabel.textContent = minSlider.value;
        maxLabel.textContent = maxSlider.value;
    }

    // Add event listeners to update values in real-time
    minSlider.addEventListener('input', updateBudgetValues);
    maxSlider.addEventListener('input', updateBudgetValues);
</script>
@endsection