<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/create', [ProjectController::class, 'create'])->middleware('auth');
Route::post('/projects', [ProjectController::class, 'store'])->middleware('auth');
Route::get('/projects/{project}', [ProjectController::class, 'show']);
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->middleware('auth')->can('update', 'project');
Route::patch('/projects/{project}', [ProjectController::class, 'update'])->middleware('auth')->can('update', 'project');
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->middleware('auth')->can('update', 'project');

Route::middleware('auth')->can('update', 'project')->group(function() {
    Route::get('/projects/{project}/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/projects/{project}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/projects/{project}/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/projects/{project}/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/projects/{project}/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::patch('/projects/{project}/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/projects/{project}/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);