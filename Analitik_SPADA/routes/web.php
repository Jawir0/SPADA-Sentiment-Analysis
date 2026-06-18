<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;


Route::get('/', [HomeController::class, 'landing']);
Route::get('/dashboard', [ReviewController::class, 'index'])->name('dashboard');

Route::get('/survey', [UserController::class, 'index'])->name('survey');
Route::post('/survey/submit', [ReviewController::class, 'store'])->name('survey.submit');


Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');

Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/update-sentiment/{id}', [AdminController::class, 'updateSentiment'])->name('admin.update');
    Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});