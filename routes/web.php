<?php

use App\Http\Controllers\HomeActivityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dubai-activities/{category?}', [HomeActivityController::class, 'getActivities']);
Route::get('/dubai-activities/{category}/{slug?}', [HomeActivityController::class, 'ActivityDetails'])->name('dubaiActivity');
Route::get('/help', [PageController::class, 'helpPage'])->name('helpPage');
Route::get('/wish-list', [PageController::class, 'wishList'])->name('wishList');
Route::get('/about-us', [PageController::class, 'aboutUs'])->name('aboutUs');
Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contactUs');
Route::get('/terms-conditions', [PageController::class, 'termsConditions'])->name('termsConditions');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('/blogs', [PageController::class, 'blogsList'])->name('blogsList');
Route::get('/blogs/{slug?}', [PageController::class, 'blogDetail'])->name('blogDetail');
Route::get('/guidelines', [PageController::class, 'guidelines'])->name('guidelines');
Route::get('/manage-profile', [PageController::class, 'manageProfile'])->name('manageProfile');
Route::get('/where-to-find-us', [PageController::class, 'whereToFindUs'])->name('whereToFindUs');

Route::get('/gift/{slug?}', [PageController::class, 'giftPage'])->name('giftPage');
Route::get('/gift/{slug?}/preview', [PageController::class, 'previewGift'])->name('previewGift');


Route::get('/add-to-wishlist/{id}', [HomeActivityController::class, 'addToWishList'])->name('wishlist.add');
Route::get('/remove-from-wishlist/{id}', [HomeActivityController::class, 'removeFromWishList'])->name('wishlist.add');
Route::get('/wishlist/activities', [HomeActivityController::class, 'getWishlistActivities'])->name('wishlist.activities');
