<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

// Admin routes
Route::middleware(['auth', \App\Http\Middleware\AdminMiddelware::class])->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

    // Inbox routes
    Route::get('/admin/inbox', [App\Http\Controllers\AdminController::class, 'inbox'])->name('admin.inbox');
    Route::get('/admin/inbox/{id}', [App\Http\Controllers\AdminController::class, 'showMessage'])->name('admin.inbox.show');
    Route::delete('/admin/inbox/{id}', [App\Http\Controllers\AdminController::class, 'deleteMessage'])->name('admin.inbox.delete');

    // People management
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

// News routes
Route::prefix('news')->group(function () {
    
    // Public routes
    Route::get('/', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
    Route::get('/{news}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

    // Admin routes (requires authentication)
    Route::middleware(['auth', \App\Http\Middleware\AdminMiddelware::class])->group(function () {
        Route::get('/news/create', [App\Http\Controllers\NewsController::class, 'create'])->name('news.create');
        Route::post('/', [App\Http\Controllers\NewsController::class, 'store'])->name('news.store');
        Route::get('/{news}/edit', [App\Http\Controllers\NewsController::class, 'edit'])->name('news.edit');
        Route::put('/{news}', [App\Http\Controllers\NewsController::class, 'update'])->name('news.update');
        Route::delete('/{news}', [App\Http\Controllers\NewsController::class, 'destroy'])->name('news.destroy');
    });
});

Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('welcome');
Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index'])->name('faq');

// Profile routes
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::get('/users/search', [App\Http\Controllers\ProfileController::class, 'search'])->name('users.search');
Route::get('/users/{id}', [App\Http\Controllers\ProfileController::class, 'view'])->name('users.view');
Route::post('/messages/{user}', [App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');
Route::get('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'view'])->name('profile.view');


// Contact page routes
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

