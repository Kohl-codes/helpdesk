<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\AuthController;

// Show login form
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Handle login form submission
Route::post('/login', [AuthController::class, 'login']);

// Protect routes with 'auth' middleware
Route::middleware('auth')->group(function () {
    // Dashboard view
    Route::get('/dashboard', [HelpdeskController::class, 'showDashboard'])->name('dashboard');
    
    // Form to log a new call
    Route::get('/calls/create', [HelpdeskController::class, 'showLogCallForm'])->name('calls.create');
    Route::post('/calls', [HelpdeskController::class, 'logCall']);

    // Form to assign a specialist to a problem
    Route::get('/problems/assign', [HelpdeskController::class, 'showAssignSpecialistForm'])->name('problems.assign');
    Route::post('/problems/assign', [HelpdeskController::class, 'assignProblem']);

    // View all logged calls
    Route::get('/calls', [HelpdeskController::class, 'getCalls'])->name('calls.index');
});
