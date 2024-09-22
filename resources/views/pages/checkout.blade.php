
@extends('layouts.app')



@section('content')
    @include('components.breadcrumb')

    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-3">
      @include('components.checkout.stepper')

      <div class="flex flex-col lg:flex-row gap-x-4 mt-5">
        @include('components.checkout.checkout-left')

        @include('components.checkout.checkout-right')
      </div>

    </div>

@endsection