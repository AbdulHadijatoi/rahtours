<a href="#" class="flex flex-col items-center w-[10rem]">
    <div class="w-[5rem] h-[5rem] bg-cover bg-center rounded-full" style="background-image: url('{{ url($category->image) }}')"></div>
    <p class="mt-2 font-semibold text-xs text-center">{{ $category->name }}</p>
</a>