@extends('layouts.app')



@section('content')
    <div class="bg-orange-500 h-[25vh] flex flex-col items-center justify-center p-5 gap-2">
        <!-- Gift Icon -->
        <svg class="w-24 h-24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 7V20M12 7H8.46429C7.94332 7 7.4437 6.78929 7.07533 6.41421C6.70695 6.03914 6.5 5.53043 6.5 5C6.5 4.46957 6.70695 3.96086 7.07533 3.58579C7.4437 3.21071 7.94332 3 8.46429 3C11.2143 3 12 7 12 7ZM12 7H15.5357C16.0567 7 16.5563 6.78929 16.9247 6.41421C17.293 6.03914 17.5 5.53043 17.5 5C17.5 4.46957 17.293 3.96086 16.9247 3.58579C16.5563 3.21071 16.0567 3 15.5357 3C12.7857 3 12 7 12 7ZM5 12H19V17.8C19 18.9201 19 19.4802 18.782 19.908C18.5903 20.2843 18.2843 20.5903 17.908 20.782C17.4802 21 16.9201 21 15.8 21H8.2C7.07989 21 6.51984 21 6.09202 20.782C5.71569 20.5903 5.40973 20.2843 5.21799 19.908C5 19.4802 5 18.9201 5 17.8V12ZM4.6 12H19.4C19.9601 12 20.2401 12 20.454 11.891C20.6422 11.7951 20.7951 11.6422 20.891 11.454C21 11.2401 21 10.9601 21 10.4V8.6C21 8.03995 21 7.75992 20.891 7.54601C20.7951 7.35785 20.6422 7.20487 20.454 7.10899C20.2401 7 19.9601 7 19.4 7H4.6C4.03995 7 3.75992 7 3.54601 7.10899C3.35785 7.20487 3.20487 7.35785 3.10899 7.54601C3 7.75992 3 8.03995 3 8.6V10.4C3 10.9601 3 11.2401 3.10899 11.454C3.20487 11.6422 3.35785 11.7951 3.54601 11.891C3.75992 12 4.03995 12 4.6 12Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
        <h1 class="text-white text-2xl md:text-3xl font-bold">Give a RAH Tours Gift Card</h1>
        <p class="text-white text-center text-sm md:text-lg w-2/3">Give the ones you love unforgettable travel experiences and make memories to last a lifetime with a RAH Tours gift card.</p>
    </div>

    <div class="flex justify-between items-start px-2 md:px-0 items-end mx-auto md:px-0 sm:max-w-md md:max-w-full lg:max-w-screen-md mb-6">
    @include('components.send-gift.gift-details')
    </div>
@endsection

@section('styles')

@endsection

@section('scripts')

<script>
    let discount = 0;

    function setDiscount(value) {
        discount = value;
        document.getElementById('discount').value = value;
    }

    function toggleReadMore() {
        const descriptionPreview = document.getElementById('descriptionPreview');
        const readMoreBtn = document.getElementById('readMoreBtn');
        const fullDescription = `{!! $activity->description !!}`;

        if (descriptionPreview.innerHTML === fullDescription.slice(0, 320)) {
            descriptionPreview.innerHTML = fullDescription;
            readMoreBtn.textContent = "Show Less";
        } else {
            descriptionPreview.innerHTML = fullDescription.slice(0, 320);
            readMoreBtn.textContent = "Read More";
        }
    }

</script>

<script>
    let selectedDiscount = 0;

    function setDiscount(value) {
        selectedDiscount = value;
        document.getElementById('discount').value = value;
    }

    document.getElementById('previewLink').addEventListener('click', function (e) {
        e.preventDefault();
        const activityId = '{{ $activity->id }}';
        const discount = selectedDiscount || document.getElementById('discount').value;

        if (discount) {
            window.location.href = `/gift/preview?activity_id=${activityId}&discount=${discount}`;
        } else {
            alert('Please select a discount value.');
        }
    });
</script>
@endsection