{{-- <div class="border-t"> --}}
  <div class="border-t">
  <div class="mx-auto px-4 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl flex justify-end">
      <div class="breadcrumbs text-sm {{ $text_color??'' }}">
          <ul>
              <li><a href="{{ url('/') }}">Home</a></li>
              @foreach(generateBreadcrumbs() as $breadcrumb)
                  @if (!$loop->last)
                      <li><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a></li>
                  @else
                      <li class="">{{ $breadcrumb['name'] }}</li>
                  @endif
              @endforeach
          </ul>
      </div>
  </div>
  </div>
{{-- </div> --}}