
@extends('layouts.app')



@section('content')
  @include('components.hero-common', ['page_banner_image'=>$imageData->image])
  <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
  
    {{-- Data 1 Mapping --}}
      @foreach($data1 as $data)
          <div class="mt-6">
              <h2 class="text-xl font-semibold text-orange-500">{{ $data['title'] }}</h2>
              <ul class="mt-2 ml-6 list-disc">
                  @foreach($data['descriptions'] as $description)
                      <li class="text-gray-600 text-sm leading-relaxed">{{ $description }}</li>
                  @endforeach
              </ul>
          </div>
      @endforeach

      {{-- Seat Data Table --}}
      <table class="min-w-full mt-8">
          <thead class="bg-gray-200">
              <tr>
                  <th class="p-2 text-left font-semibold">Seat Type</th>
                  <th class="p-2 text-left font-semibold">Applicable For</th>
                  <th class="p-2 text-left font-semibold">Vehicles</th>
              </tr>
          </thead>
          <tbody>
              @foreach($seatData as $row)
                  <tr class="@if($loop->first) bg-orange-100 @endif">
                      <td class="p-2">{{ $row['seatType'] }}</td>
                      <td class="p-2">{{ $row['applicableFor'] }}</td>
                      <td class="p-2">{{ $row['vehicles'] }}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>

      {{-- Data 2 Mapping --}}
      @foreach($data2 as $data)
          <div class="mt-10">
              <h2 class="text-xl font-semibold text-orange-500">{{ $data['title'] }}</h2>
              <ul class="mt-2 ml-6 list-disc">
                  @foreach($data['descriptions'] as $description)
                      <li class="text-gray-600 text-sm leading-relaxed">{{ $description }}</li>
                  @endforeach

                  {{-- Link Data Rendering --}}
                  @if(!empty($data['link']))
                      @foreach($data['link'] as $link)
                          <div class="ml-6 flex items-center mt-2">
                              <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m2 4V9h-1l-2 4h-1m1 4h1m-2 0h1m-3-4a9 9 0 100 18 9 9 0 000-18zm3-3h1m4 4h1"></path>
                              </svg>
                              <a href="http://{{ $link }}" target="_blank" class="ml-2 text-sm text-gray-500 hover:underline">
                                  {{ $link }}
                              </a>
                          </div>
                      @endforeach
                  @endif
              </ul>
          </div>
      @endforeach

  </div>

@endsection