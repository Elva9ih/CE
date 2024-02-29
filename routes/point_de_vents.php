<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CePointDeVentController;

Route::group(['prefix' => 'point_de_vents'], function () {
    Route::get('/', [CePointDeVentController::class, 'index']);
    Route::get('getDT/{selected?}', [CePointDeVentController::class, 'getDT']);
    Route::get('get/{id}', [CePointDeVentController::class, 'get']);
    Route::get('add/', [CePointDeVentController::class, 'formAdd']);
    Route::post('add', [CePointDeVentController::class, 'add']);
    Route::get('getTab/{id}/{tab}', [CePointDeVentController::class, 'getTab']);
    Route::post('edit', [CePointDeVentController::class, 'edit']);
    Route::get('delete/{id}', [CePointDeVentController::class, 'delete']);


});