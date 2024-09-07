@extends('layouts.app')



@section('content')
    
    
    {{-- SECTION 1 --}}
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 py-10">
        <div class="max-w-3xl mb-10">
            <h1 class="text-3xl sm:text-4xl font-light text-gray-800 mb-6">
                Logistics solutions
            </h1>
            <p class="text-md text-gray-600 mb-8">
                {{ settings()->home_section_1_text }}
            </p>
            <a href="#" class="px-6 py-3 border border-gray-400 rounded hover:bg-gray-100 text-gray-800 font-medium">
                See all solutions
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @include('components.card', [
                'card_image' => 'storage/uploads/card1_image.jpeg',
                'card_title' => "Supply Chain and Logistics", 
                'card_text' => 'We focus on solving your supply chain needs from end to end, taking the complexity out of container shipping for you.',
            ])
            @include('components.card', [
                'card_image' => 'storage/uploads/card2_image.jpeg',
                'card_title' => "Supply Chain and Logistics", 
                'card_text' => 'We focus on solving your supply chain needs from end to end, taking the complexity out of container shipping for you.',
            ])
            @include('components.card', [
                'card_image' => 'storage/uploads/card3_image.jpeg',
                'card_title' => "Supply Chain and Logistics", 
                'card_text' => 'We focus on solving your supply chain needs from end to end, taking the complexity out of container shipping for you.',
            ])
        </div>
    </div>

    <!-- SECTION 2 -->
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
        
        <h1 class="text-3xl sm:text-4xl font-light text-gray-800 mb-6">
            Latest insights
        </h1>
        <p class="text-md text-gray-600 mb-8">
            {{ settings()->home_insights_text }}
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-24 p-0">
            <!-- Left big element -->
            <div class="col-span-1">
                @include('components.home.insight-card', [
                    'insight_image'=>"storage/uploads/insight1.webp",
                    'insight_category'=>"Digitalisation",
                    'insight_datetime'=>"29 Aug 2024 • 4 min read",
                    'insight_title'=>"7 ways prescriptive analytics can support supply chain planning",
                    'insight_text'=>"Find out how businesses can use prescriptive analytics to improve supply chain through actionable recommendations.",
                    'insight_user_image'=>"https://via.placeholder.com/40",
                    'insight_user_name'=>"Lara Albertina Rebello",
                    'insight_user_designation'=>"Chief Content Editor",
                ])
            </div>

            <!-- Right side elements -->
            <div class="grid grid-cols-1 md:grid-cols-2 grid-rows-2 gap-4 col-span-1">
                <!-- First right element -->
                <div class="row-span-1 md:col-span-2">
                    <div class="col-span-1">
                        @include('components.home.insight-card', [
                            'insight_image'=>"storage/uploads/insight2.webp",
                            'insight_category'=>"Digitalisation",
                            'insight_datetime'=>"29 Aug 2024 • 4 min read",
                            'insight_title'=>"7 ways prescriptive analytics can support supply chain planning",
                            'insight_text'=>"Find out how businesses can use prescriptive analytics to improve supply chain through actionable recommendations.",
                            'insight_user_image'=>"https://via.placeholder.com/40",
                            'insight_user_name'=>"Lara Albertina Rebello",
                            'insight_user_designation'=>"Chief Content Editor",
                        ])
                    </div>
                </div>
                <!-- Second right element -->
                <div class="">
                    @include('components.home.insight-card', [
                        'insight_image'=>"storage/uploads/insight3.webp",
                        'insight_category'=>"Digitalisation",
                        'insight_datetime'=>"29 Aug 2024 • 4 min read",
                        'insight_title'=>"7 ways prescriptive analytics can support supply chain planning",
                        'insight_text'=>"Find out how businesses can use prescriptive analytics to improve supply chain through actionable recommendations.",
                        'insight_user_image'=>"https://via.placeholder.com/40",
                        'insight_user_name'=>"Lara Albertina Rebello",
                        'insight_user_designation'=>"Chief Content Editor",
                    ])
                </div>
                <!-- Third right element -->
                <div class="">
                    @include('components.home.insight-card', [
                        'insight_image'=>"storage/uploads/insight4.webp",
                        'insight_category'=>"Digitalisation",
                        'insight_datetime'=>"29 Aug 2024 • 4 min read",
                        'insight_title'=>"7 ways prescriptive analytics can support supply chain planning",
                        'insight_text'=>"Find out how businesses can use prescriptive analytics to improve supply chain through actionable recommendations.",
                        'insight_user_image'=>"https://via.placeholder.com/40",
                        'insight_user_name'=>"Lara Albertina Rebello",
                        'insight_user_designation'=>"Chief Content Editor",
                    ])
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 mb-20">
        
        <h1 class="text-3xl sm:text-4xl font-light text-gray-800 mb-6">
            Why choose Lexusline?
        </h1>
        <p class="text-md text-gray-600 mb-8">
            {{ settings()->choose_us_text }}
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    
            @include('components.home.why-choose-us-card',[
                'card_icon' => 'move',
                'card_title' => 'Flexibility',
                'card_text' => 'We leverage strong asset utilisation with a robust partner network to ensure that regardless of market fluctuations, we can always deliver on time.',
            ])

            @include('components.home.why-choose-us-card',[
                'card_icon' => 'cog',
                'card_title' => 'State-of-the-art technology',
                'card_text' => 'Our powerful digital platform offers seamless integration, allowing our customers to maintain clear visibility, tracking and control of goods from end to end.',
            ])

            @include('components.home.why-choose-us-card',[
                'card_icon' => 'cloud',
                'card_title' => 'Low emissions trucking',
                'card_text' => 'A growing electric fleet and an optimised routing network help power your ambition to lower emissions from your supply chain.',
            ])

            @include('components.home.why-choose-us-card',[
                'card_icon' => 'money',
                'card_title' => 'Optimised pricing',
                'card_text' => 'Our sophisticated routing, meticulous planning and optimised asset use across the network allows us to streamline your trucking spend.',
            ])

            @include('components.home.why-choose-us-card',[
                'card_icon' => 'tachometer',
                'card_title' => 'Speed and network efficiency',
                'card_text' => 'Our dynamically optimised shipping lanes and expedited routes help minimise travel distances, accelerating and streamlining cargo operations.',
            ])

            @include('components.home.why-choose-us-card',[
                'card_icon' => 'package',
                'card_title' => 'Delivery reliability',
                'card_text' => 'Maersk Ground Freight is backed by a track record of punctuality and efficiency. We ensure your goods arrive safely and on schedule every time.',
            ])
            

        </div>

    </div>

    {{-- <div class="card bg-base-200 w-80">
  <div class="card-body">
    <input placeholder="Email" class="input input-bordered" />
    <label class="label cursor-pointer">
      Accept terms of use
      <input type="checkbox" class="toggle" />
    </label>
    <label class="label cursor-pointer">
      Submit to newsletter
      <input type="checkbox" class="toggle" />
    </label>
    <button class="btn btn-neutral">Save</button>
  </div>
</div> --}}


@endsection

@section('styles')

@endsection

@section('scripts')

@endsection