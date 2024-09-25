@include('components.activity.constants')
@include('components.activity.activity-text', [
    'heading' => 'Description', 
    'id' => 'description', 
    'paragraph' => $activity->description, 
])

@include('components.activity.activity-text', [
    'heading' => 'Highlights', 
    'id' => 'highlights', 
    'paragraph' => $activity->highlights, 
])

@include('components.activity.activity-text', [
    'heading' => 'itinerary', 
    'id' => 'itinerary', 
    'paragraph' => $activity->itinerary, 
])

@include('components.activity.activity-text', [
    'heading' => 'what_included', 
    'id' => 'what_included', 
    'paragraph' => $activity->whats_included, 
])

@include('components.activity.activity-text', [
    'heading' => 'What`s not Included', 
    'id' => 'whats_not_included', 
    'paragraph' => $activity->whats_not_included, 
])

<div class="mt-5">
    <h2 class="text-lg md:text-xl text-secondary mb-3">
        Trip Instructions / Essentials
    </h2>
    <hr>
    @if(!empty($activity->instructions))
        @foreach($activity->instructions as $index => $instruction)
            <!-- Accordion Item -->
            <div class="border border-gray-200 rounded-sm mt-5">
                <button class="w-full text-left p-2 px-4 flex justify-between items-center focus:outline-none toggle-accordion" data-target="accordion-{{ $index }}">
                    <span class="text-lg font-medium">{{ $instruction->instruction_title }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-200 transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="accordion-{{ $index }}" class="max-h-0 overflow-hidden transition-all duration-300">
                    <div class="p-4 text-gray-600">
                        {!! $instruction->instruction_description !!}
                    </div>
                </div>
            </div>
        @endforeach
    @endif

</div>

<script>
  document.querySelectorAll('.toggle-accordion').forEach(button => {
    button.addEventListener('click', () => {
      const target = document.getElementById(button.getAttribute('data-target'));
      
      // Close all accordion items
      document.querySelectorAll('.toggle-accordion').forEach(item => {
        const itemTarget = document.getElementById(item.getAttribute('data-target'));
        if (itemTarget !== target) {
          itemTarget.style.maxHeight = '0';
          item.querySelector('svg').classList.remove('rotate-180');
        }
      });

      // Toggle the clicked accordion item
      if (target.style.maxHeight === '0px' || !target.style.maxHeight) {
        target.style.maxHeight = target.scrollHeight + 'px';
        button.querySelector('svg').classList.add('rotate-180');
      } else {
        target.style.maxHeight = '0';
        button.querySelector('svg').classList.remove('rotate-180');
      }
    });
  });
</script>
