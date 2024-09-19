<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\HomeActivityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dubai-activities/{category?}', [HomeActivityController::class, 'getActivities']);
Route::get('/dubai-activities/{category}/{slug?}', [HomeActivityController::class, 'ActivityDetails'])->name('dubaiActivity');
Route::get('/help', [PageController::class, 'helpPage'])->name('helpPage');
Route::get('/wish-list', [PageController::class, 'wishList'])->name('wishList');
Route::get('/about-us', [PageController::class, 'aboutUs'])->name('aboutUs');
Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contactUs');
Route::get('/terms-and-conditions', [PageController::class, 'termsConditions'])->name('termsConditions');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('/blogs', [PageController::class, 'blogsList'])->name('blogsList');
Route::get('/blogs/{slug?}', [PageController::class, 'blogDetail'])->name('blogDetail');
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


Route::get('/add-to-wishlist/{id}', [HomeActivityController::class, 'addToWishList'])->name('wishlist.add');
Route::get('/remove-from-wishlist/{id}', [HomeActivityController::class, 'removeFromWishList'])->name('wishlist.add');
Route::get('/wishlist/activities', [HomeActivityController::class, 'getWishlistActivities'])->name('wishlist.activities');


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