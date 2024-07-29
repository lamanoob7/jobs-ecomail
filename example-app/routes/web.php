<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/old', function () {
    return view('welcome');
});


Route::get('/', [TaskController::class, 'index'])->name('task.index');


Route::get('/tasks/create', [TaskController::class, 'create'])->name('task.create');

Route::post('/tasks', [TaskController::class, 'store'])->name('task.store');

Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');

Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('task.update');



