@include('components.activity.constants')
@include('components.activity.activity-text', [
    'heading' => 'Description', 
    'paragraph' => "
        This tour takes us to the greenest of the emirates - Al Ain. This 'garden city' boasts a popular university, located at 120km from Dubai. Lush green farms of vegetables and date palms are abundant. Our next destination is the largest camel market in the U.A.E, where dealers come from around the Gulf to buy and sell racing animals. We then arrive at the Hili Gardens, famous for archaeological excavations from the third millennium B.0 and ancient tombs.
        <br><br>
        Proceeding towards Al Ain Museum and the palm oasis, we witness thousands of palm trees so typical of Arabia. 
        <br><br>
        We proceed to Jebel Hafeet - the tallest mountain in the U.A.E. A stunning bird's-eye view from Jebel Hafeet and the hot springs at the foot of the mountain create a lasting sensory experience. We proceed for lunch and shopping at Al Ain mall before returning to Dubai.
    ", 
])

@include('components.activity.activity-text', [
    'heading' => 'Highlights', 
    'paragraph' => "
        • Explore Al Ain City for lots of adventurous activities<br>
        • View the city's dramatic setting and its surroundings<br>
        • Spend time with families and at the zoo and public parks<br>
        • Check out camel racing events at the camel market
    ", 
])

@include('components.activity.activity-text', [
    'heading' => 'Itinerary', 
    'paragraph' => "
        • Jabel Hafeet <br>
        • Green Mubazzarah Hot Springs <br>
        • Al Ain Zoo ( Entry Tickets Included ) <br>
        • Al Ain Museum <br>
        • Al Ain Fort <br>
        • Al Ain Oasis <br>
        • Camel Marke <br>
    ", 
])

@include('components.activity.activity-text', [
    'heading' => 'What Included', 
    'paragraph' => "
        • Pickup and drop-off from Dubai by air-conditioned vehicle <br>
        • English-speaking guide <br>
        • Cold mineral water <br>
    ", 
])

@include('components.activity.activity-text', [
    'heading' => 'What`s not Included', 
    'paragraph' => "
        • All personal expenses spend during the tour.
    ", 
])

<div class="mt-5">
    <h2 class="text-lg md:text-xl text-secondary mb-3">
        Trip Instructions / Essentials
    </h2>
    <hr>
    <!-- Accordion Item 1 -->
    <div class="border border-gray-200 rounded-sm mt-5">
    <button class="w-full text-left p-2 px-4 flex justify-between items-center focus:outline-none toggle-accordion" data-target="accordion-1">
        <span class="text-lg font-medium">What to expect</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-200 transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    <div id="accordion-1" class="max-h-0 overflow-hidden transition-all duration-300">
        <div class="p-4 text-gray-600">
        Check out the oasis of Al Ain City when in Abu Dhabi. The city's dramatic setting and the craggy mountain surrounding it are some beautiful features of the city that'll leave you mesmerized.
        </div>
    </div>
    </div>

    <!-- Accordion Item 2 -->
    <div class="border border-gray-200 rounded-sm">
    <button class="w-full text-left p-2 px-4 flex justify-between items-center focus:outline-none toggle-accordion" data-target="accordion-2">
        <span class="text-lg font-medium">Booking confirmation</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-200 transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    <div id="accordion-2" class="max-h-0 overflow-hidden transition-all duration-300">
        <div class="p-4 text-gray-600">
        You'll get confirmation within minutes.<br>
        If you don't see any confirmation, reach out to our customer support.
        </div>
    </div>
    </div>

    <!-- Accordion Item 3 -->
    <div class="border border-gray-200 rounded-sm">
    <button class="w-full text-left p-2 px-4 flex justify-between items-center focus:outline-none toggle-accordion" data-target="accordion-3">
        <span class="text-lg font-medium">How to use?</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-200 transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    <div id="accordion-3" class="max-h-0 overflow-hidden transition-all duration-300">
        <div class="p-4 text-gray-600">
            The voucher is valid only on the specified date.
        </div>
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
