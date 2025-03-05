<?php

use Botble\Base\Facades\BaseHelper;
use Botble\Portfolio\Http\Controllers\CustomFieldController;
use Botble\Portfolio\Http\Controllers\PackageController;
use Botble\Portfolio\Http\Controllers\ProjectController;
use Botble\Portfolio\Http\Controllers\PublicController;
use Botble\Portfolio\Http\Controllers\QuotationRequestController;
use Botble\Portfolio\Http\Controllers\ServiceCategoryController;
use Botble\Portfolio\Http\Controllers\ServiceController;
use Botble\Portfolio\Models\Package;
use Botble\Portfolio\Models\Project;
use Botble\Portfolio\Models\Service;
use Botble\Portfolio\Models\ServiceCategory;
use Botble\Slug\Facades\SlugHelper;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'core'])->group(function () {
    Route::middleware('auth')->prefix(BaseHelper::getAdminPrefix() . '/portfolio')->name('portfolio.')->group(function () {
        Route::group(['prefix' => 'service-categories', 'as' => 'service-categories.'], function () {
            Route::resource('', ServiceCategoryController::class)->parameters(['' => 'service-category']);
        });

        Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
            Route::resource('', ServiceController::class)->parameters(['' => 'service']);
        });

        Route::group(['prefix' => 'packages', 'as' => 'packages.'], function () {
            Route::resource('', PackageController::class)->parameters(['' => 'package']);
        });

        Route::group(['prefix' => 'projects', 'as' => 'projects.'], function () {
            Route::resource('', ProjectController::class)->parameters(['' => 'project']);
        });

        Route::group(['prefix' => 'custom-fields', 'as' => 'custom-fields.'], function () {
            Route::resource('', CustomFieldController::class)->parameters(['' => 'custom-field']);
        });

        Route::group(['prefix' => 'quotation-requests', 'as' => 'quotation-requests.'], function () {
            Route::resource('', QuotationRequestController::class)->parameters(['' => 'quotation-request'])->only(['index', 'edit', 'update', 'destroy']);
        });
    });

    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        Route::get(
            sprintf('%s/{slug}', SlugHelper::getPrefix(ServiceCategory::class, 'service-categories')),
            [PublicController::class, 'category']
        )->name('public.category');

        Route::get(
            sprintf('%s/{slug}', SlugHelper::getPrefix(Service::class, 'services')),
            [PublicController::class, 'service']
        )->name('public.service');

        Route::get(
            sprintf('%s/{slug}', SlugHelper::getPrefix(Package::class, 'packages')),
            [PublicController::class, 'package']
        )->name('public.package');

        Route::get(
            sprintf('%s/{slug}', SlugHelper::getPrefix(Project::class, 'projects')),
            [PublicController::class, 'project']
        )->name('public.project');

        Route::prefix('portfolio')->name('portfolio.')->group(function () {
            Route::post('request-quote', [PublicController::class, 'storeQuote'])->name('request-quote');
        });
    });
});
