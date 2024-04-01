<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\WebController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->name('admin.')->group(function (){
    Route::controller(LoginController::class)->group(function (){
        Route::get('login-form','showLoginForm')->name('login-Form');
        Route::post('login','login')->name('login');
        Route::post('logout','logout')->name('logout');
    });


    // slider route
    Route::get('', [HomeController::class,'home' ])->name('home');
    Route::get('slides', [WebController::class, 'slides'])->name('slides.home');
    Route::get('slide/create', [WebController::class, 'CreateSlide'])->name('slide.create');
    Route::post('slide/store', [WebController::class, 'SliderStore'])->name('slide.store');
    Route::get('slide/{id}/edit', [WebController::class, 'editSlide'])->name('slide.edit');
    Route::put('slide/{id}/update', [WebController::class, 'updateSlide'])->name('slide.update');
    Route::delete('slide/{id}/delete', [WebController::class, 'deleteSlide'])->name('slide.delete');
    // About us
    Route::get('about-us', [WebController::class, 'aboutus'])->name('about.home');
    Route::post('about-us/update', [WebController::class, 'updateAbout'])->name('about.update');

    // Service 
    Route::get('service', [WebController::class, 'services'])->name('service.home');
    Route::get('service/create', [WebController::class, 'CreateService'])->name('service.create');
    Route::post('service/store', [WebController::class, 'StoreService'])->name('service.store');
    Route::get('service/{id}/edit', [WebController::class, 'EditService'])->name('service.edit');
    Route::put('service/{id}/update', [WebController::class, 'UpdateService'])->name('service.update');
    Route::delete('service/{id}/delete', [WebController::class, 'DestroyService'])->name('service.delete');

    // Rewiew
    Route::get('review', [WebController::class, 'review'])->name('review.home');
    Route::get('review/create', [WebController::class, 'CreateReview'])->name('review.create');
    Route::post('review/store', [WebController::class, 'StoreReview'])->name('review.store');
    Route::get('review/{id}/edit', [WebController::class, 'EditReview'])->name('review.edit');
    Route::put('review/{id}/update', [WebController::class, 'UpdateReview'])->name('review.update');
    Route::delete('review/{id}/destory', [WebController::class, 'DestroyReview'])->name('review.destory');

    // portfolio
    Route::get('portfolio', [WebController::class, 'Portfolio'])->name('portfolio.home');
    Route::get('portfolio/create', [WebController::class, 'CreatePortfolio'])->name('portfolio.create');
    Route::post('portfolio/store', [WebController::class, 'StorePortfolio'])->name('portfolio.store');
    Route::get('portfolio/{id}/edit', [WebController::class, 'EditPortfolio'])->name('portfolio.edit');
    Route::put('portfolio/{id}/update', [WebController::class, 'UpdatePortfolio'])->name('portfolio.update');
    Route::delete('portfolio/{id}/destory', [WebController::class, 'DeletePortfolio'])->name('portfolio.delete');

    // Brand
    Route::get('brand', [WebController::class, 'brand'])->name('brand.home');
    Route::post('brand/create', [WebController::class, 'CreateBrand'])->name('brand.create');

    // Social 
    Route::get('social', [WebController::class, 'sociallinks'])->name('social.home');
    Route::post('social/create', [WebController::class, 'UpdateSocial'])->name('social.create');

    // Setting
    Route::get('setting', [WebController::class, 'Setting'])->name('setting.home');
    Route::post('setting/update', [WebController::class, 'StoreSetting'])->name('setting.update');

    Route::get('/profile', [HomeController::class, 'profile'])->name('profile-page');
    Route::put('/profile_update/{id}', [HomeController::class, 'update'])->name('profile-update');
    
    Route::put('change-passwprd', [HomeController::class, 'validatepassword'])->name('change-password-update');
    

    Route::get('optimize',function (){
        \Illuminate\Support\Facades\Artisan::call('optimize');
        return 1;
    });
    Route::get('clear',function (){
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        return 1;
    });
});





?>