<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth', \App\Http\Middleware\AdminMiddelware::class])->group(function () {

    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');});

// Existing routes
Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('welcome');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth routes
Route::get('/register', [App\Http\Controllers\HomeController::class, 'index'])->name('register');
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');

Auth::routes();

// Profile routes
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

// Contact page routes
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

// Admin routes
//Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
