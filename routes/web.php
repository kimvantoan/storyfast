<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

Route::get('/category/{slug}', [\App\Http\Controllers\Frontend\CategoryController::class, 'show'])->name('category.show');

Route::get('/story/{id_or_slug}', [\App\Http\Controllers\Frontend\StoryController::class, 'show'])->name('story.show');
Route::get('/story/{id_or_slug}/chapter/{order_index}', [\App\Http\Controllers\Frontend\ReadingController::class, 'show'])->name('reading.show');
Route::get('/story/{id_or_slug}/drawer-chapters', [\App\Http\Controllers\Frontend\ReadingController::class, 'drawerList'])->name('reading.drawer.list');

Route::post('/user/request-author', [\App\Http\Controllers\Frontend\UserController::class, 'requestAuthor'])->name('user.request_author')->middleware('auth');

// Route::get('/submit', [\App\Http\Controllers\User\SubmitController::class, 'create'])->name('story.submit');
// Route::post('/submit', [\App\Http\Controllers\User\SubmitController::class, 'store'])->name('story.submit.post');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/policy', function () {
    return view('policy');
})->name('policy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/disclaimer', function () {
    return view('disclaimer');
})->name('disclaimer');

Route::get('/login/google', [\App\Http\Controllers\Auth\GoogleLoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [\App\Http\Controllers\Auth\GoogleLoginController::class, 'handleGoogleCallback']);

use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthorMiddleware;

Route::prefix('admin')->middleware(['auth'])->group(function () {

    // Author & Admin Routes
    Route::middleware([AuthorMiddleware::class])->group(function () {
        Route::patch('/stories/{story}/toggle-publish', [\App\Http\Controllers\Admin\StoryController::class, 'togglePublish'])->name('admin.stories.togglePublish');
        Route::resource('/stories', \App\Http\Controllers\Admin\StoryController::class)->names('admin.stories');
        Route::patch('/chapters/{chapter}/toggle-publish', [\App\Http\Controllers\Admin\ChapterController::class, 'togglePublish'])->name('admin.chapters.togglePublish');
        Route::resource('/stories.chapters', \App\Http\Controllers\Admin\ChapterController::class)->names('admin.chapters')->shallow();
    });

    // Admin Only Routes
    Route::middleware([AdminMiddleware::class])->group(function () {
        // Users
        Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
        Route::patch('/users/{user}/role', [\App\Http\Controllers\Admin\UserController::class, 'updateRole'])->name('admin.users.updateRole');
        Route::patch('/users/{user}/reject-request', [\App\Http\Controllers\Admin\UserController::class, 'rejectRequest'])->name('admin.users.rejectRequest');
        Route::patch('/users/{user}/status', [\App\Http\Controllers\Admin\UserController::class, 'updateStatus'])->name('admin.users.updateStatus');

        // Categories
        Route::get('/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.categories.index');
        Route::post('/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.categories.store');
        Route::put('/categories/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/categories/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.categories.destroy');
        
        // Pending stories management
        Route::get('/pending', [\App\Http\Controllers\Admin\PendingStoryController::class, 'index'])->name('admin.pending.index');
        Route::patch('/pending/{story}/approve', [\App\Http\Controllers\Admin\PendingStoryController::class, 'approve'])->name('admin.pending.approve');
        Route::delete('/pending/{story}/reject', [\App\Http\Controllers\Admin\PendingStoryController::class, 'reject'])->name('admin.pending.reject');

        // Pending chapters management
        Route::get('/pending/chapters', [\App\Http\Controllers\Admin\PendingChapterController::class, 'index'])->name('admin.pending.chapters.index');
        Route::patch('/pending/chapters/{chapter}/approve', [\App\Http\Controllers\Admin\PendingChapterController::class, 'approve'])->name('admin.pending.chapters.approve');
        Route::delete('/pending/chapters/{chapter}/reject', [\App\Http\Controllers\Admin\PendingChapterController::class, 'reject'])->name('admin.pending.chapters.reject');
    });
});
