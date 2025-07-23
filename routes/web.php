<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\MainController;
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

    Route::get('/home', [MainController::class, 'index'])->name('home');

    Route::get('/subir-documentos/{client_id}', [MainController::class, 'documentForm'])->name('document.register');
    Route::get('/cadastrar-cliente', [MainController::class, 'clientForm'])->name('client.register');

    Route::prefix('client')->group(function () {
        Route::post('/', [ClientController::class, 'store'])->name('client.store');
        Route::get('/{id}', [MainController::class, 'clientDocuments'])->name('client.documents');
    });

    Route::prefix('document')->group(function () {
        Route::get('/{document_id}/{user_id}', [DocumentController::class, 'index'])->name('document.index');
        Route::get('/{document_id}', [DocumentController::class, 'download'])->name('document.download');
        Route::post('/', [DocumentController::class, 'store'])->name('document.store');
        Route::delete('/{document_id}', [DocumentController::class, 'destroy'])->name('document.destroy');
    });
});
