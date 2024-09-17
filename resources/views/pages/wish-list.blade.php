
@extends('layouts.app')



@section('content')
    @include('components.breadcrumb')
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
      @if(getActivitiesByIds(session('wishlist', [])) && getActivitiesByIds(session('wishlist', []))->count()>0)
        <ul tabindex="0" id="recentActivitiesList" class=" p-2 mt-5">
            @foreach (getActivitiesByIds(session('wishlist', [])) as $activity)  
              @include('components.activity.wishlist-card')
            @endforeach
        </ul> 
      @else
        <div class="flex justify-center items-center">
          <img class="w-[20rem] mr-5" src="{{ url('storage/uploads/wishlist.webp') }}">
          <div class="flex flex-col items-center">
            <h2 class="text-3xl font-extrabold">Your Wishlist is empty</h2>
            <a href="{{ url('/dubai-activities') }}" class="btn rounded mt-10">Find things to do</a>
          </div>
        </div>
      @endif 
    </div>
</div>
@endsection

@section('scripts')


@endsection