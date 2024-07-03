<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HospedesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcomodacoesController;
use App\Http\Controllers\ReservasController;


Route::get('/', [HospedesController::class,'index'])->name('hospedes.index');
Route::prefix('hospedes')->group(function () {
    Route::get('/create', [HospedesController::class, 'create'])->name('hospedes.create');
    Route::post('/', [HospedesController::class, 'store'])->name('hospedes.store');
    Route::get('/{id}/show', [HospedesController::class, 'show'])->name('hospedes.show');
    Route::get('/{id}/edit', [HospedesController::class, 'edit'])->name('hospedes.edit');
    Route::put('/{id}', [HospedesController::class, 'update'])->name('hospedes.update');
    Route::patch('/{id}', [HospedesController::class, 'destroy'])->name('hospedes.destroy');
});



Route::prefix('acomodacoes')->group(function () {
    Route::get('/', [AcomodacoesController::class,'index'])->name('acomodacoes.index');
    Route::get('/create', [AcomodacoesController::class, 'create'])->name('acomodacoes.create');
    Route::post('/', [AcomodacoesController::class, 'store'])->name('acomodacoes.store');
    Route::get('/{id}/show', [AcomodacoesController::class, 'show'])->name('acomodacoes.show');
    Route::get('/{id}/edit', [AcomodacoesController::class, 'edit'])->name('acomodacoes.edit');
    Route::put('/{id}', [AcomodacoesController::class, 'update'])->name('acomodacoes.update');
    Route::patch('/{id}', [AcomodacoesController::class, 'destroy'])->name('acomodacoes.destroy');
});

Route::prefix('reservas')->group(function () {
    Route::get('/', [ReservasController::class,'index'])->name('reservas.index');
    Route::get('/create', [ReservasController::class, 'create'])->name('reservas.create');
    Route::post('/', [ReservasController::class, 'store'])->name('reservas.store');
    Route::get('/{id}/show', [ReservasController::class, 'show'])->name('reservas.show');
    Route::get('/{id}/edit', [ReservasController::class, 'edit'])->name('reservas.edit');
    Route::put('/{id}', [ReservasController::class, 'update'])->name('reservas.update');
    Route::patch('/{id}', [ReservasController::class, 'destroy'])->name('reservas.destroy');
});
