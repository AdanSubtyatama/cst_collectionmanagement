<?php

use App\Http\Controllers\CoreBranchController;
use App\Http\Controllers\CoreBusinessCollectorController;
use App\Http\Controllers\CoreBusinessOfficerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SystemUserController;
use App\Http\Controllers\SystemUserGroupController;
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
// Auth Route
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/process-login', [LoginController::class, 'processLogin'])->name('process-login');

Route::middleware('auth')->group(function () {

Route::post('logout', LogoutController::class)->name('logout');

// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// System User Route
Route::get('/user', [SystemUserController::class, 'index'])->name('user');
Route::post('/user/process-add', [SystemUserController::class, 'processAddUser'])->name('process-add-user');
Route::get('/user/edit/{system_user_edit}', [SystemUserController::class, 'editUser'])->name('edit-user');
Route::post('/user/process-edit/{user_id}', [SystemUserController::class, 'processEditUser'])->name('process-edit-user');
Route::get('/user/process-delete/{user_id}', [SystemUserController::class, 'processDeleteUser'])->name('process-delete-user');
Route::get('/user/process-reset-password/{user_id}', [SystemUserController::class, 'processResetPassword'])->name('process-reset-paswword-user');

// System User Group Route
Route::get('/user-group', [SystemUserGroupController::class, 'index'])->name('user-group');
Route::post('/user-group/process-add', [SystemUserGroupController::class, 'processAddUserGroup'])->name('process-add-user-group');
Route::get('/user-group/edit/{system_user_group_edit}', [SystemUserGroupController::class, 'editUserGroup'])->name('edit-user-group');
Route::post('/user-group/process-edit/{user_group_id}', [SystemUserGroupController::class, 'processEditUserGroup'])->name('process-edit-user-group');
Route::get('/user-group/process-delete/{user_group_id}', [SystemUserGroupController::class, 'processDeleteUserGroup'])->name('process-delete-user-group');


// Branch Route
Route::get('/branch', [CoreBranchController::class, 'index'])->name('branch');
Route::post('/branch/process-add', [CoreBranchController::class, 'processAddBranch'])->name('process-add-branch');
Route::get('/branch/edit/{core_branch_edit}', [CoreBranchController::class, 'editBranch'])->name('edit-branch');
Route::post('/branch/process-edit/{branch_id}', [CoreBranchController::class, 'processEditBranch'])->name('process-edit-branch');
Route::get('/branch/process-delete/{branch_id}', [CoreBranchController::class, 'processDeleteBranch'])->name('process-delete-branch');

// BusinessCollector Route
Route::get('/business-collector', [CoreBusinessCollectorController::class, 'index'])->name('business-collector');
Route::post('/business-collector/process-add', [CoreBusinessCollectorController::class, 'processAddBusinessCollector'])->name('process-add-business-collector');
Route::get('/business-collector/edit/{core_business_collector_edit}', [CoreBusinessCollectorController::class, 'editBusinessCollector'])->name('edit-business-collector');
Route::post('/business-collector/process-edit/{business_collector_id}', [CoreBusinessCollectorController::class, 'processEditBusinessCollector'])->name('process-edit-business-collector');
Route::get('/business-collector/process-delete/{business_collector_id}', [CoreBusinessCollectorController::class, 'processDeleteBusinessCollector'])->name('process-delete-business-collector');

// BusinessOfficer Route
Route::get('/business-officer', [CoreBusinessOfficerController::class, 'index'])->name('business-officer');
Route::post('/business-officer/process-add', [CoreBusinessOfficerController::class, 'processAddBusinessOfficer'])->name('process-add-business-officer');
Route::get('/business-officer/edit/{core_business_officer_edit}', [CoreBusinessOfficerController::class, 'editBusinessOfficer'])->name('edit-business-officer');
Route::post('/business-officer/process-edit/{business_officer_id}', [CoreBusinessOfficerController::class, 'processEditBusinessOfficer'])->name('process-edit-business-officer');
Route::get('/business-officer/process-delete/{business_officer_id}', [CoreBusinessOfficerController::class, 'processDeleteBusinessOfficer'])->name('process-delete-business-officer');

});