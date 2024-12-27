<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenceController;

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
// Route::resource('absence', AbsenceController::class);
Route::get('/absence', [AbsenceController::class, 'index']);


Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/employee/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
require __DIR__.'/auth.php';
