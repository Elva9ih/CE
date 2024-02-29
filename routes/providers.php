<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CeProviderController;

Route::group(['prefix' => 'providers'], function () {
    Route::get('/', [CeProviderController::class, 'index']);
    Route::get('getDT/{selected?}', [CeProviderController::class, 'getDT']);
    Route::get('get/{id}', [CeProviderController::class, 'get']);
    Route::get('add/', [CeProviderController::class, 'formAdd']);
    Route::post('add', [CeProviderController::class, 'add']);
    Route::get('getTab/{id}/{tab}', [CeProviderController::class, 'getTab']);
    Route::post('edit', [CeProviderController::class, 'edit']);
    Route::get('delete/{id}', [CeProviderController::class, 'delete']);


});