<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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



Route::get('', [HomeController::class ,  'index'])->name('index.page');
Route::get('/about', [HomeController::class, 'about'])->name('about.page');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact.page');
Route::get('/service', [HomeController::class, 'service'])->name('service.page');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms.page');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio.page');
Route::post('/contact/store', [HomeController::class, 'StoreContact'])->name('contact.store');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog.page');
Route::get('/blog/detail/{post}/', [HomeController::class, 'blogDetails'])->name('blog.detail');
require __DIR__.'/admin.php';