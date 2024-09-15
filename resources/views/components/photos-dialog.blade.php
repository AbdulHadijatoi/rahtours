<dialog id="photos_dialog" class="modal">
  <div class="modal-box max-w-7xl min-h-[40rem] rounded-md">
    <div class="flex flex-wrap justify-start mx-auto pt-7">
      @if(!empty($activity->activityImages))
        @foreach ($activity->activityImages as $photo)  
          <figure class="w-[24rem] h-[15rem] bg-cover bg-center mr-3 mb-3" style="background-image: url('{{ url($photo->image_url) }}')"></figure>
        @endforeach
      @endif
    </div>
    <div class="modal-action">
      <form method="dialog">
        <button class="btn absolute bottom-5 right-5">Close</button>
      </form>
    </div>
  </div>
</dialog>