<!-- Blade Template: bookings.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
        <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Title -->
            <h1 class="text-2xl font-bold py-8">Your Browsing History</h1>

            <!-- History Items -->
            <div id="activity-container" class="grid grid-cols-1 gap-6">
                
            </div>
        </div>
    </div>

<script>
    // Fetch activities from local storage (you may have multiple items in an array)
    const activityData = JSON.parse(localStorage.getItem('recentActivities')) || [];
    console.log("Activity Data: ",activityData);
    // Find the container where activities will be appended
    const activityContainer = document.getElementById('activity-container');

    // Function to sanitize HTML content (for description)
    function sanitizeHtml(unsafeHtml) {
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = unsafeHtml;
        return tempDiv.textContent || tempDiv.innerText || '';
    }

    // Function to populate activity data
    function populateActivities() {
        activityData.forEach(activity => {
            const activityHtml = `
                <div class="bg-white p-4 flex flex-wrap gap-8">
                    <div class="w-1/4">
                        <img src="${activity.image}" alt="${activity.name}" class="w-full h-full object-cover rounded-md" />
                    </div>

                    <div class="w-2/3 flex flex-col gap-4">
                        <h2 class="text-xl font-semibold">${activity.name}</h2>
                        <p class="text-gray-500">${sanitizeHtml(activity.description)}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500 text-lg">Duration:</span>
                            <span class="text-black text-lg">${activity.duration}</span>
                        </div>
                        
                    </div>
                </div>
            `;
            // Append the generated HTML to the container
            activityContainer.innerHTML += activityHtml;
        });
    }

    // Call the function to populate the data on page load
    populateActivities();
</script>
@endsection
