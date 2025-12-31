<?php

use App\Http\Controllers\QueueController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [QueueController::class, 'index'])->name('home');
Route::post('/queue', [QueueController::class, 'store'])->name('queue.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [QueueController::class, 'adminDashboard'])->name('dashboard');
    Route::get('/queue/update/{id}/{status}', [QueueController::class, 'updateStatus'])->name('queue.update');
});

require __DIR__.'/auth.php';

