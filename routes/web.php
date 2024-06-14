<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompleteProfileController;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'check.village'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/complete-profile', [CompleteProfileController::class, 'edit'])->name('user.complete-profile');
    Route::post('/complete-profile', [CompleteProfileController::class, 'update'])->name('user.complete-profile.update');
});