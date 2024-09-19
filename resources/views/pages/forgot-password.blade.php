@extends('layouts.app')

@section('content')
    @include('components.breadcrumb')
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
    
      @include('components.auth.forgot-password-form')
  </div>

@endsection
