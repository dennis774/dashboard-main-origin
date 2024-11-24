<?php

use App\Models\ApiToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\ApiTokenController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('refresh-data', [DataController::class, 'refreshData']);
Route::get('api-token', [ApiTokenController::class, 'getApiToken']);
Route::get('register', [ApiTokenController::class, 'registerUser']);
// Route::get('refresh-data', [DataController::class, 'refreshData'])->name('refresh.data');

Route::group(['middleware' => ['web']], function () {
    Route::get('/refresh-data', [DataController::class, 'refreshData'])->name('refresh.data');
    Route::get('/uddesign-refresh-data', [DataController::class, 'Uddesign_Refresh_Data'])->name('uddesign.refresh.data');
});

