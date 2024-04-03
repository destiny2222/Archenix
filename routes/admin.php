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

    
    // sector
    Route::get('sector', [WebController::class, 'Sector'])->name('sector.home');
    Route::get('sector/create', [WebController::class, 'CreateSector'])->name('sector.create');
    Route::post('sector/store', [WebController::class, 'StoreSector'])->name('sector.store');
    Route::get('sector/{id}/edit', [WebController::class, 'EditSector'])->name('sector.edit');
    Route::put('sector/{id}/update', [WebController::class, 'UpdateSector'])->name('sector.update');
    Route::delete('sector/{id}/delete', [WebController::class, 'DeleteSector'])->name('sector.delete');

    // Category
    Route::get('category', [WebController::class, 'Category'])->name('category.home');
    Route::get('category/create', [WebController::class, 'CreateCategory'])->name('category.create');
    Route::post('category/store', [WebController::class, 'StoreCategory'])->name('category.store');
    Route::get('category/{id}/edit', [WebController::class, 'EditCategory'])->name('category.edit');
    Route::put('category/{id}/update', [WebController::class, 'UpdateCategory'])->name('category.update');
    Route::delete('category/{id}/delete', [WebController::class, 'DeleteCategory'])->name('category.delete');

    // Blog
    Route::get('blog', [WebController::class, 'Blog'])->name('blog.home');
    Route::get('blog/create', [WebController::class, 'CreateBlog'])->name('blog.create');
    Route::post('blog/store', [WebController::class, 'StoreBlog'])->name('blog.store');
    Route::get('blog/{id}/edit', [WebController::class, 'EditBlog'])->name('blog.edit');
    Route::put('blog/{id}/update', [WebController::class, 'UpdateBlog'])->name('blog.update');
    Route::delete('blog/{id}/delete', [WebController::class, 'DeleteBlog'])->name('blog.delete');




    // profile update
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile-page');
    Route::put('/profile_update/{id}', [HomeController::class, 'update'])->name('profile-update');
    Route::put('change-passwprd', [HomeController::class, 'validatepassword'])->name('change-password-update');
    
    // welcome
    Route::get('welcome', [WebController::class, 'Welcome'])->name('welcome.home');
    Route::post('welcome/store', [WebController::class, 'StoreWelcome'])->name('welcome.store');

    // metaTag
    Route::get('metaTag', [WebController::class, 'MetaTag'])->name('metaTag.home');
    Route::post('metaTag/store', [WebController::class, 'StoreMetaTag'])->name('metaTag.store');
    Route::get('metaTag/create', [WebController::class, 'CreateMetaTag'])->name('metaTag.create');
    Route::get('metaTag/{id}/edit', [WebController::class, 'EditMetaTag'])->name('metaTag.edit');
    Route::put('metaTag/{id}/update', [WebController::class, 'UpdateMetaTag'])->name('metaTag.update');
    Route::delete('metaTag/{id}/delete', [WebController::class, 'DeleteMetaTag'])->name('metaTag.delete');

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