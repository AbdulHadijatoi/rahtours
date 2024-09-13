<!-- Accordion Item 1 -->
<div class="border border-gray-200 rounded-sm">
  <button class="w-full text-left p-2 px-4 flex justify-between items-center focus:outline-none toggle-accordion" data-target="accordion-1">
    <span class="text-lg font-medium">What is Tailwind CSS?</span>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-200 transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
    </svg>
  </button>
  <div id="accordion-1" class="max-h-0 overflow-hidden transition-all duration-300">
    <div class="p-4 text-gray-600">
      Tailwind CSS is a utility-first CSS framework that provides low-level utility classes to build custom designs quickly without leaving your HTML.
    </div>
  </div>
</div>

<!-- Accordion Item 2 -->
<div class="border border-gray-200 rounded-sm">
  <button class="w-full text-left p-2 px-4 flex justify-between items-center focus:outline-none toggle-accordion" data-target="accordion-2">
    <span class="text-lg font-medium">How do I install Tailwind CSS?</span>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-200 transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
    </svg>
  </button>
  <div id="accordion-2" class="max-h-0 overflow-hidden transition-all duration-300">
    <div class="p-4 text-gray-600">
      You can install Tailwind CSS via npm or Yarn by running `npm install tailwindcss` or `yarn add tailwindcss`, then configuring it in your project.
    </div>
  </div>
</div>

<!-- Accordion Item 3 -->
<div class="border border-gray-200 rounded-sm">
  <button class="w-full text-left p-2 px-4 flex justify-between items-center focus:outline-none toggle-accordion" data-target="accordion-3">
    <span class="text-lg font-medium">What are the benefits of using Tailwind CSS?</span>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-200 transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
    </svg>
  </button>
  <div id="accordion-3" class="max-h-0 overflow-hidden transition-all duration-300">
    <div class="p-4 text-gray-600">
      Tailwind CSS offers flexibility, ease of use, and a small footprint, making it ideal for fast development and performance-focused applications.
    </div>
  </div>
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
