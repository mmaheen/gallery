<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PhotoController;
use App\Http\Controllers\Frontend\SiteController;

Route::get('/',[SiteController::class,'index'])->name('index');
Route::get('/videos',[SiteController::class,'videos'])->name('videos');
Route::get('/about',[SiteController::class,'about'])->name('about');

Route::resources([
    'photo'=>PhotoController::class
]);