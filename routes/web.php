<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DivisionController;
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

Route::get('/division', [DivisionController::class, 'index'])->name('division.index');
Route::get('/division/create', [DivisionController::class, 'create'])->name('division.create');
Route::post('/division', [DivisionController::class, 'store'])->name('division.store');
Route::get('/division/{id}/edit', [DivisionController::class, 'edit'])->name('division.edit');
Route::put('/division/{id}', [DivisionController::class, 'update'])->name('division.update');
Route::delete('/division/{id}', [DivisionController::class, 'destroy'])->name('division.destroy');



Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/employee/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
require __DIR__.'/auth.php';
