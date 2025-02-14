<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
  
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  
Route::resource('students', StudentController::class);

Route::resource('universities', UniversityController::class);