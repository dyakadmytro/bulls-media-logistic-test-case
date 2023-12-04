<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\DeliveryController;
use \App\Http\Controllers\Api\PackageController;
use \App\Http\Controllers\Api\AddressController;


Route::middleware('auth:sanctum')->group(function () {
    Route::resource('package', AddressController::class)
        ->except(['create', 'edit']);
    Route::resource('package', PackageController::class)
        ->except(['create', 'edit']);
    Route::resource('package', DeliveryController::class)
        ->except(['create', 'edit']);
});
