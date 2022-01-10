<?php

use App\Http\Controllers\CoreBranchController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/branch', [CoreBranchController::class, 'index'])->name('corebranch.index');
Route::post('/branch', [CoreBranchController::class, 'store'])->name('corebranch.store');
Route::get('/branch/{branch}', [CoreBranchController::class, 'edit'])->name('corebranch.edit');
