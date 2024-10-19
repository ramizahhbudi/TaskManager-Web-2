<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

Route::middleware('auth')->group(function () {
    // Hanya pengguna yang sudah login bisa mengakses rute-rute di dalam grup ini
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Rute untuk Task Controller yang juga butuh autentikasi
    Route::resource('tasks', TaskController::class);
});

Route::get('/user/{id}', function ($id) {
    return "Profil pengguna dengan ID: " . $id;
});

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return "Daftar pengguna";
    });
    Route::get('/posts', function () {
        return "Daftar post";
    });
});

Route::middleware(['check.auth'])->group(function () {
    // Protected routes here
});

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login']);
Route::get('register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::middleware([\App\Http\Middleware\CheckTaskOwner::class])->group(function () {
    Route::resource('tasks', TaskController::class)->except(['edit', 'update', 'destroy']);
    Route::resource('tasks', TaskController::class)->only(['edit', 'update', 'destroy'])->middleware('task.owner');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class)->except(['edit', 'update', 'destroy']);
    Route::resource('tasks', TaskController::class)->only(['edit', 'update', 'destroy'])->middleware('task.owner');
});

Route::resource('tasks', TaskController::class);
Route::get('tasks/{owner}', [TaskController::class, 'owner']);

// Contoh untuk Laravel
Route::middleware([\App\Http\Middleware\Authenticate::class])->group(function () {
    Route::resource('tasks', TaskController::class);
});