<?php

use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeammateController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/manager/dashboard', [ManagerController::class, 'index'])->name('manager.dashboard');
    Route::resource('teammates', TeammateController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);

});
Route::middleware(['auth', 'role:teammate'])->group(function () {
    Route::get('/teammate/dashboard', [TeammateController::class, 'team'])->name('teammate.dashboard');
    Route::get('/teammate/tasks', [TeammateController::class, 'tasklist'])->name('teammate.tasklist');
    Route::patch('/tasks/{task}/status', [TeammateController::class, 'updateStatus'])->name('tasks.updateStatus');

});

require __DIR__.'/auth.php';
