
@extends('layouts.app')



@section('content')
    @include('components.breadcrumb')
    @include('components.hero-help')
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
    
      <div class="grid gap-6 md:grid-cols-3 sm:grid-cols-1">
        <!-- Booking Card -->
        <div class="bg-white p-6 rounded-lg border text-center">
          <svg class="mx-auto w-14 mb-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7.25 7C7.25 6.58579 7.58579 6.25 8 6.25H16C16.4142 6.25 16.75 6.58579 16.75 7C16.75 7.41422 16.4142 7.75 16 7.75H8C7.58579 7.75 7.25 7.41422 7.25 7Z" fill="#ee8e3b"></path> <path d="M8 9.75C7.58579 9.75 7.25 10.0858 7.25 10.5C7.25 10.9142 7.58579 11.25 8 11.25H13C13.4142 11.25 13.75 10.9142 13.75 10.5C13.75 10.0858 13.4142 9.75 13 9.75H8Z" fill="#ee8e3b"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M9.94513 1.25C8.57754 1.24998 7.47521 1.24996 6.60825 1.36652C5.70814 1.48754 4.95027 1.74643 4.34835 2.34835C3.74643 2.95027 3.48754 3.70814 3.36652 4.60825C3.24996 5.47521 3.24998 6.57753 3.25 7.94512V16.0549C3.24998 17.4225 3.24996 18.5248 3.36652 19.3918C3.48754 20.2919 3.74643 21.0497 4.34835 21.6517C4.95027 22.2536 5.70814 22.5125 6.60825 22.6335C7.47522 22.75 8.57754 22.75 9.94513 22.75H14.0549C15.4225 22.75 16.5248 22.75 17.3918 22.6335C18.2919 22.5125 19.0497 22.2536 19.6517 21.6517C20.2536 21.0497 20.5125 20.2919 20.6335 19.3918C20.75 18.5248 20.75 17.4225 20.75 16.0549V7.94513C20.75 6.57754 20.75 5.47522 20.6335 4.60825C20.5125 3.70814 20.2536 2.95027 19.6517 2.34835C19.0497 1.74643 18.2919 1.48754 17.3918 1.36652C16.5248 1.24996 15.4225 1.24998 14.0549 1.25H9.94513ZM5.40901 3.40901C5.68577 3.13225 6.07435 2.9518 6.80812 2.85315C7.56347 2.75159 8.56459 2.75 10 2.75H14C15.4354 2.75 16.4365 2.75159 17.1919 2.85315C17.9257 2.9518 18.3142 3.13225 18.591 3.40901C18.8678 3.68577 19.0482 4.07435 19.1469 4.80812C19.2484 5.56347 19.25 6.56459 19.25 8V15.25L7.78198 15.25C6.96402 15.2497 6.40587 15.2495 5.92721 15.3778C5.49923 15.4925 5.10224 15.6798 4.75 15.9259V8C4.75 6.56459 4.75159 5.56347 4.85315 4.80812C4.9518 4.07435 5.13225 3.68577 5.40901 3.40901ZM4.77676 18.2491C4.79196 18.6029 4.81579 18.914 4.85315 19.1919C4.9518 19.9257 5.13225 20.3142 5.40901 20.591C5.68577 20.8678 6.07435 21.0482 6.80812 21.1469C7.56347 21.2484 8.56459 21.25 10 21.25H14C15.4354 21.25 16.4365 21.2484 17.1919 21.1469C17.9257 21.0482 18.3142 20.8678 18.591 20.591C18.8678 20.3142 19.0482 19.9257 19.1469 19.1919C19.2297 18.5756 19.246 17.7958 19.2492 16.75H7.89778C6.91952 16.75 6.57752 16.7564 6.31544 16.8267C5.59612 17.0194 5.02268 17.5541 4.77676 18.2491Z" fill="#ee8e3b"></path> </g></svg>
          <h2 class="text-lg font-semibold">Booking</h2>
          <p class="text-gray-600">You can book your activity online and receive your booking confirmation by email, together with a link to download the app.</p>
        </div>

        <!-- Payment Card -->
        <div class="bg-white p-6 rounded-lg border text-center">
          <svg class="mx-auto w-14 mb-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z" stroke="#ee8e3b" stroke-width="1.5"></path> <path d="M10 16H6" stroke="#ee8e3b" stroke-width="1.5" stroke-linecap="round"></path> <path d="M14 16H12.5" stroke="#ee8e3b" stroke-width="1.5" stroke-linecap="round"></path> <path d="M2 10L22 10" stroke="#ee8e3b" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
          <h2 class="text-lg font-semibold">Payment</h2>
          <p class="text-gray-600">When you make a booking, full payment by credit or debit card is required.</p>
        </div>

        <!-- Cancellation & Refunds Card -->
        <div class="bg-white p-6 rounded-lg border text-center">
          <svg class="mx-auto w-14 mb-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#ee8e3b"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="none" d="M0 0h24v24H0z"></path> <path d="M5.671 4.257c3.928-3.219 9.733-2.995 13.4.672 3.905 3.905 3.905 10.237 0 14.142-3.905 3.905-10.237 3.905-14.142 0A9.993 9.993 0 0 1 2.25 9.767l.077-.313 1.934.51a8 8 0 1 0 3.053-4.45l-.221.166 1.017 1.017-4.596 1.06 1.06-4.596 1.096 1.096zM13 6v2h2.5v2H10a.5.5 0 0 0-.09.992L10 11h4a2.5 2.5 0 1 1 0 5h-1v2h-2v-2H8.5v-2H14a.5.5 0 0 0 .09-.992L14 13h-4a2.5 2.5 0 1 1 0-5h1V6h2z"></path> </g> </g></svg>
          <h2 class="text-lg font-semibold">Cancellation & Refunds</h2>
          <p class="text-gray-600">Check the cancellation policy contained in the applicable product listing at the time of your booking.</p>
        </div>

        <!-- Booking Modification Card -->
        <div class="bg-white p-6 rounded-lg border text-center">
          <svg class="mx-auto w-14 mb-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 5L15 5" stroke="#ee8e3b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 8H15" stroke="#ee8e3b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 11H11" stroke="#ee8e3b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18.4563 13.5423L13.9268 18.0719C13.6476 18.3511 13.292 18.5414 12.9048 18.6188L10.8153 19.0367L11.2332 16.9472C11.3106 16.5601 11.5009 16.2045 11.7801 15.9253L16.3096 11.3957M18.4563 13.5423L19.585 12.4135C19.9755 12.023 19.9755 11.3898 19.585 10.9993L18.8526 10.2669C18.4621 9.8764 17.8289 9.8764 17.4384 10.2669L16.3096 11.3957M18.4563 13.5423L16.3096 11.3957" stroke="#ee8e3b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
          <h2 class="text-lg font-semibold">Booking Modification</h2>
          <p class="text-gray-600">Requests for modifications and amendments to a booking, including date change requests.</p>
        </div>

        <!-- Coupons & Cashbacks Card -->
        <div class="bg-white p-6 rounded-lg border text-center">
          <svg class="mx-auto w-14 mb-2" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>coupon_line</title> <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Business" transform="translate(-480.000000, 0.000000)" fill-rule="nonzero"> <g id="coupon_line" transform="translate(480.000000, 0.000000)"> <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero"> </path> <path d="M19,4 C20.597725,4 21.903664,5.24892392 21.9949075,6.82372764 L22,7 L22,8.81712 C22,9.42348923 21.6476686,9.89537609 21.224032,10.1466323 L21.1168,10.2048 C20.4531,10.5323 20,11.2142 20,12 C20,12.7296714 20.3906832,13.3697556 20.9778904,13.7196882 L21.1168,13.7952 C21.5503692,14.0090769 21.9360521,14.4507976 21.9928224,15.0341588 L22,15.1829 L22,17 C22,18.597725 20.7511226,19.903664 19.1762773,19.9949075 L19,20 L5,20 C3.40232321,20 2.09633941,18.7511226 2.00509271,17.1762773 L2,17 L2,15.1829 C2,14.5765308 2.35233136,14.1046183 2.77595223,13.8533661 L2.88318,13.7952 C3.54691,13.4677 4,12.7858 4,12 C4,11.2703286 3.60932546,10.6302444 3.02209542,10.2803118 L2.88318,10.2048 C2.44962923,9.99091385 2.06394781,9.54921799 2.0071776,8.96586074 L2,8.81712 L2,7 C2,5.40232321 3.24892392,4.09633941 4.82372764,4.00509271 L5,4 L19,4 Z M19,6 L5,6 C4.48716857,6 4.06449347,6.38604429 4.0067278,6.88337975 L4,7 L4,8.53534 C5.1939,9.22587 6,10.518 6,12 C6,13.404 5.27651967,14.6375634 4.18522683,15.3507193 L4,15.4647 L4,17 C4,17.51285 4.38604429,17.9355092 4.88337975,17.9932725 L5,18 L19,18 C19.51285,18 19.9355092,17.613973 19.9932725,17.1166239 L20,17 L20,15.4647 C18.8061,14.7741 18,13.482 18,12 C18,10.596 18.7234803,9.36240964 19.8147732,8.64931897 L20,8.53535 L20,7 C20,6.48716857 19.613973,6.06449347 19.1166239,6.0067278 L19,6 Z M10,9 C10.51285,9 10.9355092,9.38604429 10.9932725,9.88337975 L11,10 L11,14 C11,14.5523 10.5523,15 10,15 C9.48716857,15 9.06449347,14.613973 9.0067278,14.1166239 L9,14 L9,10 C9,9.44772 9.44772,9 10,9 Z" id="形状" fill="#ee8e3b"> </path> </g> </g> </g> </g></svg>
          <h2 class="text-lg font-semibold">Coupons & Cashbacks</h2>
          <p class="text-gray-600">You will be able to redeem your gift or promo code during the booking process.</p>
        </div>

        <!-- General Queries Card -->
        <div class="bg-white p-6 rounded-lg border text-center">
          <svg class="mx-auto w-14 mb-2" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .puchipuchi_een{fill:#ee8e3b;} </style> <path class="puchipuchi_een" d="M16,2C8.268,2,2,8.268,2,16s6.268,14,14,14s14-6.268,14-14S23.732,2,16,2z M16,26 c-0.552,0-1-0.448-1-1c0-0.552,0.448-1,1-1s1,0.448,1,1C17,25.552,16.552,26,16,26z M17,18.917V21c0,0.552-0.447,1-1,1s-1-0.448-1-1 v-3c0-0.552,0.447-1,1-1c2.206,0,4-1.794,4-4s-1.794-4-4-4s-4,1.794-4,4c0,0.552-0.447,1-1,1s-1-0.448-1-1c0-3.309,2.691-6,6-6 s6,2.691,6,6C22,15.968,19.834,18.439,17,18.917z"></path> </g></svg>
          <h2 class="text-lg font-semibold">General Queries</h2>
          <p class="text-gray-600">Can't find help? Contact us via contact page or helpline number.</p>
        </div>
      </div>

    
      <div class="mt-8 text-center">
        <h2 class="text-xl font-semibold mb-4">Can't find what you're looking for?</h2>
        <div class="flex justify-center gap-4">
          <!-- Chat with Us Button -->
          <a href="https://api.whatsapp.com/send/?phone=971529331100" target="_blank" class="bg-white p-6 rounded-lg border text-center">
            <svg class="mx-auto w-14 mb-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 10.5H16" stroke="#ee8e3b" stroke-width="1.5" stroke-linecap="round"></path> <path d="M8 14H13.5" stroke="#ee8e3b" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17 3.33782C15.5291 2.48697 13.8214 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22C17.5228 22 22 17.5228 22 12C22 10.1786 21.513 8.47087 20.6622 7" stroke="#ee8e3b" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
            <h2 class="text-lg font-semibold">Chat With Us</h2>
          </a>
          
          <!-- Contact Us Button -->
          <div class="bg-white p-6 rounded-lg border text-center">
            <svg class="mx-auto w-14 mb-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M7 19C5.89543 19 5 18.1046 5 17V14C5 12.8954 5.89543 12 7 12C8.10457 12 9 12.8954 9 14V17C9 18.1046 8.10457 19 7 19Z" stroke="#ee8e3b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M17 19C15.8954 19 15 18.1046 15 17V14C15 12.8954 15.8954 12 17 12C18.1046 12 19 12.8954 19 14V17C19 18.1046 18.1046 19 17 19Z" stroke="#ee8e3b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19 14V12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12V14" stroke="#ee8e3b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            <h2 class="text-lg font-semibold">Contact Us</h2>
          </div>
        </div>
      </div>
  </div>

@endsection