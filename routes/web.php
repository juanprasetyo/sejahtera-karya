<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompleteProfileController;
use App\Http\Controllers\ProjectOwner\ProjectController;

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
    Route::middleware(['check.village'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'worker'])->name('dashboard');

        Route::name('user.')->group(function () {
            Route::get('/complete-profile', [CompleteProfileController::class, 'edit'])->name('complete-profile');
            Route::post('/complete-profile', [CompleteProfileController::class, 'update'])->name('complete-profile.update');
        });

        Route::name('project-owner.')->prefix('project-owner')->middleware(['role:project-owner'])->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'projectOwner'])->name('dashboard');
            Route::resource('projects', ProjectController::class);
        });

        Route::name('admin.')->prefix('admin')->middleware(['role:admin'])->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
        });
    });
});