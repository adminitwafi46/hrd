<?php

use App\Http\Controllers\ProfileController;
//karyawanController
use App\Http\Controllers\karyawanController;
//departemenController
use App\Http\Controllers\departemenController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/karyawan', [karyawanController::class, 'karyawan'])->name('karyawan');
});

//departemen
Route::middleware('auth')->group(function () {
    Route::get('/departemen', [departemenController::class, 'departemen'])->name('departemen');
    //create departemen
    Route::get('/departemen/create', [departemenController::class, 'create'])->name('departemen.create');
    Route::post('/departemen/store', [departemenController::class, 'store'])->name('departemen.store');
    Route::get('/departemen/edit/{id}', [departemenController::class, 'edit'])->name('departemen.edit');
    //post simpan
    Route::post('/departemen/update', [departemenController::class, 'update'])->name('departemen.update');

});

require __DIR__.'/auth.php';
