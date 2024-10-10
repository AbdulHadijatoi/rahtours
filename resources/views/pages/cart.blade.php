
@extends('layouts.app')



@section('content')
    @include('components.breadcrumb')
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
      @if(!empty($cartItems) && count($cartItems)>0)
        

        <div class="container mx-auto p-4">
          <div class="flex flex-col lg:flex-row gap-6">
            <div class="w-full lg:w-7/11 flex flex-wrap">
              @foreach ($cartItems as $cart_item)  
                @include('components.cart.cart-card')
              @endforeach
            </div>

            <div class="w-full lg:w-6/12">
              @include('components.cart.cart-summary')
            </div>
          </div>

          @include('components.cart.cart-footer')
        </div>
      @else
        <div class="flex justify-center items-center flex-col md:flex-row">
          <img class="w-[20rem] mr-5" src="{{ url('storage/uploads/emptycart.webp') }}">
          <div class="flex flex-col items-center">
            <h1 class="text-3xl font-extrabold">Your Cart is empty</h1>
            <a href="{{ url('/dubai-activities') }}" class="btn rounded mt-10">Find things to do</a>
          </div>
        </div>
      @endif
    </div>

@endsection