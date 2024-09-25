<a href="{{ url('dubai-activities/'. $category->slug) }}" class="flex flex-col items-center min-w-[10rem]">
    <div class="w-[5rem] h-[5rem] bg-cover bg-center rounded-full {{ isActive($category->slug) ? 'border-4 border-yellow-600' : '' }}" style="background-image: url('{{ url($category->image) }}')"></div>
    <p class="mt-2 font-semibold text-xs text-center {{ isActive($category->slug) ? 'text-secondary' : '' }}">{{ $category->name }}</p>
</a>