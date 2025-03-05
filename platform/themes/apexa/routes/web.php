<?php

use Botble\Theme\Facades\Theme;
use Illuminate\Support\Facades\Route;
use Theme\Apexa\Http\Controllers\ApexaController;

// Custom routes
// You can delete this route group if you don't need to add your custom routes.
Route::group(['controller' => ApexaController::class, 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        // Add your custom route here
        // Ex: Route::get('hello', 'getHello');
        Route::get('download-file', [ApexaController::class, 'downloadFile'])->name('public.download-file');
    });
});

Theme::routes();
