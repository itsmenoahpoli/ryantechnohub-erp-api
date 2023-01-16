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

use App\Http\Controllers\Api\Core\Warehouse\WarehousePurchaseOrderSchedulesController;
use App\Http\Controllers\Api\Core\Warehouse\WarehouseDeliverySchedulesController;


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
     * Modules ----------------------------------------------------------------------------------------------- //
     */


    /**
     * Inventories
     */
    Route::prefix('inventories')->group(function() {
        Route::apiResource('products', ProductsController::class);
        Route::apiResource('product-categories', ProductCategoriesController::class);
        Route::prefix('product-images')->group(function() {
            Route::get('/', [ProductImagesController::class, 'index']);
            Route::post('upload', [ProductImagesController::class, 'upload']);
            Route::delete('{id}/delete', [ProductImagesController::class, 'destroy']);
            Route::delete('delete-multiple', [ProductImagesController::class, 'destroyMultiple']);
        });
        Route::prefix('stocks')->group(function() {
            Route::post('outstock', [ProductsController::class, 'outstock']);
            Route::post('batch-outstock', [ProductsController::class, 'batchOutstock']);
        });
    });

    /**
     * Warehouse
     */
    Route::prefix('warehouse')->group(function() {
        Route::apiResource('purchase-order-schedules', WarehousePurchaseOrderSchedulesController::class);
        Route::apiResource('delivery-schedules', WarehouseDeliverySchedulesController::class);
    });

    /**
     * Stores/Store-Branches/Store-POS (Deployed Applications)
     */
    Route::prefix('deployed-apps')->group(function() {
        Route::apiResource('stores', StoresController::class);
        Route::apiResource('pos', StorePosController::class);
        Route::post('pos-authenticate', [StorePosController::class, 'authenticate']);
    });

    Route::prefix('accountings')->group(function() {
        Route::apiResource('account-reminders', AccountRemindersController::class);
    });
});

/**
 * API for Store-Branches/Store-POS (Deployed)
 */
Route::prefix('app')->group(function() {
    /**
     * Store POS actions (checkout order, void order, order history, etc ...)
     */
    Route::prefix('store')->group(function() {
        Route::get('{storeNo}/profile', [StoreController::class, 'profile']);
    });

    /**
     * ERP Portal for deployed store POS
     */
    Route::prefix('portal')->group(function() {
        //
    });
});

