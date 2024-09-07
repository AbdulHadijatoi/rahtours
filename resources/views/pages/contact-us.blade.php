@extends('layouts.app')



@section('content')
    
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 my-10">
            @include('components.card2', [
                'card_image' => 'storage/uploads/contact_us_image1.png',
                'card_title' => "United Kingdom, Europe Region", 
                'card_text' => '<strong>8A, Water Lane Stratford</strong><br>
                                E15 4NH, London, GB<br>
                                <a href="tel:+447979817239">+44-7979-817239</a><br>
                                gb@lexusline.co.uk',
                
            ])
            @include('components.card2', [
                'card_image' => 'storage/uploads/contact_us_image1.png',
                'card_title' => "Pakistan, Asia Region", 
                'card_text' => '<strong>305, Ibrahim Trade Tower Shahrah-E-Faisal</strong><br>
                                    75500, Karachi, PK<br>
                                    <a href="tel:+92213458118">++92-21-3458118</a><br>
                                    pk@lexusline.co.uk',
            ])
            @include('components.card2', [
                'card_image' => 'storage/uploads/contact_us_image1.png',
                'card_title' => "UAE, MENA Region", 
                'card_text' => '<strong>901, API World Tower Sheikh Zayed Road</strong><br>
                                232268, Dubai AE<br>
                                <a href="tel:+97143204766">+971-4-3204766</a><br>
                                ae@lexusline.co.uk',
            ])
        </div>
    </div>
    
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection