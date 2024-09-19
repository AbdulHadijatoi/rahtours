<!-- Blade Template: bookings.blade.php -->
@extends('layouts.app')

@section('content')
<div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">My Bookings</h1>
    <div class="min-w-full border rounded-lg overflow-hidden">
            
        <div id="errorMessage" class="hidden bg-red-100 text-red-700 p-4 rounded mb-4">

        </div>

        <div id="successMessage" class="hidden bg-green-100 text-green-700 p-4 rounded mb-4">

        </div>


        @if(!empty($bookings) && $bookings->count()>0)
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Tour Name
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Customer Name
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Tour Date
                    </th>
                    {{-- <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Tickets
                    </th> --}}
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Price
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex items-center">
                            <div class="ml-3">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $booking->activity_name }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $booking->first_name }} {{ $booking->last_name }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ \Carbon\Carbon::parse($booking->date)->format('Y-m-d') }}
                        </p>
                    </td>
                    {{-- <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">X Tickets</p>
                    </td> --}}
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">${{ number_format($booking->total_amount, 2) }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                            <span aria-hidden="true" class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                            <span class="relative">{{ $booking->status }}</span>
                        </span>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex space-x-2">
                            <button class="btn btn-sm text-indigo-600 hover:text-indigo-900" onclick="openEditDialog({{ $booking->id }}, '{{ $booking->date }}')">Edit</button>
                            <button class="btn btn-sm text-red-600 hover:text-red-900" onclick="confirmCancel({{ $booking->id }})">Cancel</button>
                            <button class="btn btn-sm text-green-600 hover:text-green-900" onclick="openViewDialog({{ $booking->id }})">View</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Custom Pagination Links -->
        <div class="flex justify-end border-none m-2">
            <div class="join">
                @if($bookings->onFirstPage())
                    <button class="join-item btn btn-sm btn-disabled">Previous</button>
                @else
                    <a href="{{ $bookings->previousPageUrl() }}" class="join-item btn btn-sm">Previous</a>
                @endif

                @if($bookings->currentPage() > 1)
                    <a href="{{ $bookings->url(1) }}" class="join-item btn btn-sm">1</a>
                @endif

                @if($bookings->currentPage() > 2)
                    <span class="join-item btn btn-sm btn-disabled">...</span>
                @endif

                @foreach(range(max(1, $bookings->currentPage() - 1), min($bookings->lastPage(), $bookings->currentPage() + 1)) as $page)
                    @if($page == $bookings->currentPage())
                        <span class="join-item btn btn-sm btn-disabled">{{ $page }}</span>
                    @else
                        <a href="{{ $bookings->url($page) }}" class="join-item btn btn-sm">{{ $page }}</a>
                    @endif
                @endforeach

                @if($bookings->currentPage() < $bookings->lastPage() - 1)
                    <span class="join-item btn btn-sm btn-disabled">...</span>
                @endif

                @if($bookings->currentPage() < $bookings->lastPage())
                    <a href="{{ $bookings->url($bookings->lastPage()) }}" class="join-item btn btn-sm">{{ $bookings->lastPage() }}</a>
                @endif

                @if($bookings->hasMorePages())
                    <a href="{{ $bookings->nextPageUrl() }}" class="join-item btn btn-sm">Next</a>
                @else
                    <button class="join-item btn btn-sm btn-disabled">Next</button>
                @endif
            </div>
        </div>
        @else
            <h2>No record found!</h2>
        @endif
    </div>
</div>

<!-- Edit Dialog -->
<div id="editDialog" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full px-4">
    <div class="relative top-20 mx-auto shadow-lg rounded-md bg-white max-w-md">
        <!-- Dialog content -->
        <div class="py-4 text-left px-6">
            <!-- Title -->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Edit Booking</p>
                <div class="cursor-pointer z-50" onclick="closeEditDialog()">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.59 4.59a2 2 0 0 0-2.83 0L9 7.34 6.24 4.59a2 2 0 0 0-2.83 2.82L6.34 10l-2.93 2.93a2 2 0 1 0 2.83 2.83L9 12.66l2.76 2.76a2 2 0 0 0 2.83-2.83L11.66 10l2.93-2.93a2 2 0 0 0 0-2.83z"></path>
                    </svg>
                </div>
            </div>
            <!-- Body -->
            <form id="editForm">
                @csrf
                <input type="hidden" name="bookingId" id="bookingId" value="">
                <div class="mb-4">
                    <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                    <input type="date" name="date" id="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex justify-end pt-2">
                    <button type="submit" class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Save</button>
                    <button type="button" class="modal-close px-4 bg-red-500 p-3 rounded-lg text-white hover:bg-red-400" onclick="closeEditDialog()">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Cancel Confirmation Dialog -->
<div id="cancelDialog" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full px-4">
    <div class="relative top-20 mx-auto shadow-lg rounded-md bg-white max-w-md">
        <!-- Dialog content -->
        <div class="py-4 text-left px-6">
            <!-- Title -->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Confirm Cancellation</p>
                <div class="cursor-pointer z-50" onclick="closeCancelDialog()">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.59 4.59a2 2 0 0 0-2.83 0L9 7.34 6.24 4.59a2 2 0 0 0-2.83 2.82L6.34 10l-2.93 2.93a2 2 0 1 0 2.83 2.83L9 12.66l2.76 2.76a2 2 0 0 0 2.83-2.83L11.66 10l2.93-2.93a2 2 0 0 0 0-2.83z"></path>
                    </svg>
                </div>
            </div>
            <!-- Body -->
            <p class="text-gray-700">Are you sure you want to cancel this booking?</p>
            <div class="flex justify-end pt-2">
                <button id="confirmCancel" class="px-4 bg-red-500 p-3 rounded-lg text-white hover:bg-red-400 mr-2">Confirm</button>
                <button type="button" class="modal-close px-4 bg-gray-500 p-3 rounded-lg text-white hover:bg-gray-400" onclick="closeCancelDialog()">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- View Dialog -->
<div id="viewDialog" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full px-4">
    <div class="relative top-20 mx-auto shadow-lg rounded-md bg-white max-w-md">
        <!-- Dialog content -->
        <div class="py-4 text-left px-6">
            <!-- Title -->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">View Booking Details</p>
                <div class="cursor-pointer z-50" onclick="closeViewDialog()">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.59 4.59a2 2 0 0 0-2.83 0L9 7.34 6.24 4.59a2 2 0 0 0-2.83 2.82L6.34 10l-2.93 2.93a2 2 0 1 0 2.83 2.83L9 12.66l2.76 2.76a2 2 0 0 0 2.83-2.83L11.66 10l2.93-2.93a2 2 0 0 0 0-2.83z"></path>
                    </svg>
                </div>
            </div>
            <!-- Body -->
            <div id="viewDetails" class="text-gray-700"></div>
            <div class="flex justify-end pt-2">
                <button type="button" class="modal-close px-4 bg-gray-500 p-3 rounded-lg text-white hover:bg-gray-400" onclick="closeViewDialog()">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openEditDialog(bookingId, bookingDate) {
        document.getElementById('editDialog').classList.remove('hidden');
        document.getElementById('bookingId').value = bookingId;
        document.getElementById('date').value = bookingDate; // Set the date field value
    }

    function closeEditDialog() {
        document.getElementById('editDialog').classList.add('hidden');
    }

    document.getElementById('editForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const bookingId = document.getElementById('bookingId').value;
        const date = document.getElementById('date').value;

        fetch(`/booking/${bookingId}/update`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ date })
        })
        .then(response => response.json())
        .then(data => {
            setInnerText('successMessage',data.message);
            closeEditDialog();
            location.reload(); // Reload the page to reflect changes
        })
        .catch(error => {
            console.error('Error updating booking:', error);
            setInnerText('errorMessage',error.message);
        });
    });

    function confirmCancel(bookingId) {
        document.getElementById('cancelDialog').classList.remove('hidden');
        document.getElementById('confirmCancel').setAttribute('data-id', bookingId);
    }

    function closeCancelDialog() {
        document.getElementById('cancelDialog').classList.add('hidden');
    }

    document.getElementById('confirmCancel').addEventListener('click', function() {
        const bookingId = this.getAttribute('data-id');
        
        fetch(`/booking/${bookingId}/cancel`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        })
        .then(response => response.json())
        .then(data => {
            if(data.status){
                setInnerText('successMessage',data.message);
            }else{
                setInnerText('errorMessage',data.message);
            }
            closeCancelDialog();
            //location.reload(); // Reload the page to reflect changes
        })
        .catch(error => {
            console.error('Error canceling booking:', error);
            setInnerText('errorMessage',error.message);
        });
    });

    function openViewDialog(bookingId) {
        fetch(`/booking/${bookingId}`)
        .then(response => response.json())
        .then(data => {
                //<p><strong>Tickets:</strong> X Tickets</p>
            document.getElementById('viewDetails').innerHTML = `
                <p><strong>Tour Name:</strong> ${data.booking.activity_name}</p>
                <p><strong>Customer Name:</strong> ${data.booking.first_name} ${data.booking.last_name}</p>
                <p><strong>Tour Date:</strong> ${data.booking.date}</p>
                <p><strong>Price:</strong> $${data.booking.total_amount}</p>
                <p><strong>Status:</strong> ${data.booking.status}</p>
            `;
            document.getElementById('viewDialog').classList.remove('hidden');
        })
        .catch(error => {
            console.error('Error fetching booking details:', error);
        });
    }

    function closeViewDialog() {
        document.getElementById('viewDialog').classList.add('hidden');
    }
</script>
@endsection
