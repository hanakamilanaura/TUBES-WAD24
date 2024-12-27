<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\VacationController;
use App\Http\Controllers\AbsenceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Masukkan route yang perlu login di bawah sini
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/vacation', [VacationController::class, 'index'])->name('vacation.index');
Route::get('/vacation/create', [VacationController::class, 'create'])->name('vacation.create');
Route::post('/vacation', [VacationController::class, 'store'])->name('vacation.store');
Route::get('/vacation/{id}/edit', [VacationController::class, 'getEditForm'])->name('vacation.edit');
Route::put('/vacation/{id}', [VacationController::class, 'update'])->name('vacation.update');
Route::delete('/vacation/{id}', [VacationController::class, 'destroy'])->name('vacation.destroy');

Route::get('/absence', [AbsenceController::class, 'index'])->name('absence.index');
Route::get('/absence/create', [AbsenceController::class, 'getCreateForm'])->name('absence.create');
Route::post('/absence', [AbsenceController::class, 'store'])->name('absence.store');
Route::get('/absence/{id}/edit', [AbsenceController::class, 'getEditForm'])->name('absence.edit');
Route::put('/absence/{id}', [AbsenceController::class, 'update'])->name('absence.update');
Route::delete('/absence/{id}', [AbsenceController::class, 'destroy'])->name('absence.destroy');

require __DIR__.'/auth.php';
