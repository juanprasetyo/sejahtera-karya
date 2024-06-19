<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompleteProfileController;
use App\Http\Controllers\ProjectOwner\ProjectController;
use App\Http\Controllers\ProjectOwner\ProjectWorkerController;
use App\Http\Controllers\ProjectController as WorkerProjectController;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::name('user.')->group(function () {
        Route::get('/complete-profile', [CompleteProfileController::class, 'edit'])->name('complete-profile');
        Route::post('/complete-profile', [CompleteProfileController::class, 'update'])->name('complete-profile.update');
    });

    Route::middleware(['check.village'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'worker'])->name('dashboard');
        Route::get('/project/{id}', [WorkerProjectController::class, 'show'])->name('project.detail');
        Route::post('/project/{id}/register', [WorkerProjectController::class, 'registerWorker'])->name('project.register');

        Route::name('project-owner.')->prefix('project-owner')->middleware(['role:project-owner'])->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'projectOwner'])->name('dashboard');
            Route::resource('projects', ProjectController::class);
            Route::get('/projects/{id}/workers', [ProjectWorkerController::class, 'index'])->name('project.workers');
        });

        Route::name('admin.')->prefix('admin')->middleware(['role:admin'])->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
        });
    });
});