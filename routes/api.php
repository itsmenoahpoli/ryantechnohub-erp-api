<?php

use Illuminate\Support\Facades\Route;


/**
 * Public APIs Controllers
 */
use App\Http\Controllers\Api\Public\StoreController;
/**
 * Controllers
 */
use App\Http\Controllers\Api\Core\AuthController;
/**
 * CORE APIs
 */
use App\Http\Controllers\Api\Core\Products\ProductCategoriesController;
use App\Http\Controllers\Api\Core\Products\ProductsController;
use App\Http\Controllers\Api\Core\Products\ProductImagesController;

use App\Http\Controllers\Api\Core\Stores\StoresController;
use App\Http\Controllers\Api\Core\Stores\StorePosController;

use App\Http\Controllers\Api\Core\Accountings\AccountRemindersController;


/**
 * API for warehouse dashboard & stocks portal
 */
Route::prefix('core')->middleware(['verify.secret-api-key'])->group(function() {
    Route::prefix('auth')->group(function() {
        Route::post('login', [AuthController::class, 'login']);
        
        Route::prefix('otp')->group(function() {
            Route::post('request', [AuthController::class, 'requestOtp']);
            Route::post('verify', [AuthController::class, 'verifyOtp']);
        });
    });

    /**
     * Modules
     */

     
    /**
     * Products
     */
    Route::prefix('products')->group(function() {
        Route::apiResource('categories', ProductCategoriesController::class);
        Route::prefix('images')->group(function() {
            Route::post('upload', [ProductImagesController::class, 'upload']);
        });
        Route::prefix('stocks')->group(function() {
            Route::post('outstock', [ProductsController::class, 'outstock']);
            Route::post('batch-outstock', [ProductsController::class, 'batchOutstock']);
        });
    });

    /**
     * Stores/Store-Branches
     */
    Route::prefix('stores')->group(function() {
        Route::apiResource('', StoresController::class);
        Route::prefix('pos')->group(function() {
            Route::apiResource('', StorePosController::class); 
            Route::post('authenticate', [StorePosController::class, 'authenticate']);
        });
    });

    Route::prefix('accountings')->group(function() {
        Route::apiResource('account-reminders', AccountRemindersController::class);
    });
});

/**
 * API for deployed store Point-Of-Sale
 */
Route::prefix('app')->group(function() {
    Route::prefix('store')->group(function() {
        Route::get('{storeNo}/profile', [StoreController::class, 'profile']);
    });
});

