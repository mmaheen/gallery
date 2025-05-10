<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\GuestController;
use App\Http\Controllers\Backend\PhotoController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\Backend\CategoryController;

// Index 
Route::get('/about',[SiteController::class,'about'])->name('about');
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

Route::middleware(['auth',CheckAdmin::class])->group(function(){
    // Dashboard 
    Route::get('/dashboard/admin',[AdminController::class,'index'])->name('admin.index');
    Route::get('/dashboard/admin/sign-up',[AdminController::class,'signup'])->name('admin.signup');
    Route::post('/dashboard/admin/sign-up',[AdminController::class,'adminRegister'])->name('admin.register');
    Route::get('/dashboard/admin/settings',[AdminController::class,'settings'])->name('admin.settings');
    Route::get('/dashboard/admin/profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('/dashboard/admin/photos',[AdminController::class,'photos'])->name('admin.photos');
    // End Dashboard 
});

//Backend guest
Route::get('/dashboard/guest',[GuestController::class,'index'])->name('guest.index');
Route::get('/dashboard/guest/photo',[GuestController::class,'photoIndex'])->name('guest.photos');
Route::get('/dashboard/guest/video',[GuestController::class,'videoIndex'])->name('guest.videos');
Route::get('/dashboard/guest/category',[GuestController::class,'categoryIndex'])->name('guest.categories');

Route::resources([
    'photo'=>PhotoController::class,
    'category'=>CategoryController::class,
    'user'=>UserController::class,
    'video'=>VideoController::class
]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
