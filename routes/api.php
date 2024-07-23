<?php

use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\AppInfoController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\FaqsController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'getHomeData']);

Route::post('/contact', [ContactController::class, 'addContact']);
Route::post('/volunteer', [ContactController::class, 'addVolunteer']);

Route::get('about', [AppInfoController::class, 'aboutUs']);
Route::get('privacy', [AppInfoController::class, 'privacy']);

Route::get('faqs', [FaqsController::class, 'faqs']);
Route::get('gallery', [GalleryController::class, 'gallery']);

Route::prefix('activity')->controller(ActivityController::class)->group(function () {
    Route::get('{id}', 'getOne');
    Route::get('/getAll', 'getAll');
});

Route::prefix('post')->controller(PostController::class)->group(function () {
    Route::get('{id}', 'getOne');
    Route::get('/getAll', 'getAll');
});

Route::prefix('track')->controller(TrackController::class)->group(function () {
    Route::post('/', 'checkMacAddress');
});
