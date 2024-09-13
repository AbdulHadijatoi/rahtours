<div class="container mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl flex items-center justify-start py-3 mx-auto capitalize h-12">
    @if(getMenu(3))
        @foreach (getMenu(3) as $category)
            <a href="{{ url('/dubai-activities/'. $category->slug) }}" class="transition-colors font-medium text-sm duration-300 transform mr-1.5 sm:mr-6 hover-text-secondary {{ isActive($category->slug) ? 'text-secondary' : '' }}">{{ $category->name }}</a>
        @endforeach
    @endif
</div>