<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServisController;

Route::get('/', function () {
    return redirect()->route('servis.index');
});

// Servis Routes
Route::prefix('servis')->name('servis.')->group(function () {
    Route::get('/', [ServisController::class, 'index'])->name('index');
    Route::get('/create', [ServisController::class, 'create'])->name('create');
    Route::post('/', [ServisController::class, 'store'])->name('store');
    Route::get('/{servis}/edit', [ServisController::class, 'edit'])->name('edit');
    Route::put('/{servis}', [ServisController::class, 'update'])->name('update');
    Route::delete('/{id}', [ServisController::class, 'destroy'])->name('destroy');

    // Tambahan untuk soft delete
    Route::get('/deleted', [ServisController::class, 'deleted'])->name('deleted');
    Route::post('/restore/{id}', [ServisController::class, 'restore'])->name('restore');
    Route::delete('/forceDelete/{id}', [ServisController::class, 'forceDelete'])->name('forceDelete');
});
