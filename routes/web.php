<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/category/{slug}', [\App\Http\Controllers\Frontend\CategoryController::class, 'show'])->name('category.show');

Route::get('/story', function () {
    return view('story');
});

Route::get('/reading', function () {
    return view('reading');
});

Route::get('/submit', function () {
    return view('submit');
});

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
Route::prefix('admin')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::patch('/users/{user}/role', [\App\Http\Controllers\Admin\UserController::class, 'updateRole'])->name('admin.users.updateRole');
    Route::patch('/users/{user}/status', [\App\Http\Controllers\Admin\UserController::class, 'updateStatus'])->name('admin.users.updateStatus');
    
    Route::get('/categories', function () { return view('admin.categories'); });
    Route::get('/stories', function () { return view('admin.stories'); });
    Route::get('/pending', function () { return view('admin.pending'); });
    Route::get('/review', function () { return view('admin.review'); });
});
