<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PhotoController;
use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\Backend\CategoryController;

Route::get('/',[SiteController::class,'index'])->name('index');
Route::get('/videos',[SiteController::class,'videos'])->name('videos');
Route::get('/about',[SiteController::class,'about'])->name('about');
Route::get('/photo/details/{photo}',[SiteController::class,'photo_details'])->name('photo.details');
Route::get('/photo/download/{id}',[SiteController::class,'downloadPhoto'])->name('photo.download');
Route::get('/categories',[SiteController::class,'categories'])->name('categories');
Route::get('/category/details/{id}',[SiteController::class,'category_details'])->name('category.details');

Route::resources([
    'photo'=>PhotoController::class,
    'category'=>CategoryController::class
]);