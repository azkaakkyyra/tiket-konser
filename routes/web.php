<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminTicketController;

// ADMIN
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', [AdminTicketController::class, 'index'])
            ->name('admin.dashboard');
    });

    // login 
Route::get('/', [AuthController::class, 'showLogin']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// register 
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// halaman etmin 
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminTicketController::class, 'index'])->name('admin.dashboard');
        Route::post('/checkin/{ticket}', [AdminTicketController::class, 'checkIn'])->name('admin.checkin');
    });


// HALAMAN PENGUNJUNG
Route::get('/pengunjung', 
    [DashboardController::class, 'pengunjung']
)->name('pengunjung.dashboard');


