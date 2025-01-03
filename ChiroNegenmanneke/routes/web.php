<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

// Admin routes
Route::middleware(['auth', \App\Http\Middleware\AdminMiddelware::class])->group(function () {

    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/inbox', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.inbox');
    Route::get('/admin/people', [App\Http\Controllers\AdminController::class, 'people'])->name('admin.people');  
    Route::patch('/admin/user/{id}/role', [App\Http\Controllers\AdminController::class, 'updateRole'])->name('admin.user.updateRole');
    Route::delete('/admin/user/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.user.delete');
    Route::post('/admin/user/store', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.user.store');

    // Admin FAQ routes
    Route::prefix('admin/faq')->group(function () {
        Route::get('/', [App\Http\Controllers\FaqController::class, 'index'])->name('admin.faq.index');
        Route::get('/category/create', [App\Http\Controllers\FaqController::class, 'createCategory'])->name('admin.faq.createCategory');
        Route::post('/category', [App\Http\Controllers\FaqController::class, 'storeCategory'])->name('admin.faq.storeCategory');
        Route::get('/category/{id}/edit', [App\Http\Controllers\FaqController::class, 'editCategory'])->name('admin.faq.editCategory');
        Route::put('/category/{id}', [App\Http\Controllers\FaqController::class, 'updateCategory'])->name('admin.faq.updateCategory');
        Route::delete('/category/{id}', [App\Http\Controllers\FaqController::class, 'destroyCategory'])->name('admin.faq.destroyCategory');
        
        // Manage questions under each category
        Route::get('/category/{categoryId}/question/create', [App\Http\Controllers\FaqController::class, 'createQuestion'])->name('admin.faq.createQuestion');
        Route::post('/category/{categoryId}/question', [App\Http\Controllers\FaqController::class, 'storeQuestion'])->name('admin.faq.storeQuestion');
        Route::get('/question/{id}/edit', [App\Http\Controllers\FaqController::class, 'editQuestion'])->name('admin.faq.editQuestion');
        Route::put('/question/{id}', [App\Http\Controllers\FaqController::class, 'updateQuestion'])->name('admin.faq.updateQuestion');
        Route::delete('/question/{id}', [App\Http\Controllers\FaqController::class, 'destroyQuestion'])->name('admin.faq.destroyQuestion');
    });
});

// Existing routes
Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('welcome');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [App\Http\Controllers\HomeController::class, 'index'])->name('register');
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index'])->name('faq');

Auth::routes();

// Profile routes
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

// Contact page routes
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');
