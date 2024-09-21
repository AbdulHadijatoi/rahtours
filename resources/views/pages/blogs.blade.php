
@extends('layouts.app')



@section('content')
  @include('components.hero-common')
  <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
      <h2 class="mx-auto text-3xl font-bold w-full text-center mb-5">Our Recent Blogs</h2>
      @if(!empty($blogs) && $blogs->count()>0)
        <div class="flex flex-wrap justify-center md:justify-start gap-10">
        @foreach ($blogs as $blog)  
          @include('components.blog.blog-card')
          @include('components.blog.blog-card')
          @include('components.blog.blog-card')
          @include('components.blog.blog-card')
          @include('components.blog.blog-card')
        @endforeach
        </div>
      @else
        <div class="flex justify-center items-center">
          <div class="flex flex-col items-center">
            <h2 class="text-3xl font-extrabold">No Blog found</h2>
          </div>
        </div>
      @endif
  </div>

@endsection