<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Models\Application;

Route::get('/', function () {
    return Inertia::render('Home', [
        'apps' => Application::all()
    ]);
})->name('home');

Route::get('/app/{id}', function ($id) {
    $app = Application::with('features')->find($id);
    if (!$app) abort(404);
    
    return Inertia::render('AppDetail', [
        'app' => $app
    ]);
})->name('app.detail');

