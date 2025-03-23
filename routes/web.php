<?php

use App\Http\Controllers\IgrejaController;
use App\Http\Controllers\MembroController;

Route::resource('igrejas', IgrejaController::class);
Route::resource('membros', MembroController::class);
Route::get('membros/cidades-por-estado', [MembroController::class, 'cidadesPorEstado'])->name('membros.cidadesPorEstado');

