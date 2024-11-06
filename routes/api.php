<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoanBorrowerController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanLenderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/login', [AuthController::class, 'login']);

Route::prefix('loans')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [LoanController::class, 'index']);
    Route::post('/', [LoanController::class, 'create']);
    Route::put('/{id}', [LoanController::class, 'update']);
    Route::get('/{id}', [LoanController::class, 'view']);
    Route::delete('/{id}', [LoanController::class, 'delete']);
});

Route::prefix('borrowers')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [LoanBorrowerController::class, 'index']);
    Route::post('/', [LoanBorrowerController::class, 'create']);
    Route::put('/{id}', [LoanBorrowerController::class, 'update']);
    Route::get('/{id}', [LoanBorrowerController::class, 'view']);
    Route::delete('/{id}', [LoanBorrowerController::class, 'delete']);
});

Route::get('/lenders', [LoanLenderController::class, 'index']);
Route::prefix('lenders')->middleware('auth:sanctum')->group(function () {
    Route::post('/', [LoanLenderController::class, 'create']);
    Route::put('/{id}', [LoanLenderController::class, 'update']);
    Route::get('/{id}', [LoanLenderController::class, 'view']);
    Route::delete('/{id}', [LoanLenderController::class, 'delete']);
});
