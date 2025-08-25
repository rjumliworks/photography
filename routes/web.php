<?php

use Illuminate\Support\Facades\Route;



Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);
Route::post('/', [App\Http\Controllers\WelcomeController::class, 'store']);

Route::middleware(['2fa','auth','verified','checkactive'])->group(function () {
    Route::resource('/profile', App\Http\Controllers\Auth\ProfileController::class);
    Route::get('/search', [App\Http\Controllers\DashboardController::class, 'search']);
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['role:Administrator'])->group(function () {
        Route::resource('/users', App\Http\Controllers\Administrator\UserController::class);
        Route::resource('/plans', App\Http\Controllers\Administrator\PlanController::class);
    });

    Route::resource('/folders', App\Http\Controllers\Common\FolderController::class);
    Route::resource('/files', App\Http\Controllers\Common\FileController::class);
    Route::resource('/trash', App\Http\Controllers\Common\TrashController::class);

});

require __DIR__.'/auth.php';
