<?php

use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MostpopularActivityController;
use App\Http\Controllers\Admin\OtherExperianceController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\Admin\Setting\AboutController;
use App\Http\Controllers\Admin\Setting\BlogPageController;
use App\Http\Controllers\Admin\Setting\GuidelinesController;
use App\Http\Controllers\Admin\Setting\HomeController as SettingHomeController;
use App\Http\Controllers\Admin\Setting\PrivacyPolicyController;
use App\Http\Controllers\Admin\Setting\TermsConditionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubscriptionController;
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
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SendGiftController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\WishlistController;
use App\Http\Middleware\CheckRole;
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

Route::post('/contact', [ContactController::class, 'createInquiry'])->name('createInquiry');
Route::get('/thank-you', [PageController::class, 'thankYou'])->name('thankyou');


Route::get('/gift', [SendGiftController::class, 'index'])->name('sendGift.index');
Route::get('/gift/preview', [SendGiftController::class, 'previewGift'])->name('sendGift.preview');
Route::post('/gift/buy-now', [SendGiftController::class, 'buyNow'])->name('sendGift.buyNow');
Route::get('/gift/success', [SendGiftController::class, 'paymentSuccess'])->name('voucher.success');
Route::get('/gift/cancel', [SendGiftController::class, 'paymentCancel'])->name('voucher.cancel');


Route::get('/wish-list', [WishlistController::class, 'index'])->name('wishlist.index');
Route::get('/add-to-wishlist/{id}', [WishlistController::class, 'addToWishList'])->name('wishlist.add');
Route::get('/remove-from-wishlist/{id}', [WishlistController::class, 'removeFromWishList'])->name('wishlist.add');
Route::get('/wishlist/clear', [WishlistController::class, 'clearWishlist'])->name('wishlist.clear');

Route::get('/search-result', [SearchController::class, 'index'])->name('search.index');

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/clear', [CartController::class, 'clearCart'])->name('cart.clear');
});

Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('book-now', [CheckoutController::class, 'bookNow'])->name('checkout.bookNow');
    
    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('placeOrder');
    Route::get('/generate-order-pdf/{id}', [OrderController::class, 'generatePdf'])->name('generateOrderPDF');
});
Route::get('/success/{reference_id}', [OrderController::class, 'success'])->name('checkout.success');
Route::get('/cancel', [OrderController::class, 'cancel'])->name('checkout.cancel');

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


// ADMIN ROUTES
Route::get('/adminrah51786/login', [AdminController::class, 'index'])->name('admin.loginPage');

Route::post('/adminrah51786/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('admin/order/{id}/pdf', [OrderController::class, 'generatePdf'])->name('order.pdf');
Route::get('admin/order/{id}/pdf', [OrderController::class, 'generatePdf'])->name('order.pdf');

Route::middleware([CheckRole::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard',        [AdminController::class, 'dashboard'])->name('dashboard');

        Route::get('/profile',          [ProfileController::class,'Profile'])->name('profile');
        Route::post('/profile/{id}',    [ProfileController::class,'updateProfile'])->name('updateProfile');
        Route::get('/update-password',  [ProfileController::class, 'changePassword'])->name('changePassword');
        Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('updatePassword');

        Route::resource('categories',    CategoryController::class)->names([
            'index' => 'categories.index',
            'create' => 'categories.create',
            'store' => 'categories.store',
            'show' => 'categories.show',
            'edit' => 'categories.edit',
            'update' => 'categories.update',
            'destroy' => 'categories.destroy',
        ]);
        
        Route::resource('menus',         MenuController::class)->names([
            'index' => 'menus.index',
            'create' => 'menus.create',
            'store' => 'menus.store',
            'show' => 'menus.show',
            'edit' => 'menus.edit',
            'update' => 'menus.update',
            'destroy' => 'menus.destroy',
        ]);

        Route::resource('subcategories', SubCategoryController::class)->names([
            'index' => 'subcategories.index',
            'create' => 'subcategories.create',
            'store' => 'subcategories.store',
            'show' => 'subcategories.show',
            'edit' => 'subcategories.edit',
            'update' => 'subcategories.update',
            'destroy' => 'subcategories.destroy',
        ]);

        Route::resource('packages',      PackageController::class)->names([
            'index' => 'packages.index',
            'create' => 'packages.create',
            'store' => 'packages.store',
            'show' => 'packages.show',
            'edit' => 'packages.edit',
            'update' => 'packages.update',
            'destroy' => 'packages.destroy',
        ]);

        Route::get('package/{id}',      [PackageController::class,'destroy'])->name('packages.destroy');

        Route::get('/contact_us', [AdminContactController::class,'index'])->name('contact_us');

        Route::get('/helps', [HelpController::class,'index'])->name('helps');

        /* Activity images routes */
        Route::resource('activities',              ActivityController::class)->names([
            'index' => 'activities.index',
            'create' => 'activities.create',
            'store' => 'activities.store',
            'show' => 'activities.show',
            'edit' => 'activities.edit',
            'update' => 'activities.update',
            'destroy' => 'activities.destroy',
        ]);
        
        Route::resource('homeimages',              SettingHomeController::class)->names([
            'index' => 'homeimages.index',
            'create' => 'homeimages.create',
            'store' => 'homeimages.store',
            'show' => 'homeimages.show',
            'edit' => 'homeimages.edit',
            'update' => 'homeimages.update',
            'destroy' => 'homeimages.destroy',
        ]);
        
        Route::resource('aboutimages',              AboutController::class)->names([
            'index' => 'aboutimages.index',
            'create' => 'aboutimages.create',
            'store' => 'aboutimages.store',
            'show' => 'aboutimages.show',
            'edit' => 'aboutimages.edit',
            'update' => 'aboutimages.update',
            'destroy' => 'aboutimages.destroy',
        ]);
        
        Route::resource('otherexperiances',        OtherExperianceController::class)->names([
            'index' => 'otherexperiances.index',
            'create' => 'otherexperiances.create',
            'store' => 'otherexperiances.store',
            'show' => 'otherexperiances.show',
            'edit' => 'otherexperiances.edit',
            'update' => 'otherexperiances.update',
            'destroy' => 'otherexperiances.destroy',
        ]);
        
        Route::resource('mostpopularactivities',   MostpopularActivityController::class)->names([
            'index' => 'mostpopularactivities.index',
            'create' => 'mostpopularactivities.create',
            'store' => 'mostpopularactivities.store',
            'show' => 'mostpopularactivities.show',
            'edit' => 'mostpopularactivities.edit',
            'update' => 'mostpopularactivities.update',
            'destroy' => 'mostpopularactivities.destroy',
        ]);
        
        Route::resource('homeactivities',          HomeactivityController::class)->names([
            'index' => 'homeactivities.index',
            'create' => 'homeactivities.create',
            'store' => 'homeactivities.store',
            'show' => 'homeactivities.show',
            'edit' => 'homeactivities.edit',
            'update' => 'homeactivities.update',
            'destroy' => 'homeactivities.destroy',
        ]);

        Route::get('/activityimages/{id}',         [ActivityController::class, 'createActivityImages'])->name('activityimages');
        Route::post('/activity-images',            [ActivityController::class, 'storeImages'])->name('activity-images');
        Route::get('/activity-getimages/{id}',     [ActivityController::class, 'getImages'])->name('activity-getimages');
        Route::post('/activity-deleteimages/{id}', [ActivityController::class, 'destroyImages'])->name('activity-deleteimages');
        Route::get('instruction/delete/{id}',[ActivityController::class, 'instructionDestroy'])->name('instruction.destroy');

        /* Admin logout */
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

        /* Blog */
        Route::resource('blogs', AdminBlogController::class)->names([
            'index' => 'blogs.index',
            'create' => 'blogs.create',
            'store' => 'blogs.store',
            'show' => 'blogs.show',
            'edit' => 'blogs.edit',
            'update' => 'blogs.update',
            'destroy' => 'blogs.destroy',
        ]);
        
        Route::resource('subscription', SubscriptionController::class)->names([
            'index' => 'subscription.index',
            'create' => 'subscription.create',
            'store' => 'subscription.store',
            'show' => 'subscription.show',
            'edit' => 'subscription.edit',
            'update' => 'subscription.update',
            'destroy' => 'subscription.destroy',
        ]);

        Route::get('blogs/contents/{blog}',   [AdminBlogController::class, 'viewContents'])->name('blogs.contents');
        Route::get('blogs/faqs/{blog}',       [AdminBlogController::class, 'viewFaqs'])->name('blogs.faqs');
        Route::get('/contents/edit/{content}', [AdminBlogController::class, 'editContents'])->name('contents.edit');
        Route::put('/contents/{content}',     [AdminBlogController::class, 'updateContents'])->name('contents.update');
        Route::delete('/contents/{content}',  [AdminBlogController::class, 'destroyContents'])->name('contents.destroy');
        Route::get('/faqs/{faq}/edit',        [AdminBlogController::class, 'editFaqs'])->name('faqs.edit');
        Route::put('/faqs/{faq}',             [AdminBlogController::class, 'updateFaqs'])->name('faqs.update');
        Route::delete('/faqs/{faq}',          [AdminBlogController::class, 'destroyFaqs'])->name('faqs.destroy');

        /* Bookings */
        Route::get('bookings',          [AdminBookingController::class, 'index'])->name('bookings');
        Route::get('bookings/package/{id}',          [AdminBookingController::class, 'package'])->name('bookings.package');
        Route::post('/send-coupon', [CouponController::class, 'sendCoupon'])->name('coupon.store');
        Route::get('/create', [CouponController::class, 'create'])->name('coupon.create');
        Route::get('/index', [CouponController::class, 'index'])->name('coupon.index');
        Route::get('/coupon/delete/{id}', [CouponController::class, 'destroy'])->name('coupon.destroy');

        /* Setting ContactUs */
        Route::get('setting/contact/create',[SettingController::class, 'contactUsCreate'])->name('setting.contact.create');
        Route::get('setting/contact',[SettingController::class, 'contactUsIndex'])->name('setting.contact.index');
        Route::get('setting/contact/{id}',[SettingController::class, 'contactUsEdit'])->name('setting.contact.edit');
        Route::post('setting/contact',[SettingController::class, 'contactUsStore'])->name('setting.contact.store');
        Route::put('setting/contact/{id}',[SettingController::class, 'contactUsUpdate'])->name('setting.contact.update');
        Route::get('contact/delete/{id}',[SettingController::class, 'contactUsDestroy'])->name('setting.contact.destroy');
        Route::put('/contacts/{id}/email', [AdminContactController::class, 'updateStatus'])->name('contacts.contactEmail');

        /* Setting Find Us */
        Route::get('setting/findus/create',[SettingController::class, 'findUsCreate'])->name('setting.find.create');
        Route::get('setting/findus',[SettingController::class, 'findUsIndex'])->name('setting.find.index');
        Route::get('setting/findus/{id}',[SettingController::class, 'findUsEdit'])->name('setting.find.edit');
        Route::post('setting/findus',[SettingController::class, 'findUsStore'])->name('setting.find.store');
        Route::put('setting/findus/{id}',[SettingController::class, 'findUsUpdate'])->name('setting.find.update');
        Route::get('findus/delete/{id}',[SettingController::class, 'findUsDestroy'])->name('setting.find.destroy');

        /*Reviews*/
        Route::resource('reviews',ReviewsController::class);

        /*settings*/
        Route::resource('guidelines',GuidelinesController::class);
        Route::get('guidelines/delete/{id}',[GuidelinesController::class, 'destroy'])->name('guidelines-destroy');
        Route::resource('termsconditions',TermsConditionController::class);
        Route::get('termsconditions/delete/{id}',[TermsConditionController::class, 'destroy'])->name('termsconditions-destroy');
        Route::resource('blogPage',BlogPageController::class);
        Route::get('blogPage/delete/{id}',[BlogPageController::class, 'destroy'])->name('blogPage-destroy');
        Route::resource('privacypolicy',PrivacyPolicyController::class);
        Route::get('privacypolicy/delete/{id}',[PrivacyPolicyController::class, 'destroy'])->name('privacypolicy-destroy');
    });
