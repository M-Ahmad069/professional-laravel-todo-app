<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/', [TaskController::class, 'index']);

Route::get('/dashboard', [TaskController::class, 'index'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Task CRUD
    |--------------------------------------------------------------------------
    */

    Route::post('/store', [TaskController::class, 'store']);

    Route::get('/delete/{id}', [TaskController::class, 'delete']);

    Route::get('/edit/{id}', [TaskController::class, 'edit']);

    Route::post('/update/{id}', [TaskController::class, 'update']);

    /*
    |--------------------------------------------------------------------------
    | Extra Pages
    |--------------------------------------------------------------------------
    */

    Route::get('/analytics', [TaskController::class, 'analytics']);

    Route::get('/profile', [TaskController::class, 'profile']);

    Route::get('/settings', [TaskController::class, 'settings']);
});

/*
|--------------------------------------------------------------------------
| Breeze Auth
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';