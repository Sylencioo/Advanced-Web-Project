<?php

use App\Http\Controllers\AcademicianController;
use App\Http\Controllers\GrantController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $grants = \App\Models\Grant::all();
    return view('welcome', compact('grants'));
})->name('welcome');

// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Academician details routes
Route::middleware(['auth'])->group(function () {
    Route::get('/academicians', [AcademicianController::class, 'index'])->name('academicians.index');
    Route::get('/academicians/create', [AcademicianController::class, 'create'])->name('academicians.create')->middleware('can:admin-actions,can:academician-actions');
    Route::post('/academicians', [AcademicianController::class, 'store'])->name('academicians.store')->middleware('can:admin-actions,can:academician-actions');
    Route::get('/academicians/{academician}/edit', [AcademicianController::class, 'edit'])->name('academicians.edit')->middleware('can:academician-actions');
    Route::put('/academicians/{academician}', [AcademicianController::class, 'update'])->name('academicians.update')->middleware('can:academician-actions');
    Route::delete('/academicians/{academician}', [AcademicianController::class, 'destroy'])->name('academicians.destroy')->middleware('can:admin-actions,can:academician-actions');
    Route::get('/academicians/{academician}', [AcademicianController::class, 'show'])->name('academicians.show')->middleware('can:admin-actions,can:academician-actions');
});

// Authentication routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Grant routes
Route::middleware(['auth'])->group(function () {
    Route::resource('grants', GrantController::class)->middleware('can:manage-grants');
    Route::post('/grants/{id}/add-member', [GrantController::class, 'addMember'])->name('grants.addMember')->middleware('can:add-members');
    Route::delete('/grants/{grant_id}/remove-member/{academician_id}', [GrantController::class, 'removeMember'])->name('grants.removeMember')->middleware('can:manage-grants');
});

// Milestone routes
Route::middleware(['auth'])->group(function () {
    Route::get('/milestones', [MilestoneController::class, 'index'])->name('milestones.index')->middleware('can:manage-milestones');
    Route::get('/grants/{grant_id}/milestones', [MilestoneController::class, 'milestonesByGrant'])->name('milestones.byGrant')->middleware('can:manage-milestones');
    Route::get('/grants/{grant_id}/milestones/create', [MilestoneController::class, 'create'])->name('milestones.create')->middleware('can:manage-milestones');
    Route::post('/grants/{grant_id}/milestones', [MilestoneController::class, 'store'])->name('milestones.store')->middleware('can:manage-milestones');
    Route::get('/milestones/{id}', [MilestoneController::class, 'show'])->name('milestones.show')->middleware('can:manage-milestones');
    Route::get('/milestones/{id}/edit', [MilestoneController::class, 'edit'])->name('milestones.edit')->middleware('can:manage-milestones');
    Route::put('/milestones/{id}', [MilestoneController::class, 'update'])->name('milestones.update')->middleware('can:manage-milestones');
    Route::delete('/milestones/{id}', [MilestoneController::class, 'destroy'])->name('milestones.destroy')->middleware('can:manage-milestones');
});

require __DIR__.'/auth.php';