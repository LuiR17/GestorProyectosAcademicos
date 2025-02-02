<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/dashboard');

Route::get('/dashboard', [ProjectController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/projects/create', [ProjectController::class, 'create'])->middleware(['auth', 'verified'])->name('projects.create');

Route::post('/dashboard', [ProjectController::class, 'store'])->middleware(['auth', 'verified'])->name('projects.store');

Route::get('/dashboard/projects/{id}/assign', [ProjectController::class, 'assignView'])->name('projects.assign.view');
Route::post('/dashboard/projects/{id}/assign', [ProjectController::class, 'assignProject'])->name('projects.assign');


Route::get('/dashboard/projects/{id}', [ProjectController::class, 'show'])->middleware(['auth', 'verified'])->name('projects.show');

Route::get('/dashboard/projects/{id}/edit', [ProjectController::class, 'edit'])->middleware(['auth', 'verified'])->name('projects.edit');

Route::patch('/dashboard/projects/{id}', [ProjectController::class, 'update'])->middleware(['auth', 'verified'])->name('projects.update');

Route::delete('/dashboard/projects/{id}', [ProjectController::class, 'destroy'])->middleware(['auth', 'verified'])->name('projects.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
