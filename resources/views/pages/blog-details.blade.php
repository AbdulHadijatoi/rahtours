@extends('layouts.app')

@section('content')
    @include('components.breadcrumb')

    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
        <!-- Blog Post Date and Title -->
        <button type="button" class="btn btn-sm btn-success px-5 text-white">{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</button>
        <h1 class="text-2xl font-bold w-full my-5">{{ $blog->title }}</h1>
        
        <!-- Blog Description -->
        <p class="text-justify text-gray-600"> {!! $blog->description !!} </p>

        <!-- Blog Contents -->
        @foreach($blog->contents as $index => $content)
        <div class="flex flex-col md:flex-row gap-8 py-10">
            @if($index % 2 === 0)
                <!-- Left Aligned Text, Right Aligned Image -->
                <div class="md:w-7/12">
                    <h3 class="text-xl font-semibold mb-4">{{ $content['title'] }}</h3>
                    <p class="text-gray-600 text-sm text-justify">{!! $content['description'] !!}</p>
                </div>
                <div class="md:w-5/12">
                    <img src="{{ url($content['image']) }}" alt="{{ $content['title'] }}" class="w-full object-cover rounded-md">
                </div>
            @else
                <!-- Right Aligned Text, Left Aligned Image -->
                <div class="md:w-5/12 order-2 md:order-1">
                    <img src="{{ asset($content['image']) }}" alt="{{ $content['title'] }}" class="w-full h-60 object-cover rounded-md">
                </div>
                <div class="md:w-7/12 order-1 md:order-2">
                    <h3 class="text-xl font-semibold mb-4">{{ $content['title'] }}</h3>
                    <p class="text-gray-600 text-sm text-justify">{!! $content['description'] !!}</p>
                </div>
            @endif
        </div>
        @endforeach

        <!-- FAQs Section -->
        <h3 class="text-xl font-semibold text-red-600 mt-10">FAQ's</h3>
        @foreach($blog->faqs as $faq)
        <div class="py-5">
            <h4 class="text-lg font-semibold">{{ $faq['question'] }}</h4>
            <p class="text-gray-600 text-sm mt-2 text-justify">{{ $faq['answer'] }}</p>
        </div>
        @endforeach
    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
@endsection
