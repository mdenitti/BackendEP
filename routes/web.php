<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobApplicationController;

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

Route::get('', fn() => to_route('jobs.index'));

// Define the 'jobs.index' route
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');

// Define the 'jobs.show' route for individual job detail
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

Route::get('login', fn() => to_route('auth.create'))->name('login');
Route::get('/auth/create', [AuthController::class, 'create'])->name('auth.create');

Route::post('/auth/store', [AuthController::class, 'store'])->name('auth.store');


Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');

Route::middleware('auth')->group(function () {
    Route::get('job/{job}/application/create', [JobApplicationController::class, 'create'])->name('job.application.create');
    Route::post('job/{job}/application', [JobApplicationController::class, 'store'])->name('job.application.store');
    
});