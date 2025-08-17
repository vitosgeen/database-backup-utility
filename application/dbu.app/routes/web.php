<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/dashboard', [UserController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/databases', [DatabaseController::class, 'index'])->name('databases.index');
    Route::get('/databases/create', [DatabaseController::class, 'create'])->name('databases.create');
    Route::post('/databases', [DatabaseController::class, 'store'])->name('databases.store');
    Route::get('/databases/{id}/edit', [DatabaseController::class, 'edit'])->name('databases.edit');
    Route::put('/databases/{id}', [DatabaseController::class, 'update'])->name('databases.update');
    Route::delete('/databases/{id}', [DatabaseController::class, 'destroy'])->name('databases.destroy');
    Route::post('/databases/{id}/test', [DatabaseController::class, 'testConnection'])->name('databases.test');
    Route::get('/backups', [BackupController::class, 'index'])->name('backups.index');
    Route::post('/backup/run/{id}', [BackupController::class, 'run'])->name('backup.run');
    Route::get('/backup/{id}/download', [BackupController::class, 'download'])->name('backup.download');
    Route::delete('/backup/{id}', [BackupController::class, 'destroy'])->name('backup.destroy');

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');

    Route::get('/logs', [UserLogController::class, 'index'])->name('logs.index');
});
