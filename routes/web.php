<?php

use App\Http\Controllers\CoreBranchController;
use App\Http\Controllers\CoreBusinessCollectorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

// Branch Route
Route::get('/branch', [CoreBranchController::class, 'index'])->name('corebranch.index');
Route::post('/branch', [CoreBranchController::class, 'store'])->name('corebranch.store');
Route::get('/branch/{branch}', [CoreBranchController::class, 'edit'])->name('corebranch.edit');
Route::post('/branch/{id}/edit', [CoreBranchController::class, 'update'])->name('corebranch.update');
Route::get('/branch/{id}/delete', [CoreBranchController::class, 'delete'])->name('corebranch.delete');

// BusinessCollector Route
Route::get('/businessCollector', [CoreBusinessCollectorController::class, 'index'])->name('corebusinessCollector.index');
Route::get('/businessCollector/{businessCollector}', [CoreBusinessCollectorController::class, 'edit'])->name('corebusinessCollector.edit');
Route::post('/businessCollector', [CoreBusinessCollectorController::class, 'store'])->name('corebusinessCollector.store');
Route::post('/businessCollector/{id}/edit', [CoreBusinessCollectorController::class, 'update'])->name('corebusinessCollector.update');
Route::get('/businessCollector/{id}/delete', [CoreBusinessCollectorController::class, 'delete'])->name('corebusinessCollector.delete');