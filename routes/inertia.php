<?php

Route::name('nova.google2fa.')->group(function () {
    Route::get('/register', [\CubeAgency\NovaGoogle2fa\Http\Controllers\RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [\CubeAgency\NovaGoogle2fa\Http\Controllers\RegisterController::class, 'register'])->name('register');
    Route::get('/authenticate', [\CubeAgency\NovaGoogle2fa\Http\Controllers\AuthenticationController::class, 'index'])->name('authenticate.index');
    Route::post('/authenticate', [\CubeAgency\NovaGoogle2fa\Http\Controllers\AuthenticationController::class, 'authenticate'])->name('authenticate');
    Route::get('/recover', [\CubeAgency\NovaGoogle2fa\Http\Controllers\RecoveryController::class, 'index'])->name('recover.index');
    Route::post('/recover', [\CubeAgency\NovaGoogle2fa\Http\Controllers\RecoveryController::class, 'recover'])->name('recover');
    Route::get('/destroy', [\CubeAgency\NovaGoogle2fa\Http\Controllers\RecoveryController::class, 'destroy'])->name('destroy');
});
