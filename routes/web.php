<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TaskController;

Route::get('/', function (EventController $eventController) {
    $event = $eventController->getPublishedEvent();
    $tasks = \App\Models\Task::latest()->get();
    return view('welcome', compact('event', 'tasks'));
});

// Task CRUD routes
Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::put('/tasks/{task}', [TaskController::class, 'update']);
Route::post('/tasks/{task}/toggle', [TaskController::class, 'toggle']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
