<div class="dropdown">
    <a tabindex="0" role="button" class="transition hover-text-secondary border-transparent">Recently Viewed</a>

    <ul tabindex="0" id="recentActivitiesList" class="flex flex-col flex-nowrap dropdown-content menu bg-base-100 rounded z-[20] w-[20rem] max-h-[25rem] overflow-scroll p-2 shadow mt-5">
        <!-- Activities will be dynamically populated here -->
    </ul>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fetch recently viewed activities from localStorage
        const activities = JSON.parse(localStorage.getItem('recentActivities')) || [];

        // Function to populate the dropdown with recent activities
        function populateRecentActivities() {
            const recentActivitiesList = document.getElementById('recentActivitiesList');
            
            // Clear the existing activities
            recentActivitiesList.innerHTML = '';

            // Loop through activities and generate the HTML
            activities.forEach(activity => {
                // Determine the price and label (group or per person)
                let priceLabel = '';
                let price = 0;

                if (activity.group_price && activity.group_price > 0) {
                    price = activity.group_price;
                    priceLabel = 'Per Group';
                } else {
                    price = activity.adult_price;
                    priceLabel = 'Per Person';
                }

                // Create list item for each activity
                const listItem = `
                    <li class="w-full" style="padding: 0px !important;">
                        <a href="/dubai-activities/${activity.category_slug}/${activity.slug}" class="w-full flex items-center p-2 border-none rounded-none hover:bg-gray-100">
                            <img src="${activity.image}" alt="${activity.name}" class="w-16 h-16 rounded object-cover mr-4">
                            <div class="flex flex-col justify-between flex-wrap flex-1 w-auto">
                                <p class="text-xs font-semibold text-gray-900 text-wrap">${activity.name}</p>
                                <p class="text-xs text-gray-500 w-full flex justify-between items-center mt-1">
                                    <span>${priceLabel}</span> 
                                    <span class="text-sm font-bold text-secondary">AED ${price}</span>
                                </p>
                            </div>
                        </a>
                    </li>
                `;

                // Append the item to the list
                recentActivitiesList.insertAdjacentHTML('beforeend', listItem);
            });
        }

        // Call the function to populate the list on page load
        populateRecentActivities();
    });
</script>
