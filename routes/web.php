<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
Route::get('/task/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::get('/task/delete', [TaskController::class, 'delete'])->name('task.delete');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
