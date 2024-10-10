
@extends('layouts.app')



@section('content')
    @include('components.breadcrumb')
    @if(!empty($cartItems))
      <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-3">
        @include('components.checkout.stepper')

        <div class="flex flex-col lg:flex-row gap-x-4 mt-5" id="checkout_form">
          @include('components.checkout.checkout-left')

          @include('components.checkout.checkout-right')
        </div>
      </div>
    @else
      <div class="flex justify-center items-center flex-col md:flex-row my-10">
        <img class="w-[20rem] mr-5" src="{{ url('storage/uploads/emptycart.webp') }}">
        <div class="flex flex-col items-center">
          <h1 class="text-3xl font-extrabold">Nothing to checkout!</h1>
          <a href="{{ url('/dubai-activities') }}" class="btn rounded mt-10">Find things to do</a>
        </div>
      </div>
    @endif

@endsection

@section('scripts')
<script>

    function generateReference(length = 6) {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let result = '';
        const charactersLength = characters.length;
        
        for (let i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }

        return "RAH-" + result;
    }

    document.getElementById('pay-now-btn').addEventListener('click', function(event) {
        event.preventDefault();

        // Collect form field data
        const title = document.getElementById('title').value;
        const firstName = document.getElementById('first-name').value;
        const lastName = document.getElementById('last-name').value;
        const email = document.getElementById('email').value;
        const country = document.getElementById('country-dropdown').value;
        const phoneNumber = document.getElementById('phone-number').value;
        const specialRequest = document.getElementById('special-request').value;
        const pickupLocation = document.getElementById('pickup-location').value;
        const total_amount = document.getElementById('total_amount').innerHTML;
        const note = document.getElementById('note').value;
        const reference_id = generateReference();
        // Ensure required fields are not empty
        if (!firstName || !lastName || !email || !phoneNumber || !country) {
            document.getElementById('checkout_form').scrollIntoView({
                behavior: 'smooth', // Smooth scrolling
                block: 'start'      // Aligns the element to the top of the viewport
            });
            
            return;
        }

        // Collect cart_items from the controller's blade variables
        const cartItems = @json($cartItems); // Assuming cart_items is passed from the controller
        
        // Create a form and append necessary fields
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = "{{ route('placeOrder') }}";

        // CSRF Token
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = "{{ csrf_token() }}";
        form.appendChild(csrfToken);

        // Append form data
        const fields = {
            title, firstName, lastName, email, country, phoneNumber, specialRequest, pickupLocation, note, reference_id, total_amount, appliedVoucherId
        };

        for (const [key, value] of Object.entries(fields)) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = key;
            input.value = value;
            form.appendChild(input);
        }

        // Append cart items to form
        const cartInput = document.createElement('input');
        cartInput.type = 'hidden';
        cartInput.name = 'cart_items';
        cartInput.value = JSON.stringify(cartItems);
        form.appendChild(cartInput);

        // Append form to body and submit
        document.body.appendChild(form);
        form.submit();
    });
</script>
@endsection