<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AcademicianController;
use App\Http\Controllers\GrantController;
use App\Http\Controllers\MilestoneController;
use Illuminate\Support\Facades\Route;

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
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/grants', [GrantController::class, 'index'])->name('grants.index'); // View all grants
    Route::get('/admin/grants/create', [GrantController::class, 'create'])->name('grants.create'); // Show create form
    Route::post('/admin/grants', [GrantController::class, 'store'])->name('grants.store'); // Save new grant
    Route::get('/admin/grants/{id}/edit', [GrantController::class, 'edit'])->name('grants.edit'); // Show edit form
    Route::put('/admin/grants/{id}', [GrantController::class, 'update'])->name('grants.update'); // Update grant
    Route::delete('/admin/grants/{id}', [GrantController::class, 'destroy'])->name('grants.destroy'); // Delete grant
});

Route::middleware(['auth', 'role:leader'])->group(function () {
    Route::get('/projects/{project_id}/milestones', [MilestoneController::class, 'index'])->name('milestones.index'); // View all milestones for a project
    Route::get('/milestones/create/{project_id}', [MilestoneController::class, 'create'])->name('milestones.create'); // Show create form
    Route::post('/milestones', [MilestoneController::class, 'store'])->name('milestones.store'); // Save new milestone
    Route::get('/milestones/{id}/edit', [MilestoneController::class, 'edit'])->name('milestones.edit'); // Show edit form
    Route::put('/milestones/{id}', [MilestoneController::class, 'update'])->name('milestones.update'); // Update milestone
    Route::delete('/milestones/{id}', [MilestoneController::class, 'destroy'])->name('milestones.destroy'); // Delete milestone
});

// Grant routes
Route::resource('grants', GrantController::class);

// Milestone routes
Route::get('/grants/{grant_id}/milestones', [MilestoneController::class, 'index'])->name('milestones.index');
Route::get('/grants/{grant_id}/milestones/create', [MilestoneController::class, 'create'])->name('milestones.create');
Route::post('/grants/{grant_id}/milestones', [MilestoneController::class, 'store'])->name('milestones.store');
Route::get('/milestones/{id}/edit', [MilestoneController::class, 'edit'])->name('milestones.edit');
Route::put('/milestones/{id}', [MilestoneController::class, 'update'])->name('milestones.update');
Route::delete('/milestones/{id}', [MilestoneController::class, 'destroy'])->name('milestones.destroy');
Route::get('/milestones/{id}', [MilestoneController::class, 'show'])->name('milestones.show');

// Academician routes
Route::resource('academicians', AcademicianController::class);

require __DIR__.'/auth.php';
