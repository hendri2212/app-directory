<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ApplicationController;

Route::get('/', [ApplicationController::class, 'index'])->name('home');
Route::get('/app/{id}', [ApplicationController::class, 'show'])->name('app.detail');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ApplicationController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/create', [ApplicationController::class, 'create'])->name('apps.create');
    Route::post('/dashboard/store', [ApplicationController::class, 'store'])->name('apps.store');
    Route::get('/dashboard/app/{id}/edit', [ApplicationController::class, 'edit'])->name('apps.edit');
    Route::put('/dashboard/app/{id}', [ApplicationController::class, 'update'])->name('apps.update');
    Route::delete('/dashboard/app/{id}', [ApplicationController::class, 'destroy'])->name('apps.destroy');
});

require __DIR__.'/auth.php';

