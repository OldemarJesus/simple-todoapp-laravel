<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/tasks/store', [TaskController::class, 'store'])->name('task.store');
Route::get('/tasks/{task_id}', [TaskController::class, 'edit'])->name('task.edit');
Route::patch('/tasks/{task_id}', [TaskController::class, 'update'])->name('task.update');
Route::delete('/tasks/{task_id}', [TaskController::class, 'destroy'])->name('task.destroy');
Route::patch('/tasks/completed/{task_id}/{cur_task_completion}', [TaskController::class, 'completed'])->name('task.completed');