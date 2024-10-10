
@extends('layouts.app')



@section('content')
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
      @if(!empty($orders) && $orders->count()>0)
        <ul tabindex="0" id="recentActivitiesList" class=" p-2 mt-5">
            @foreach ($orders as $order)  
              @include('components.activity.booking-help-card')
            @endforeach
        </ul> 
      @else
        <div class="flex justify-center items-center">
          <div class="flex flex-col items-center">
            <h1 class="text-3xl font-extrabold">No Booking found</h1>
            <a href="{{ url('/dubai-activities') }}" class="btn rounded mt-10">Find things to do</a>
          </div>
        </div>
      @endif 
    </div>
</div>
@endsection

@section('scripts')


@endsection