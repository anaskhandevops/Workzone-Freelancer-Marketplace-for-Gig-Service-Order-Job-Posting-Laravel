<?php

use Illuminate\Support\Facades\Route;
use Modules\KYC\App\Http\Controllers\KycController;
use Modules\KYC\App\Http\Controllers\KycTypeController;

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

    Route::resource('kyc', KycTypeController::class);

    Route::controller(KycTypeController::class)->group(function () {

        Route::get('kyc-pending-list', 'kycPendingList')->name('kyc-pending-list');
        Route::get('kyc-approval-list', 'kycApprovalList')->name('kyc-approval-list');
        Route::get('kyc-reject-list', 'kycRejectList')->name('kyc-reject-list');
        Route::delete('delete-kyc-info/{id}', 'DestroyKyc')->name('delete-kyc-info');
        Route::put('update-kyc-status/{id}', 'UpdateKycStatus')->name('update-kyc-status');
    });

});

Route::group(['middleware' => ['auth:web', 'HtmlSpecialchars', 'MaintenanceMode']], function () {

    Route::group(['as'=> 'seller.', 'prefix' => 'seller'],function (){

        Route::controller(KycController::class)->group(function () {
            Route::get('kyc', 'kyc')->name('kyc');
            Route::post('kyc-submit', 'kycSubmit')->name('kyc-submit');
        });

    });
});

