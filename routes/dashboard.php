<?php

use App\Http\Controllers\Dashboard\ActivityController;
use App\Http\Controllers\Dashboard\AppInformationController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContactUsController;
use App\Http\Controllers\Dashboard\FAQSController;
use App\Http\Controllers\Dashboard\GalleryController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PartnerController;
use App\Http\Controllers\Dashboard\SocialMediaController;
use App\Http\Controllers\Dashboard\VolunteerController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    //auth api
    Route::post('/login', [AuthCOntroller::class, 'login']);

    // dashboard api

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/home', [HomeController::class, 'getHomeData']);
        Route::group(['prefix' => 'app-information'], function () {
            Route::get('get-aboutus', [AppInformationController::class, 'getAboutUs']);
            Route::get('get-privacy', [AppInformationController::class, 'getPrivacy']);
            Route::post('update-aboutus', [AppInformationController::class, 'updateAboutUs']);
            Route::post('update-privacy', [AppInformationController::class, 'updatePrivacy']);
        });
        Route::prefix('socialmedia')->group(function () {
            Route::get('/getAll', [SocialMediaController::class, 'getAll']);
            Route::post('/add', [SocialMediaController::class, 'create']);
            Route::post('/update', [SocialMediaController::class, 'update']);
            Route::post('/delete', [SocialMediaController::class, 'delete']);
            Route::post('/update_status', [SocialMediaController::class, 'changeStatus']);
        });

        Route::get('/contact_us', [ContactUsController::class, 'getAll']);
        Route::get('/volunteer', [VolunteerController::class, 'getAll']);
    });

    Route::prefix('partner')->group(function () {
        Route::get('/getAll', [PartnerController::class, 'getAll']);
        Route::post('/add', [PartnerController::class, 'create']);
        Route::post('/update', [PartnerController::class, 'update']);
        Route::post('/delete', [PartnerController::class, 'delete']);
        Route::post('/update_status', [PartnerController::class, 'changeStatus']);
    });

    Route::prefix('category')->group(function () {
        Route::get('/getAll', [CategoryController::class, 'getAll']);
        Route::post('/add', [CategoryController::class, 'create']);
        Route::post('/update', [CategoryController::class, 'update']);
        Route::post('/delete', [CategoryController::class, 'delete']);
        Route::post('/update_category_status', [CategoryController::class, 'updateCategoryStatus']);
    });

    Route::prefix('activity')->group(function () {
        Route::get('/getAll', [ActivityController::class, 'getAllForDashboard']);
        Route::get('/getOne', [ActivityController::class, 'getOne']);
        Route::post('/create', [ActivityController::class, 'create']);
        Route::post('/update', [ActivityController::class, 'update']);
        Route::post('/delete', [ActivityController::class, 'delete']);
    });
    Route::prefix('track')->group(function () {
        Route::get('/count', [TrackController::class, 'countMacAddresses']);
        Route::get('/getAll', [TrackController::class, 'listMacAddresses']);
    });
    Route::prefix('fqa')->group(function () {
        Route::get('/', [FAQSController::class, 'getAll']);
        Route::post('/create', [FAQSController::class, 'create']);
        Route::post('/update', [FAQSController::class, 'update']);
        Route::post('/delete', [FAQSController::class, 'delete']);
    });
    Route::prefix('Gallery')->group(function () {
        Route::get('/', [GalleryController::class, 'getAll']);
        Route::post('/create', [GalleryController::class, 'create']);
        Route::post('/update', [GalleryController::class, 'update']);
        Route::post('/delete', [GalleryController::class, 'delete']);
    });
});
