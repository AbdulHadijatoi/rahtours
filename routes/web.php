<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GiftCardController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\HomeActivityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WishlistController;
use App\Models\GiftCard;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dubai-activities/{category?}', [HomeActivityController::class, 'getActivities']);
Route::get('/dubai-activities/{category}/{slug?}', [HomeActivityController::class, 'ActivityDetails'])->name('dubaiActivity');
Route::get('/help', [PageController::class, 'helpPage'])->name('helpPage');
Route::get('/about-us', [PageController::class, 'aboutUs'])->name('aboutUs');
Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contactUs');
Route::get('/terms-and-conditions', [PageController::class, 'termsConditions'])->name('termsConditions');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogsList');
Route::get('/blogs/{slug?}', [BlogController::class, 'blogDetail'])->name('blogDetail');
Route::get('/guidelines', [PageController::class, 'guidelines'])->name('guidelines');
Route::get('/manage-profile', [PageController::class, 'manageProfile'])->name('manageProfile');
Route::get('/where-to-find-us', [PageController::class, 'whereToFindUs'])->name('whereToFindUs');

Route::get('/otp-verfication', [PageController::class, 'otpVerfication'])->name('otpVerfication');
Route::get('/send-reset-link', [ForgotPasswordController::class, 'sendResetLink'])->name('sendResetLink');
Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOTP'])->name('verifyOTP');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('resetPassword');
Route::get('/booking-help', [HelpController::class, 'getHelp'])->name('getHelp');

Route::get('/login', [PageController::class, 'login'])->name('loginPage');
Route::get('/signup', [PageController::class, 'signup'])->name('signupPage');
Route::get('/forgot-password', [PageController::class, 'forgotPassword'])->name('forgotPassword');

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/signup', [UserController::class, 'register'])->name('signup');


Route::get('/gift/{slug?}', [PageController::class, 'giftPage'])->name('giftPage');
Route::get('/gift/{slug?}/preview', [PageController::class, 'previewGift'])->name('previewGift');


Route::get('/wish-list', [WishlistController::class, 'index'])->name('wishlist.index');
Route::get('/add-to-wishlist/{id}', [WishlistController::class, 'addToWishList'])->name('wishlist.add');
Route::get('/remove-from-wishlist/{id}', [WishlistController::class, 'removeFromWishList'])->name('wishlist.add');
Route::get('/wishlist/clear', [WishlistController::class, 'clearWishlist'])->name('wishlist.clear');

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/clear', [CartController::class, 'clearCart'])->name('cart.clear');
});

Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('book-now', [CheckoutController::class, 'bookNow'])->name('checkout.bookNow');
});

Route::prefix('gift-card')->group(function () {
    Route::get('/', [GiftCardController::class, 'index'])->name('giftCard.index');
    Route::get('apply-voucher', [GiftCardController::class, 'applyVoucher'])->name('giftCard.applyVoucher');
});

Route::get('clear_session', function(Request $request){
    $request->session()->flush();
    return "cleared!";
});


// Auth ROUTES
Route::any('/logout', [UserController::class, 'logout'])->name('logout');
Route::any('/update-profile', [UserController::class, 'updateProfile'])->name('updateProfile');
Route::any('/update-password', [UserController::class, 'updatePassword'])->name('updatePassword');
Route::get('/bookings', [BookingController::class, 'index'])->name('bookingsPage');
Route::get('/booking/{id}', [BookingController::class, 'getBooking'])->name('getBooking');
Route::post('/send-otp', [UserController::class, 'sendOTP'])->name('sendOTP');
Route::post('/booking/{id}/update', [BookingController::class, 'updateBooking'])->name('updateBooking');
Route::post('/booking/{id}/cancel', [BookingController::class, 'cancelBooking'])->name('cancelBooking');
Route::get('/history', [PageController::class, 'history'])->name('history');