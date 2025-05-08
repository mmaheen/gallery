<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PhotoController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;

// Index 
Route::get('/about',[SiteController::class,'about'])->name('about');
Route::get('/signin',[SiteController::class,'signin'])->name('home.signin');
Route::get('/signup',[SiteController::class,'signup'])->name('home.signup');
// End index 

// Photo
Route::get('/',[SiteController::class,'index'])->name('index');
Route::get('/photo/details/{photo}',[SiteController::class,'photo_details'])->name('photo.details');
Route::get('/photo/download/{id}',[SiteController::class,'downloadPhoto'])->name('photo.download');
// End photo

// Video 
Route::get('/videos',[SiteController::class,'videos'])->name('videos');
Route::get('/video/details/{video}',[SiteController::class,'video_details'])->name('video.details');
// End Video 

Route::get('/categories',[SiteController::class,'categories'])->name('categories');
Route::get('/category/details/{id}',[SiteController::class,'category_details'])->name('category.details');

// Frontend search
Route::get('/search/photo',[SiteController::class,'searchPhoto'])->name('photo.search');
Route::get('/search/video',[SiteController::class,'searchVideo'])->name('video.search');
// End Frontend search

Route::middleware(['auth'])->group(function(){
    // Dashboard 
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');
    Route::get('/dashboard/sign-up',[DashboardController::class,'signup'])->name('dashboard.signup');
    Route::post('/dashboard/sign-up',[DashboardController::class,'adminRegister'])->name('admin.register');
    // End Dashboard 
});

Route::resources([
    'photo'=>PhotoController::class,
    'category'=>CategoryController::class,
    'user'=>UserController::class,
    'video'=>VideoController::class
]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
