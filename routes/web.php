<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Projects\ProjectController;
use App\Http\Controllers\Projects\TaskController;
use App\Http\Controllers\Projects\TaskPriorityController;
use App\Http\Controllers\Projects\TaskStateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Projects
    Route::resource('projects', ProjectController::class)->names('projects');
    Route::resource('tasks', TaskController::class)->names('tasks');
    Route::resource('task-priorities', TaskPriorityController::class)->names('task-priorities');
    Route::resource('task-states', TaskStateController::class)->names('task-states');
});

require __DIR__ . '/auth.php';
