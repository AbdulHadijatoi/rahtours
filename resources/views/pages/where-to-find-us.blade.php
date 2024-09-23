
@extends('layouts.app')



@section('content')
  @include('components.hero-common')
  <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">

  <!-- Intro Section -->
  <div class="text-center text-gray-600">
    <p class="text-sm">
      Our teams are here to make your experience hassle-free. Contact us in the way that suits you best,
      call our customer support team or reach out to us via WhatsApp or email. Whatever channel you
      prefer, we’re here for you.
    </p>
  </div>

  <!-- Main Grid Section -->
  <div class="grid grid-cols-1 lg:grid-cols-7 gap-6 mt-6">
    <!-- Left Section -->
    <div class="lg:col-span-4">
      <!-- Image Section -->
      <div
        class="rounded-lg bg-center bg-cover bg-no-repeat"
        style="background-image: linear-gradient(90deg, rgba(0,0,0,0.1) 30%, rgba(0,0,0,0.1) 90%), url('{{ $data->image }}'); height: 35vh;">
        <div class="flex flex-col justify-center pl-6 pt-6">
          <h2 class="text-2xl font-semibold text-white cursor-pointer">In Dubai</h2>
        </div>
      </div>

      <!-- Google Maps Embed -->
      <div class="mt-4">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57748.61976995328!2d55.26235095346436!3d25.22719818879941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5cd858f39b1f%3A0x4e2c6269c59488d4!2sRAH%20Tourism%20LLC!5e0!3m2!1sen!2som!4v1722548063191!5m2!1sen!2som"
          width="100%" height="330" style="border: 0; border-radius: 15px;" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>

    <!-- Right Section -->
    <div class="lg:col-span-3 bg-gray-100 p-6 rounded-lg">
      <h3 class="text-2xl font-semibold text-secondary mb-4">Next Step</h3>

      <a href="mailto:{{ $data->email }}" class="block w-full bg-secondary2 text-white text-lg font-medium py-2 rounded-full text-center mb-4">Make an Enquiry</a>
      
      <hr class="border-gray-300 my-4">

      <!-- Contact Info -->
      <div class="space-y-4">
        <div class="flex justify-between">
          <span class="text-gray-600 font-medium">Telephone:</span>
          <a href="tel:{{ $data->phone }}" class="text-secondary font-medium">{{ $data->phone }}</a>
        </div>

        <div class="flex justify-between">
          <span class="text-gray-600 font-medium">Email:</span>
          <a href="mailto:{{ $data->email }}" class="text-secondary font-medium">{{ $data->email }}</a>
        </div>

        <div class="flex justify-between">
          <span class="text-gray-600 font-medium">WhatsApp:</span>
          <a href="https://wa.me/{{ $data->whatsapp }}" class="text-secondary font-medium">{{ $data->whatsapp }}</a>
        </div>
      </div>

      <!-- Additional Info -->
      <div class="mt-4 space-y-4">
        <div>
          <span class="font-medium text-lg">Location</span>
          <p class="text-gray-600">{{ $data->address }}</p>
        </div>

        <div class="flex justify-between">
          <span class="text-gray-600 font-medium">Timezone:</span>
          <span class="text-secondary font-medium">{{ $data->time_zone }}</span>
        </div>

        <div class="flex justify-between">
          <span class="text-gray-600 font-medium">Booking:</span>
          <a href="mailto:{{ $data->booking_email }}" class="text-secondary font-medium">{{ $data->booking_email }}</a>
        </div>

        <div class="flex justify-between">
          <span class="text-gray-600 font-medium">Business:</span>
          <a href="mailto:{{ $data->business_email }}" class="text-secondary font-medium">{{ $data->business_email }}</a>
        </div>

        <div class="flex justify-between">
          <span class="text-gray-600 font-medium">Press:</span>
          <a href="mailto:{{ $data->press_email }}" class="text-secondary font-medium">{{ $data->press_email }}</a>
        </div>

        <div class="flex justify-between">
          <span class="text-gray-600 font-medium">General:</span>
          <a href="mailto:{{ $data->general_email }}" class="text-secondary font-medium">{{ $data->general_email }}</a>
        </div>
      </div>
    </div>
  </div>

  </div>

@endsection