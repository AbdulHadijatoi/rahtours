
@extends('layouts.app')



@section('content')
  @include('components.hero-common', ['page_banner_image'=>$data->image])
  <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
      <h1 class="text-2xl font-semibold text-orange-500">
          Privacy Policy
      </h1>
      
      <p class="mt-4">
          RAH Tourism LLC collects information about its customers both during the order process and as customers navigate the following website:
          <a href="https://www.rahtours.ae" class="text-secondary underline">
              https://www.rahtours.ae
          </a>
      </p>

      <p class="mt-4">
          The information provided by customers during the ordering process such as their name, physical address, email address, and payment information is considered private, and Book RAH Tours will not sell this personal information to third parties. This information will be used to process your order and deliver it to you in a timely fashion. In addition, RAH Tours reserves the right to contact existing customers regarding store specials and other significant events.
      </p>

      <h2 class="text-lg font-semibold mt-8">Purpose of collecting information</h2>
      <p class="mt-4">The information requested is for the below reasons:</p>
      <ul class="list-disc list-inside mt-4">
          @foreach($texts as $text)
              <li>{{ $text }}</li>
          @endforeach
      </ul>

      <h2 class="text-lg font-semibold mt-8">Data Protection Policy:</h2>
      <p class="mt-4">
          All credit/debit cards details and personally identifiable information will NOT be stored, sold, shared, rented or leased to any third parties.
      </p>

      <p class="mt-4">
          The information provided by customer and visitors of Rahtours will be held only by RAH Tours and its duly authorized agents. Your information will not be given or sold to any outside organization for its use in marketing or any other promotion purposes.
      </p>

      <h2 class="text-lg font-semibold mt-8">Use of your information:</h2>
      <p class="mt-4">
          The information of our clients and visitors will be used by Rahtours Portal for market analysis and production of internal reports, for marketing our products and services generally and (subject to any objection or preference you may indicate when submitting your details to us) for sending information to you about our products and services from time to time. In case of any objection from any of our clients and visitors on the same, necessary action will be taken.
      </p>

      <h2 class="text-lg font-semibold mt-8">Third Party Service Providers</h2>
      <p class="mt-4">
          RAH Tours may share your information provided with your order with third-party service providers who provide services related to your order. Examples of these third-party service providers include a credit card processing company and a hotel. Your personal information will not be used by any third party for purposes other than providing these services in relation to your order.
      </p>

      <p class="mt-4">
          Some of the advertisements you see on the Site are selected and delivered by third parties, such as ad networks, advertising agencies, advertisers, and audience segment providers. These third parties may collect information about you and your online activities, either on the Site or on other websites, through cookies, web beacons, and other technologies in an effort to understand your interests and deliver to you advertisements that are tailored to your interests. Please remember that we do not have access to, or control over, the information these third parties may collect. The information practices of these third parties are not covered by this privacy policy.
      </p>

      <h2 class="text-lg font-semibold mt-8">Legal Disclosure of Your Information</h2>
      <p class="mt-4">
          We reserve the right to disclose your personally identifiable information as required by law and when we believe that disclosure is necessary to protect our rights and/or comply with a judicial proceeding, court order, or legal process served on our Web site.
      </p>

      <h2 class="text-lg font-semibold mt-8">Transaction Security</h2>
      <p class="mt-4">
          All transactions occur through Secure Server. That means that we use encryption to secure information sent from your computer to our servers. In addition, for the safety of your credit card payments we do not insist on the credit card details; instead, we provide you direct link to Stripe Payment Gateway and processes under the 3D secure system.
      </p>

      <h2 class="text-lg font-semibold mt-8">Updating Your Information</h2>
      <p class="mt-4">
          If you ever need to update any information on file with Rahtours, you may call or email us at RAH Tours at (contact us). If you need to update your information when re-ordering, you will have a chance to make changes to your payment information, shipping, and billing address(es) at checkout.
      </p>

      <h2 class="text-lg font-semibold mt-8">Deleting Your Data</h2>
      <p class="mt-4">The information requested is for the below reasons:</p>
      <ul class="list-disc list-inside mt-4">
          @foreach($text_list2 as $text)
              <li>{{ $text }}</li>
          @endforeach
      </ul>

      <h2 class="text-lg font-semibold mt-8">What information does Book RAH Tours retain?</h2>
      <p class="mt-4">
          <a href="https://www.rahtours.ae" class="text-secondary underline">www.rahtours.ae</a> stores data about individuals in order to process bookings of services. We store the name, e-mail address, phone number, and nationality in order to create a booking/account, which is stored on our secure servers in Europe (France). This data is stored and used in accordance with our Privacy Policy as mentioned above. Individuals consent to the storing and processing of this data when creating an account or making a booking.
      </p>

      <ul class="list-disc list-inside mt-4">
          @foreach($text_list3 as $text)
              <li>{{ $text }}</li>
          @endforeach
      </ul>

      <p class="mt-4">
          Data may still remain in the system's backup files, which will be deleted periodically.
      </p>

      <p class="mt-4">
          We undertake to perform the deletion within one month (30 calendar days) and will send you a confirmation once the information has been deleted. Wherever possible, we will aim to complete the request in advance of the deadline.
      </p>

      <p class="mt-4">
          If you have additional questions about the privacy of your information, please contact RAH Tours at privacy@rahtours.ae.
      </p>

      <p class="mt-4">Mailing Address:</p>
      <p class="mt-4">RAH Tourism LLC</p>
      <p class="mt-4">Office # 714, Makateb Tower, Dubai - U.A.E</p>
      <p class="mt-4">T: +971 52 933 1100</p>
      <p class="mt-4">Last Updated on: May 14, 2024</p>

      <p class="mt-4">
          If we decide to change our privacy policy, we will post those changes to this privacy statement, the homepage, and other places we deem appropriate so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we disclose it. We reserve the right to modify this privacy statement at any time, so please review it frequently. If we make material changes to this policy, we will notify you here, by email, or by means of a notice on our homepage.
      </p>

      <p class="mt-4">
          The Website Policies and Terms & Conditions may be changed or updated occasionally to meet the requirements and standards. Therefore, customers are encouraged to frequently visit these sections in order to be updated about the changes on the website. Modifications will be effective on the day they are posted.
      </p>
  </div>

@endsection