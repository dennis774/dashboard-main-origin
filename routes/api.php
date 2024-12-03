<?php

use App\Models\ApiToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\ApiTokenController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['middleware' => ['web']], function () {
    Route::get('/refresh-data/{type}', [DataController::class, 'refreshData'])->name('refresh.data');
});

