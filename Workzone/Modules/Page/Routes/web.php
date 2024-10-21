<?php

use Illuminate\Support\Facades\Route;
use Modules\Page\App\Http\Controllers\PageController;
use Modules\Page\App\Http\Controllers\PrivacyController;
use Modules\Page\App\Http\Controllers\HomepageController;
use Modules\Page\App\Http\Controllers\TermsConditiondController;
use Modules\Page\App\Http\Controllers\AboutusController;
use Modules\Page\App\Http\Controllers\ContactPageController;
use Modules\Page\App\Http\Controllers\FooterContrllerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['as'=> 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::get('terms-conditions', [TermsConditiondController::class, 'index'])->name('terms-conditions');
    Route::put('update-terms-conditions', [TermsConditiondController::class, 'update'])->name('update-terms-conditions');

    Route::get('privacy-policy', [PrivacyController::class, 'index'])->name('privacy-policy');
    Route::put('update-privacy-policy', [PrivacyController::class, 'update'])->name('update-privacy-policy');

    Route::get('intro-section', [HomepageController::class, 'intro_section'])->name('intro-section');
    Route::put('update-intro-section', [HomepageController::class, 'update_intro_section'])->name('update-intro-section');

    Route::get('intro2-section', [HomepageController::class, 'intro2_section'])->name('intro2-section');
    Route::put('update-intro2-section', [HomepageController::class, 'update_intro2_section'])->name('update-intro2-section');



    Route::get('working-step', [HomepageController::class, 'working_step'])->name('working-step');
    Route::put('update-working-step', [HomepageController::class, 'update_working_step'])->name('update-working-step');

    Route::get('our-feature', [HomepageController::class, 'our_feature'])->name('our-feature');
    Route::put('update-our-feature', [HomepageController::class, 'update_our_feature'])->name('update-our-feature');

    Route::get('join-seller', [HomepageController::class, 'join_seller'])->name('join-seller');
    Route::put('update-join-seller', [HomepageController::class, 'update_join_seller'])->name('update-join-seller');

    Route::get('explore-section', [HomepageController::class, 'explore_section'])->name('explore-section');
    Route::put('update-explore-section', [HomepageController::class, 'update_explore_section'])->name('update-explore-section');

    Route::get('about-us', [AboutusController::class, 'index'])->name('about-us');
    Route::put('update-about-us', [AboutusController::class, 'update'])->name('update-about-us');

    Route::get('contact-us', [ContactPageController::class, 'index'])->name('contact-us');
    Route::put('update-contact-us', [ContactPageController::class, 'update'])->name('update-contact-us');


    Route::get('footer', [FooterContrllerController::class, 'index'])->name('footer');
    Route::put('update-footer', [FooterContrllerController::class, 'update'])->name('update-footer');

    Route::resource('custom-page', CustomPageController::class);

});
