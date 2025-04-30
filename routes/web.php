<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TierListController;

Route::get('/', [TierListController::class, 'index'])->name('index');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::post('/items', [TierListController::class, 'store'])->name('items.store');

Route::delete('/items/{id}', [TierListController::class, 'destroy'])->name('items.destroy');

Route::get('/items/{id}/edit', [TierListController::class, 'edit'])->name('items.edit');

Route::put('/items/{id}', [TierListController::class, 'update'])->name('items.update');