<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserrController;
use Illuminate\Support\Facades\Route;

// Route to display the student information
Route::get('students', [StudentController::class, 'index'])->name('students.index');

// Route to update the student's course state
Route::get('students/update', [UserrController::class, 'index']);

// Route to register a new student
Route::post('students/create', [StudentController::class, 'store']) ->name('students.store');

// Route to login a student
Route::get('dashboard', [StudentController::class, 'dashboard'])->name('students.dashboard');
