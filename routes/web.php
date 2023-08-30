<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;

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

Auth::routes();


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [ AdminDashboardController::class , 'home'])->name('home');
    Route::get('/projects/deleted', [AdminProjectController::class, 'deletedIndex'] )->name('projects.deleted');
    Route::post('/projects/deleted/{project}', [AdminProjectController::class, 'restore'] )->name('projects.restore');
    Route::delete('/projects/deleted/{project}', [AdminProjectController::class, 'obliterate'] )->name('projects.obliterate');
    Route::resource('/projects', AdminProjectController::class);
});

Route::name('guest.')->group(function () {
    Route::get('/', [ GuestHomeController::class , 'home'])->name('home');
});
