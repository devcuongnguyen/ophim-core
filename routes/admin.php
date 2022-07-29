<?php

use Illuminate\Support\Facades\Route;
use CKSource\CKFinderBridge\Controller\CKFinderController;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'Ophim\Core\Controllers\Admin',
], function () {
    Route::crud('category', 'CategoryCrudController');
    Route::crud('region', 'RegionCrudController');
    Route::crud('movie', 'MovieCrudController');
    Route::crud('actor', 'ActorCrudController');
    Route::crud('director', 'DirectorCrudController');
    Route::crud('studio', 'StudioCrudController');
    Route::crud('tag', 'TagCrudController');
    Route::crud('menu', 'MenuCrudController');
    Route::crud('crawl-schedule', 'CrawlScheduleCrudController');
    Route::crud('episode', 'EpisodeCrudController');
    Route::crud('customizer', 'CustomizerController');
});

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        [
            \Ophim\Core\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class
        ],
        (array) config('backpack.base.middleware_key', 'admin')
    ),
], function () {
    Route::prefix('/ckfinder')->group(function () {
        Route::any('/connector', [CKFinderController::class, 'requestAction'])->name('ckfinder_connector');
        Route::any('/browser', [CKFinderController::class, 'browserAction'])->name('ckfinder_browser');
    });
});
