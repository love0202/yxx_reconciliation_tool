<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', [App\Http\Controllers\Auth\UserController::class, 'login'])->name('auth_user.login');
Route::post('/login/store', [App\Http\Controllers\Auth\UserController::class, 'store'])->name('auth_user.store');
Route::post('/logout', [App\Http\Controllers\Auth\UserController::class, 'logout'])->name('auth_user.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/project/index', [App\Http\Controllers\Project\ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/enter', [App\Http\Controllers\Project\ProjectController::class, 'enter'])->name('project.enter');
    Route::get('/project/create', [App\Http\Controllers\Project\ProjectController::class, 'create'])->name('project.create');
    Route::post('/project/store', [App\Http\Controllers\Project\ProjectController::class, 'store'])->name('project.store');
});

// 测试页面
Route::get('/test/bootstrap', function () {
    return view('test.bootstrap');
});
