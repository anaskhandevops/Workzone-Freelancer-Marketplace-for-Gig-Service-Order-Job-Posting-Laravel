<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;

use App\Http\Controllers\Admin\ProfileController;

use App\Http\Controllers\Admin\DashboardController;
use Modules\GlobalSetting\App\Models\GlobalSetting;
use App\Http\Controllers\Admin\Auth\LoginController;

use App\Http\Controllers\Auth\LoginController as BuyerLoginController;
use App\Http\Controllers\Auth\LoginController as SellerLoginController;
use App\Http\Controllers\Buyer\ProfileController as BuyerProfileController;
use App\Http\Controllers\Auth\RegisterController as BuyerRegisterController;
use App\Http\Controllers\Auth\RegisterController as SellerRegisterController;
use App\Http\Controllers\Seller\ProfileController as SellerProfileController;






Route::group(['middleware' => [ 'HtmlSpecialchars', 'MaintenanceMode']], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/about-us', [HomeController::class, 'about_us'])->name('about-us');

    Route::get('/services', [HomeController::class, 'services'])->name('services');
    Route::get('/service/{slug}', [HomeController::class, 'service'])->name('service');

    Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
    Route::get('/blog/{slug}', [HomeController::class, 'blog'])->name('blog');
    Route::post('/store-blog-comment/{id}', [HomeController::class, 'store_blog_comment'])->name('store-blog-comment');

    Route::get('/contact-us', [HomeController::class, 'contact_us'])->name('contact-us');

    Route::get('/faq', [HomeController::class, 'faq'])->name('faq');

    Route::get('/freelancers', [HomeController::class, 'freelancers'])->name('freelancers');
    Route::get('/freelancer/{username}', [HomeController::class, 'freelancer'])->name('freelancer');

    Route::get('/buyers/{username}', [HomeController::class, 'buyer'])->name('buyers');

    Route::get('/job-posts', [HomeController::class, 'job_posts'])->name('job-posts');
    Route::get('/job-post/{slug}', [HomeController::class, 'job_post'])->name('job-post');


    Route::get('/privacy-policy', [HomeController::class, 'privacy_policy'])->name('privacy-policy');
    Route::get('/terms-conditions', [HomeController::class, 'terms_conditions'])->name('terms-conditions');

    Route::get('/custom-page/{slug}', [HomeController::class, 'custom_page'])->name('custom-page');

    Route::get('/language-switcher', [HomeController::class,  'language_switcher'])->name('language-switcher');
    Route::get('/currency-switcher', [HomeController::class, 'currency_switcher'])->name('currency-switcher');

    Route::get('/download-submission-file/{file_name}', [HomeController::class, 'download_submission_file'])->name('download-submission-file');

    Route::group(['as' => 'payment.', 'prefix' => 'payment', 'middleware' => ['auth:web']], function(){
        Route::get('/pay/{service_package_id}/{package_name}', [PaymentController::class, 'index'])->name('pay');
        Route::post('/stripe/{service_package_id}/{package_name}', [PaymentController::class, 'stirpe_payment'])->name('stripe');
        Route::post('/bank/{service_package_id}/{package_name}', [PaymentController::class, 'bank_payment'])->name('bank');

        Route::get('/paypal/{service_package_id}/{package_name}', [PaymentController::class, 'paypal_payment'])->name('paypal');
        Route::get('/paypal-success-payment', [PaymentController::class, 'paypal_success_payment'])->name('paypal-success-payment');
        Route::get('/paypal-faild-payment', [PaymentController::class, 'paypal_faild_payment'])->name('paypal-faild-payment');

        Route::post('/razorpay/{service_package_id}/{package_name}', [PaymentController::class, 'razorpay_payment'])->name('razorpay');

        Route::post('/flutterwave/{service_package_id}/{package_name}', [PaymentController::class, 'flutterwave_payment'])->name('flutterwave');

        Route::get('/mollie/{service_package_id}/{package_name}', [PaymentController::class, 'mollie_payment'])->name('mollie');
        Route::get('/mollie-callback', [PaymentController::class, 'mollie_callback'])->name('mollie-callback');

        Route::post('/paystack/{service_package_id}/{package_name}', [PaymentController::class, 'paystack_payment'])->name('paystack');

        Route::get('/instamojo/{service_package_id}/{package_name}', [PaymentController::class, 'instamojo_payment'])->name('instamojo');
        Route::get('/instamojo-callback', [PaymentController::class, 'instamojo_callback'])->name('instamojo-callback');

        Route::get('/wallet/{service_package_id}/{package_name}', [PaymentController::class, 'wallet_payment'])->name('wallet');


    });

    Auth::routes();

    Route::group(['as' => 'buyer.', 'prefix' => 'buyer'], function(){

        Route::get('/login', [BuyerLoginController::class, 'custom_login_page'])->name('login');
        Route::post('/store-login', [BuyerLoginController::class, 'store_login'])->name('store-login');
        Route::get('/logout', [BuyerLoginController::class, 'buyer_logout'])->name('logout');



        Route::controller(BuyerLoginController::class)->group(function () {
            Route::get('login/google', 'redirect_to_google')->name('login-google');
            Route::get('/callback/google', 'google_callback')->name('callback-google');

            Route::get('login/facebook', 'redirect_to_facebook')->name('login-facebook');
            Route::get('/callback/facebook', 'facebook_callback')->name('callback-facebook');
        });

        Route::get('/register', [BuyerRegisterController::class, 'custom_register_page'])->name('register');
        Route::post('/store-register', [BuyerRegisterController::class, 'store_register'])->name('store-register');
        Route::get('/register-verification', [BuyerRegisterController::class, 'register_verification'])->name('register-verification');

        Route::get('/forget-password', [BuyerLoginController::class, 'custom_forget_page'])->name('forget-password');

        Route::post('/send-forget-password', [BuyerLoginController::class, 'send_custom_forget_pass'])->name('send-forget-password');
        Route::get('/reset-password', [BuyerLoginController::class, 'custom_reset_password'])->name('reset-password');
        Route::post('/store-reset-password/{token}', [BuyerLoginController::class, 'store_reset_password'])->name('store-reset-password');

        Route::group(['middleware' => 'auth:web'],function () {

            Route::get('/dashboard', [BuyerProfileController::class, 'dashboard'])->name('dashboard');

            Route::get('/edit-profile', [BuyerProfileController::class, 'edit_profile'])->name('edit-profile');
            Route::put('/update-profile', [BuyerProfileController::class, 'update_profile'])->name('update-profile');

            Route::get('/change-password', [BuyerProfileController::class, 'change_password'])->name('change-password');
            Route::put('/update-password', [BuyerProfileController::class, 'update_password'])->name('update-password');

            Route::get('/account-delete', [BuyerProfileController::class, 'account_delete'])->name('account-delete');
            Route::delete('/confirm-account-delete', [BuyerProfileController::class, 'confirm_account_delete'])->name('confirm-account-delete');

            Route::get('/orders', [BuyerProfileController::class, 'orders'])->name('orders');
            Route::get('/order/{order_id}', [BuyerProfileController::class, 'order_show'])->name('order');

            Route::post('/order-complete/{id}', [BuyerProfileController::class, 'order_complete'])->name('order-complete');
            Route::post('/order-cancel/{id}', [BuyerProfileController::class, 'order_cancel'])->name('order-cancel');

            Route::post('/store-review/{order_id}', [BuyerProfileController::class, 'store_review'])->name('store-review');

        });





    });


    Route::group(['as' => 'seller.', 'prefix' => 'seller'], function(){

        Route::get('/login', [SellerLoginController::class, 'seller_login_page'])->name('login');
        Route::post('/store-login', [SellerLoginController::class, 'store_login'])->name('store-login');
        Route::get('/logout', [SellerLoginController::class, 'seller_logout'])->name('logout');

        Route::get('/register', [SellerRegisterController::class, 'seller_register_page'])->name('register');
        Route::post('/store-register', [SellerRegisterController::class, 'seller_store_register'])->name('store-register');

        Route::group(['middleware' => 'auth:web'],function () {

            Route::get('/dashboard', [SellerProfileController::class, 'dashboard'])->name('dashboard');

            Route::get('/edit-profile', [SellerProfileController::class, 'edit_profile'])->name('edit-profile');
            Route::put('/update-profile', [SellerProfileController::class, 'update_profile'])->name('update-profile');

            Route::get('/change-password', [SellerProfileController::class, 'change_password'])->name('change-password');
            Route::put('/update-password', [SellerProfileController::class, 'update_password'])->name('update-password');

            Route::get('/account-delete', [SellerProfileController::class, 'account_delete'])->name('account-delete');
            Route::delete('/confirm-account-delete', [SellerProfileController::class, 'confirm_account_delete'])->name('confirm-account-delete');

            Route::get('/orders', [SellerProfileController::class, 'orders'])->name('orders');
            Route::get('/order/{order_id}', [SellerProfileController::class, 'order_show'])->name('order');

            Route::post('/order-approved/{id}', [SellerProfileController::class, 'order_approved'])->name('order-approved');
            Route::post('/order-rejected/{id}', [SellerProfileController::class, 'order_rejected'])->name('order-rejected');
            Route::post('/order-cancel/{id}', [SellerProfileController::class, 'order_cancel'])->name('order-cancel');
            Route::post('/order-submission/{id}', [SellerProfileController::class, 'order_submission'])->name('order-submission');

            Route::post('/update-status', [SellerProfileController::class, 'updateStatus'])->name('update-status');


        });





    });

});



Route::group(['as'=> 'admin.', 'prefix' => 'admin'],function (){

    Route::get('login', [LoginController::class, 'custom_login_page'])->name('login');
    Route::post('store-login', [LoginController::class, 'store_login'])->name('store-login');
    Route::post('logout', [LoginController::class, 'admin_logout'])->name('logout');


    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', [DashboardController::class, 'dashboard']);
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::controller(ProfileController::class)->group(function(){
            Route::get('edit-profile', 'edit_profile')->name('edit-profile');
            Route::put('profile-update', 'profile_update')->name('profile-update');
            Route::put('update-password', 'update_password')->name('update-password');
        });

        Route::controller(UserController::class)->group(function () {
            Route::get('user-list', 'user_list')->name('user-list');
            Route::get('pending-user', 'pending_user')->name('pending-user');
            Route::get('user-show/{id}', 'user_show')->name('user-show');
            Route::delete('user-delete/{id}', 'user_destroy')->name('user-delete');
            Route::put('user-status/{id}', 'user_status')->name('user-status');
            Route::put('user-update/{id}', 'update')->name('user-update');

            Route::get('seller-list', 'seller_list')->name('seller-list');
            Route::get('pending-seller', 'pending_seller')->name('pending-seller');
            Route::get('seller-show/{id}', 'seller_show')->name('seller-show');

            Route::get('feez-profile/{id}', 'user_feez')->name('feez-profile');

        });

        // Route::controller(AdsBannerController::class)->group(function () {
        //     Route::get('ads-banner', 'index')->name('ads-banner');
        //     Route::put('ads-banner-update/{id}', 'update')->name('ads-banner-update');
        // });

        Route::controller(OrderController::class)->group(function () {
            Route::get('orders', 'index')->name('orders');
            Route::get('active-orders', 'active_orders')->name('active-orders');
            Route::get('awaiting-orders', 'awaiting_orders')->name('awaiting-orders');
            Route::get('reject-orders', 'reject_orders')->name('reject-orders');
            Route::get('cancel-orders', 'cancel_orders')->name('cancel-orders');
            Route::get('complete-orders', 'complete_orders')->name('complete-orders');
            Route::get('pending-payment-orders', 'pending_payment_orders')->name('pending-payment-orders');
            Route::post('payment-approval/{id}', 'payment_approval')->name('payment-approval');

            Route::get('order/{id}', 'order_show')->name('order');

            Route::post('/order-complete/{id}', 'order_complete')->name('order-complete');
            Route::post('/order-approved/{id}', 'order_approved')->name('order-approved');
            Route::post('/order-cancel/{id}', 'order_cancel')->name('order-cancel');
            Route::delete('/order-delete/{id}', 'order_delete')->name('order-delete');
        });



    });


});



Route::get('/setup-plugin', function(){

    Artisan::call('migrate');

    Artisan::call('optimize:clear');

    $notification = trans('Addon installed successful');
    $notification = array('message' => $notification, 'alert-type' => 'success');
    return redirect()->route('home')->with($notification);
});


Route::get('/migrate', function(){

    Artisan::call('migrate');

    $commission_type = new GlobalSetting();
    $commission_type->key = 'commission_type';
    $commission_type->value = 'commission';
    $commission_type->save();

    $commission_per_sale = new GlobalSetting();
    $commission_per_sale->key = 'commission_per_sale';
    $commission_per_sale->value = 1;
    $commission_per_sale->save();

    Artisan::call('optimize:clear');

    GlobalSetting::where('key', 'app_version')->update(['value' => '3.0.0']);

    $notification = trans('Version updated successful');
    $notification = array('message' => $notification, 'alert-type' => 'success');
    return redirect()->route('home')->with($notification);
});
