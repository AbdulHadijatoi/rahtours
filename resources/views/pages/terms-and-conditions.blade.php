
@extends('layouts.app')



@section('content')
  @include('components.hero-common', ['page_banner_image'=>$data->image])
  <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">


        <h2 class="text-2xl font-bold text-yellow-500 mb-4">{{ $data->title }}</h2>

        <div class="mt-8">
            <h1 class="text-2xl font-semibold text-orange-600">Terms & Conditions</h1>
            <p class="text-gray-600 mt-4 text-sm">
                Thank you for choosing our tour packages. By booking a trip through our website, you’re deemed to have agreed to its terms of use. Please read the following terms and procedures in order to make sure that you’ve clearly understood the conditions of your preferred trip. Information below provides clear details of various services we offer at www.rahtours.ae, All of the below mentioned terms and conditions are applicable for bookings made through our websites such as:
            </p>

            <h2 class="text-xl font-semibold mt-8 text-secondary">1. Price, Payment and voucher issue</h2>

            <h3 class="text-lg font-semibold mt-4 text-black">A. Prices</h3>
            <div class="text-gray-600 mt-2">
                <p class="text-sm">Price quotations are subject to change without notice.</p>
                <p class="text-sm">If for any reason the price quoted is not correct, the team of www.rahtours.ae will contact you for authorization.</p>
                <p class="text-sm">Seasonal Surcharges/blackout rates, may apply during Islamic holidays, Christmas, New Year and Easter periods.</p>
                <p class="text-sm">Tips/gratuities, baggage or personal insurance, beverages or food not described in the product's description and all other purchases of a personal nature are not included.</p>
            </div>

            <h3 class="text-lg font-semibold mt-4 text-black">B. Payments</h3>
            <div class="text-gray-600 mt-2">
                <p class="text-sm">All tours/services must be pre-paid except otherwise stated. We accept Visa, MasterCard, American Express. Payment will be listed as "rahtours.ae” on the credit card statement. You will be charged in UAE Dirham (AED) at the conversion's rate applicable on the date of your booking.</p>
                <p class="text-secondary font-semibold mt-4">Online Payment: Master Card, Visa, American Express.</p>
                <p class="text-sm mt-2">Card Payment: Direct Card Payment, Apple Pay, Samsung Pay, Google Pay: Visa, MasterCard, American Express.</p>
            </div>

            <h3 class="text-lg font-semibold mt-4 text-black">C. Voucher Issue</h3>
            <div class="text-gray-600 mt-2">
                <p class="text-sm">After payment, Book RAH Tours will send a confirmation / voucher by e-mail: this voucher has to be printed, as a proof of purchase, and will be presented to the service provider/guide.</p>
                <p class="text-sm">All information regarding the travelers should be correctly given at the time of booking.</p>
                <p class="text-sm">All requests for modifications/amendments must be sent by email to Book RAH Tours.</p>
                <p class="text-sm mt-2">
                    <a href="/" class="text-secondary">www.rahtours.ae</a> cannot be held responsible for any problem that may happen if you don't receive or read carefully your confirmation / voucher. In case you have not received your voucher, you must notify Book RAH Tours at least 24 hours before the date of service.
                </p>
            </div>

            <h2 class="text-xl font-semibold mt-8 text-secondary">2. Cancellations, refund and procedure to cancel a booking</h2>

            <h3 class="text-lg font-semibold mt-4 text-black">A. Cancellation fee / refund</h3>
            <div class="text-gray-600 mt-2">
                <p class="text-sm">Every Tour Activity/Attraction has its own cancellation policies, before booking any activity with rahtours.ae, clients have to read cancellation policy of that particular tour. However, terms and conditions are subject to change.</p>
            </div>

            <h3 class="text-lg font-semibold mt-4 text-black">B. No Show</h3>
            <div class="text-gray-600 mt-2">
                <p class="text-sm">If you fail to turn up for the tour, no refunds in part or full can be provided. The same condition applies in the case of unused tickets, attraction and sightseeing tours, car-rental or chauffeur-driven services. Likewise, rescheduling cannot be allowed for confirmed tours, transfers to and from airports, and other travel related services.</p>
            </div>

            <h3 class="text-lg font-semibold mt-4 text-black">C. Modification of Terms</h3>
            <div class="text-gray-600 mt-2">
                <p class="text-sm">Attraction services covered in your package are subject to change based on local / weather conditions, airway schedules and such other several aspects. Should this transpire, we can provide suitable options of similar value, however depending on its availability. At most, we announce changes in itinerary, if any, before departure. Please note that www.rahtours.ae reserves complete right to implement minor amendments in itinerary at any time without reimbursement. Further, no reimbursement can be done in the event of vis major, such as flood and earthquake or any unforeseen circumstances.</p>
            </div>

            <h3 class="text-lg font-semibold mt-4 text-black">D. Website Usage Restrictions</h3>
            <div class="text-gray-600 mt-2">
                <p class="text-sm">All content in this website, including logos, pictures, images, information on tour package, attractions, pricing details, and other relevant details, are proprietary to Book RAH Tours. Accordingly, as a condition of this website´s usage, you agree not to exploit this website or its content for any non-personal, commercial, or illegitimate purposes.</p>
            </div>
        </div>
  </div>

@endsection