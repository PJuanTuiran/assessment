<?php

use App\Livewire\AppointmentsIndex;
use App\Livewire\UserCrud;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/usuarios', UserCrud::class)->name('usuarios.index');
    Route::get('/appointments', AppointmentsIndex::class)
        ->middleware(['auth'])->name('appointments.index');
});
