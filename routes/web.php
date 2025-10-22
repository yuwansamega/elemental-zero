<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataGeneratorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MassTransfersController;
use App\Http\Controllers\SITCaptureController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/mass-transfer/mt100', [MassTransfersController::class, 'mt100'])->name('mt100');
// Route::get('/', [DataGeneratorController::class, 'index'])->name('form');
// Route::post('/generate', [DataGeneratorController::class, 'generate'])->name('generate');
Route::post('/generate', [DataGeneratorController::class, 'generateAlfaria'])->name('generateAlfaria');
// Route::get('/generate-docx', [SITCaptureController::class, 'generate'])->name('generate');
