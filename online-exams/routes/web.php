<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
    Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
    Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');
    Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('subjects.show');
    Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::patch('/subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
    Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');
    Route::get('/subjects/{subject}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/subjects/{subject}/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/subjects/{subject}/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::patch('/subjects/{subject}/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/subjects/{subject}/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::get('/exams', [ExamController::class, 'index'])->name('exams.index');
    Route::get('/exams/create/{subject}', [ExamController::class, 'create'])->name('exams.create');
    Route::post('/exams', [ExamController::class, 'store'])->name('exams.store');
    Route::get('/exams/{exam}', [ExamController::class, 'show'])->name('exams.show');
    Route::delete('/exams/{exam}', [ExamController::class, 'destroy'])->name('exams.destroy');
    Route::get('/exams/random/{subject}', [ExamController::class, 'random'])->name('exams.random');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserController::class, 'store'])->name('users.store');
});

require __DIR__.'/auth.php';
