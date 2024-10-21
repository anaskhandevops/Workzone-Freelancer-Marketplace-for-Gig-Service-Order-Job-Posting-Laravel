<?php


use Modules\JobPost\Http\Controllers\JobPostController;
use Modules\JobPost\Http\Controllers\Buyer\JobPostController as BuyerJobPostController;
use Modules\JobPost\Http\Controllers\Seller\JobPostController as SellerJobPostController;



Route::group(['as'=> 'admin.', 'prefix' => 'admin/jobpost', 'middleware' => ['auth:admin']],function (){

    Route::resource('jobpost', JobPostController::class);

    Route::put('jobpost-approval/{id}', [JobPostController::class, 'jobpost_approval'])->name('jobpost-approval');

    Route::get('/job-post-applicants/{id}', [JobPostController::class,  'job_post_applicants'])->name('job-post-applicants');
    Route::put('/job-application-approval/{id}', [JobPostController::class,  'job_application_approval'])->name('job-application-approval');
    Route::delete('/job-application-delete/{id}', [JobPostController::class,  'job_application_delete'])->name('job-application-delete');

    Route::get('awaiting-jobpost', [JobPostController::class, 'awaiting_listings'])->name('awaiting-jobpost');


});

Route::group(['middleware' => ['auth:web', 'HtmlSpecialchars', 'MaintenanceMode']], function () {

    Route::group(['as'=> 'buyer.', 'prefix' => 'buyer'],function (){

        Route::resource('jobpost', BuyerJobPostController::class);

        Route::get('/job-post-applicants/{id}', [BuyerJobPostController::class,  'job_post_applicants'])->name('job-post-applicants');
        Route::put('/job-application-approval/{id}', [BuyerJobPostController::class,  'job_application_approval'])->name('job-application-approval');

    });
});


Route::group(['middleware' => ['auth:web', 'HtmlSpecialchars', 'MaintenanceMode']], function () {

    Route::group(['as'=> 'seller.', 'prefix' => 'seller'],function (){

        Route::get('/my-applicants', [SellerJobPostController::class,  'index'])->name('my-applicants');
        Route::post('/apply-job/{id}', [SellerJobPostController::class,  'apply_job'])->name('apply-job');

    });
});

