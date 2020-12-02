<?php

use App\Http\Controllers\Users\TaskController;
use Illuminate\Support\Facades\Route;

Route::resource('task', TaskController::class);
