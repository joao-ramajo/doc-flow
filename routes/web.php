<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::get('/login/admin', [AuthController::class, 'loginAdmin'])->name('login.admin');
    Route::get('/login/client', [AuthController::class, 'loginClient'])->name('login.client');
    Route::get('/login/employee', [AuthController::class, 'loginEmployee'])->name('login.employee');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('/', '/home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/home', function () {
        echo "OLA " . Auth::user()->name;
    })->name('home');
});
