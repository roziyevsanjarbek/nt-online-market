<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

Route::prefix('shop')->group(function () {

    // Classic routes
    Route::prefix('classic')->group(function () {
        Route::get('full-width', [ShopController::class, 'classicFullWidth']);
        Route::get('left-sidebar-col-3', [ShopController::class, 'classicLeftSidebarCol3']);
        Route::get('left-sidebar-col-4', [ShopController::class, 'classicLeftSidebarCol4']);
        Route::get('right-sidebar-col-3', [ShopController::class, 'classicRightSidebarCol3']);
        Route::get('right-sidebar-col-4', [ShopController::class, 'classicRightSidebarCol4']);
    });

    // Banner routes
    Route::prefix('banner')->group(function () {
        Route::get('full-width', [ShopController::class, 'bannerFullWidth']);
        Route::get('left-sidebar-col-3', [ShopController::class, 'bannerLeftSidebarCol3']);
        Route::get('left-sidebar-col-4', [ShopController::class, 'bannerLeftSidebarCol4']);
        Route::get('right-sidebar-col-3', [ShopController::class, 'bannerRightSidebarCol3']);
        Route::get('right-sidebar-col-4', [ShopController::class, 'bannerRightSidebarCol4']);
    });

    // Columns routes
    Route::prefix('columns')->group(function () {
        Route::get('banner-full-width-col-3', [ShopController::class, 'columnsBannerFullWidthCol3']);
        Route::get('full-width-col-3', [ShopController::class, 'columnsFullWidthCol3']);
        Route::get('full-width-col-4', [ShopController::class, 'columnsFullWidthCol4']);
        Route::get('full-width-col-5', [ShopController::class, 'columnsFullWidthCol5']);
        Route::get('full-width-col-6', [ShopController::class, 'columnsFullWidthCol6']);
    });

    // List routes
    Route::prefix('list')->group(function () {
        Route::get('banner-left-sidebar', [ShopController::class, 'listBannerLeftSidebar']);
        Route::get('banner-right-sidebar', [ShopController::class, 'listBannerRightSidebar']);
        Route::get('full-width-col-2', [ShopController::class, 'listFullWidthCol2']);
        Route::get('left-sidebar', [ShopController::class, 'listLeftSidebar']);
        Route::get('right-sidebar', [ShopController::class, 'listRightSidebar']);
    });

});
