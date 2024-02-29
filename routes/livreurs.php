<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CeLivreurController;

Route::group(['prefix' => 'livreurs'], function () {
    Route::get('/', [CeLivreurController::class, 'index']);
    Route::get('getDT/{selected?}', [CeLivreurController::class, 'getDT']);
    Route::get('get/{id}', [CeLivreurController::class, 'get']);
    Route::get('add/', [CeLivreurController::class, 'formAdd']);
    Route::post('add', [CeLivreurController::class, 'add']);
    Route::get('getTab/{id}/{tab}', [CeLivreurController::class, 'getTab']);
    Route::get('delete/{id}', [CeLivreurController::class, 'delete']);
    Route::post('edit', [CeLivreurController::class, 'edit']);


});