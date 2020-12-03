<?php

use App\Http\Controllers\Users\TaskController;
use Illuminate\Support\Facades\Route;

Route::resource('task', TaskController::class);

Route::get('task/{task}/done', [TaskController::class, 'doneTask'])->name('task.done');
