<div class="card bg-base-100 w-96 border transition duration-500 ease-in-out transform hover:scale-105">
  <figure>
    <img src="{{ url($blog->banner_image) }}" alt="blog_image" />
  </figure>
  <div class="card-body">
    {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}
    <h2 class="card-title">{{ $blog->title }}</h2>
    <p>
    {!! Str::limit($blog->description, 155, '...') !!}
    </p>
    <a href="{{ url('/blogs/'.$blog->slug) }}" class="card-actions justify-end">
      <button class="btn btn-primary bg-secondary2 text-white">Read More</button>
    </a>
  </div>
</div>
