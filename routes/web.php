<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AcademicianController;
use App\Http\Controllers\GrantController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $grants = \App\Models\Grant::all();
    return view('welcome', compact('grants'));
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Registration routes
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Authentication routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Grant routes
Route::resource('grants', GrantController::class);
Route::post('/grants/{id}/add-member', [GrantController::class, 'addMember'])->name('grants.addMember');
Route::delete('/grants/{grant_id}/remove-member/{academician_id}', [GrantController::class, 'removeMember'])->name('grants.removeMember');

// Milestone routes
Route::get('/milestones', [MilestoneController::class, 'index'])->name('milestones.index');
Route::get('/grants/{grant_id}/milestones/create', [MilestoneController::class, 'create'])->name('milestones.create');
Route::post('/grants/{grant_id}/milestones', [MilestoneController::class, 'store'])->name('milestones.store');
Route::get('/milestones/{id}', [MilestoneController::class, 'show'])->name('milestones.show');
Route::get('/milestones/{id}/edit', [MilestoneController::class, 'edit'])->name('milestones.edit');
Route::put('/milestones/{id}', [MilestoneController::class, 'update'])->name('milestones.update');
Route::delete('/milestones/{id}', [MilestoneController::class, 'destroy'])->name('milestones.destroy');

// Academician routes
Route::resource('academicians', AcademicianController::class);

require __DIR__.'/auth.php';