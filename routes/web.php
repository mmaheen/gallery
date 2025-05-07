<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PhotoController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;

Route::get('/',[SiteController::class,'index'])->name('index');
Route::get('/videos',[SiteController::class,'videos'])->name('videos');
Route::get('/search',[SiteController::class,'search'])->name('home.search');
Route::get('/about',[SiteController::class,'about'])->name('about');
Route::get('/signin',[SiteController::class,'signin'])->name('home.signin');
Route::get('/signup',[SiteController::class,'signup'])->name('home.signup');
Route::get('/photo/details/{photo}',[SiteController::class,'photo_details'])->name('photo.details');
Route::get('/photo/download/{id}',[SiteController::class,'downloadPhoto'])->name('photo.download');
Route::get('/categories',[SiteController::class,'categories'])->name('categories');
Route::get('/category/details/{id}',[SiteController::class,'category_details'])->name('category.details');
Route::get('/video/details/{video}',[SiteController::class,'video_details'])->name('video.details');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');
Route::get('/dashboard/table',[DashboardController::class,'table'])->name('dashboard.table');
Route::get('/dashboard/sign-in',[DashboardController::class,'signin'])->name('dashboard.signin');
Route::get('/dashboard/sign-up',[DashboardController::class,'signup'])->name('dashboard.signup');

Route::resources([
    'photo'=>PhotoController::class,
    'category'=>CategoryController::class,
    'user'=>UserController::class,
    'video'=>VideoController::class
]);