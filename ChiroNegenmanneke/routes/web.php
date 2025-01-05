<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth', \App\Http\Middleware\AdminMiddelware::class])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('admin/inbox')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'inbox'])->name('admin.inbox');
        Route::get('{id}', [App\Http\Controllers\AdminController::class, 'showMessage'])->name('admin.inbox.show');
        Route::delete('{id}', [App\Http\Controllers\AdminController::class, 'deleteMessage'])->name('admin.inbox.delete');
    });

    Route::prefix('admin/people')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'people'])->name('admin.people');
        Route::patch('user/{id}/role', [App\Http\Controllers\AdminController::class, 'updateRole'])->name('admin.user.updateRole');
        Route::delete('user/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.user.delete');
        Route::post('user/store', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.user.store');
    });

    Route::prefix('admin/faq')->group(function () {
        Route::get('/', [App\Http\Controllers\FaqController::class, 'index'])->name('admin.faq.index');
        Route::get('category/create', [App\Http\Controllers\FaqController::class, 'createCategory'])->name('admin.faq.createCategory');
        Route::post('category', [App\Http\Controllers\FaqController::class, 'storeCategory'])->name('admin.faq.storeCategory');
        Route::get('category/{id}/edit', [App\Http\Controllers\FaqController::class, 'editCategory'])->name('admin.faq.editCategory');
        Route::put('category/{id}', [App\Http\Controllers\FaqController::class, 'updateCategory'])->name('admin.faq.updateCategory');
        Route::delete('category/{id}', [App\Http\Controllers\FaqController::class, 'destroyCategory'])->name('admin.faq.destroyCategory');

        Route::get('category/{categoryId}/question/create', [App\Http\Controllers\FaqController::class, 'createQuestion'])->name('admin.faq.createQuestion');
        Route::post('category/{categoryId}/question', [App\Http\Controllers\FaqController::class, 'storeQuestion'])->name('admin.faq.storeQuestion');
        Route::get('question/{id}/edit', [App\Http\Controllers\FaqController::class, 'editQuestion'])->name('admin.faq.editQuestion');
        Route::put('question/{id}', [App\Http\Controllers\FaqController::class, 'updateQuestion'])->name('admin.faq.updateQuestion');
        Route::delete('question/{id}', [App\Http\Controllers\FaqController::class, 'destroyQuestion'])->name('admin.faq.destroyQuestion');
    });
});

Route::prefix('news')->group(function () {
    Route::get('/', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
    Route::get('{news}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');
    Route::post('{news}/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');

    Route::middleware(['auth', \App\Http\Middleware\AdminMiddelware::class])->group(function () {
        Route::get('create', [App\Http\Controllers\NewsController::class, 'create'])->name('news.create');
        Route::post('/', [App\Http\Controllers\NewsController::class, 'store'])->name('news.store');
        Route::get('{news}/edit', [App\Http\Controllers\NewsController::class, 'edit'])->name('news.edit');
        Route::put('{news}', [App\Http\Controllers\NewsController::class, 'update'])->name('news.update');
        Route::delete('{news}', [App\Http\Controllers\NewsController::class, 'destroy'])->name('news.destroy');
    });
});

Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('welcome');
Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index'])->name('faq');

Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [App\Http\Controllers\ProfileController::class, 'show'])->name('show');
    Route::get('/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('edit');
    Route::post('/', [App\Http\Controllers\ProfileController::class, 'update'])->name('update');
});

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/search', [App\Http\Controllers\ProfileController::class, 'search'])->name('search');
    Route::get('/{id}', [App\Http\Controllers\ProfileController::class, 'view'])->name('view');
});

Route::post('/messages/{user}', [App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');


// Contact routes
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

// Forum routes (auth required)
Route::middleware('auth')->group(function () {
    Route::prefix('forum')->group(function () {
        Route::get('/', [App\Http\Controllers\ForumController::class, 'index'])->name('forum.index');
        Route::get('create', [App\Http\Controllers\ForumController::class, 'create'])->name('forum.create');
        Route::post('store', [App\Http\Controllers\ForumController::class, 'store'])->name('forum.store');
        Route::get('{topic}', [App\Http\Controllers\ForumController::class, 'show'])->name('forum.show');
        Route::post('{topic}/reply', [App\Http\Controllers\ForumController::class, 'storeReply'])->name('forum.reply.store');
        Route::get('{topic}/edit', [App\Http\Controllers\ForumController::class, 'edit'])->name('forum.edit');
        Route::put('{topic}', [App\Http\Controllers\ForumController::class, 'update'])->name('forum.update');
        Route::delete('{topic}', [App\Http\Controllers\ForumController::class, 'destroy'])->name('forum.destroy');
    });
});
