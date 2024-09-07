<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


// if(getMenu()){
//     foreach (getMenu() as $menu) {
//         if($menu->slug == '/'){
//             Route::get("{$menu->slug}", [PageController::class, 'homePage'])->name($menu->slug);
//         }else{
//             Route::get("{$menu->slug}", [PageController::class, 'commonPage'])->name($menu->slug);
//         }
//     }
// }

// if(getMenu(2)){
//     foreach (getMenu(2) as $menu) {
//         Route::get("{$menu->slug}", [PageController::class, 'commonPage'])->name($menu->slug);
//     }
// }

Route::get('/', [PageController::class, 'homePage'])->name('home');
Route::get('/who-we-are', [PageController::class, 'whoWeAre'])->name('who-we-are');
Route::get('/dry-cargo', [PageController::class, 'dryCargo'])->name('dry-cargo');
Route::get('/reefer-cargo', [PageController::class, 'reeferCargo'])->name('reefer-cargo');
Route::get('/liquid-cargo', [PageController::class, 'liquidCargo'])->name('liquid-cargo');
Route::get('/project-cargo', [PageController::class, 'projectCargo'])->name('project-cargo');
Route::get('/container-haulage', [PageController::class, 'containerHaulage'])->name('container-haulage');
Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contact-us');

Route::get('/automotive-shipping', [PageController::class, 'automotiveShipping'])->name('automotive-shipping');
Route::get('/dangerous-good-shipping', [PageController::class, 'dangerousGoodShipping'])->name('dangerous-good-shipping');
Route::get('/cargo-storage-solutions', [PageController::class, 'cargoStorageSolutions'])->name('cargo-storage-solutions');
Route::get('/exworks-solutions', [PageController::class, 'exworksSolutions'])->name('exworks-solutions');
Route::get('/container-trading', [PageController::class, 'containerTrading'])->name('container-trading');
Route::get('/container-bl-tracking', [PageController::class, 'containerBlTracking'])->name('container-bl-tracking');
Route::get('/client-reg-login', [PageController::class, 'clientRegLogin'])->name('client-reg-login');
Route::get('/freight-rate', [PageController::class, 'freightRate'])->name('freight-rate');
Route::get('/get-quote', [PageController::class, 'getQuote'])->name('get-quote');
Route::get('/general-tariff', [PageController::class, 'generalTariff'])->name('general-tariff');
Route::get('/quick-payment', [PageController::class, 'quickPayment'])->name('quick-payment');

Route::get('/terms-conditions', [PageController::class, 'termsConditions'])->name('terms-conditions');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/blogs-news', [PageController::class, 'blogsNews'])->name('blogs-news');
