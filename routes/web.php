<?php

use App\Http\Controllers\AcctBusinessCollectorReportController;
use App\Http\Controllers\AcctCreditsAccountController;
use App\Http\Controllers\AcctCreditsAccountPaymentController;
use App\Http\Controllers\AcctCreditsAgunanController;
use App\Http\Controllers\AcctCreditsController;
use App\Http\Controllers\AcctSourceFundController;
use App\Http\Controllers\CollectibiltyCreditsAccountController;
use App\Http\Controllers\CoreBranchController;
use App\Http\Controllers\CoreBusinessCollectorController;
use App\Http\Controllers\CoreBusinessOfficerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LateReportsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PreferenceCollectibilityController;
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

    // Credits Route
Route::get('/credits', [AcctCreditsController::class, 'index'])->name('credits');
Route::post('/credits/process-add', [AcctCreditsController::class, 'processAddCredits'])->name('process-add-credits');
Route::get('/credits/edit/{acct_credits_edit}', [AcctCreditsController::class, 'editCredits'])->name('edit-credits');
Route::post('/credits/process-edit/{acct_credits_id}', [AcctCreditsController::class, 'processEditCredits'])->name('process-edit-credits');
Route::post('/credits/process-delete/{acct_credits_id}', [AcctCreditsController::class, 'processDeleteCredits'])->name('process-delete-credits');


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

// SourceFund Route
Route::get('/source-fund', [AcctSourceFundController::class, 'index'])->name('source-fund');
Route::post('/source-fund/process-add', [AcctSourceFundController::class, 'processAddSourceFund'])->name('process-add-source-fund');
Route::get('/source-fund/edit/{acct_source_fund_edit}', [AcctSourceFundController::class, 'editSourceFund'])->name('edit-source-fund');
Route::post('/source-fund/process-edit/{source_fund_id}', [AcctSourceFundController::class, 'processEditSourceFund'])->name('process-edit-source-fund');
Route::post('/source-fund/process-delete/{source_fund_id}', [AcctSourceFundController::class, 'processDeleteSourceFund'])->name('process-delete-source-fund');

// Credits Account Route
Route::get('/credits-account', [AcctCreditsAccountController::class, 'index'])->name('credits-account');
Route::post('/credits-account/process-add', [AcctCreditsAccountController::class, 'processAddCreditsAccount'])->name('process-add-credits-account');
Route::post('/credits-account/process-import-excel', [AcctCreditsAccountController::class, 'processImportExcelCreditsAccount'])->name('process-import-excel');
Route::get('/credits-account/edit/{acct_credits_account_edit}', [AcctCreditsAccountController::class, 'editCreditsAccount'])->name('edit-credits-account');
Route::post('/credits-account/process-edit/{credits_account_id}', [AcctCreditsAccountController::class, 'processEditCreditsAccount'])->name('process-edit-credits-account');
Route::post('/credits-account/filter-credits-account', [AcctCreditsAccountController::class, 'filterCreditsAccount'])->name('filter-credits-account');
Route::post('/credits-account/process-delete/{credits_account_id}', [AcctCreditsAccountController::class, 'processDeleteCreditsAccount'])->name('process-delete-credits-account');
Route::get('/credits-account/get-city/{province_id}', [AcctCreditsAccountController::class, 'getCityfromProvince'])->name('get-city-credits-account');
Route::get('/credits-account/get-kecamatan/{city_id}', [AcctCreditsAccountController::class, 'getKecamatanfromProvince'])->name('get-kecamatan-credits-account');

// Credits Account Report Late
Route::get('/late-report', [LateReportsController::class, 'index'])->name('late-report');
Route::post('/late-report/filter-late-report', [LateReportsController::class, 'filterLateReports'])->name('filter-late-report');
Route::get('/late-report/print-st/{credits_account_edit}', [LateReportsController::class, 'printLateReportsST'])->name('print-st');
Route::get('/late-report/print-sp1/{credits_account_edit}', [LateReportsController::class, 'printLateReportsSP1'])->name('print-st');
Route::get('/late-report/print-sp2/{credits_account_edit}', [LateReportsController::class, 'printLateReportsSP2'])->name('print-st');
Route::get('/late-report/print-sp3/{credits_account_edit}', [LateReportsController::class, 'printLateReportsSP3'])->name('print-st');

// Credits Account Agunan credits-account-agunan 
Route::get('/credits-agunan', [AcctCreditsAgunanController::class, 'index'])->name('credits-agunan');
Route::post('/credits-agunan/process-add-temp-bpkb', [AcctCreditsAgunanController::class, 'processAddTempCreditsAgunanBPKB'])->name('process-add-temp-credits-agunan-bpkb');
Route::post('/credits-agunan/process-add-temp-shm', [AcctCreditsAgunanController::class, 'processAddTempCreditsAgunanSHM'])->name('process-add-temp-credits-agunan-shm');

// configuration-collectibility 
Route::get('/configuration-collectibility', [PreferenceCollectibilityController::class, 'index'])->name('configuration-collectibility');
Route::post('/configuration-collectibility/update-konfigurasi-kolektibilitas', [PreferenceCollectibilityController::class, 'updateKonfigurasiKolektibilitas'])->name('update-konfigurasi-kolektibilitas');

// account-collectibility
Route::get('/account-collectibility', [CollectibiltyCreditsAccountController::class, 'index'])->name('account-collectibility');
Route::post('/account-collectibility/print-letter-informing/{credits_account_collector_id}', [CollectibiltyCreditsAccountController::class, 'printLetterInforming'])->name('print-letter-informing');
Route::post('/account-collectibility/process-collectibility', [CollectibiltyCreditsAccountController::class, 'processCollectibilityCreditsAccount'])->name('process-collectibility');
Route::post('/account-collectibility/filter-collectibility', [CollectibiltyCreditsAccountController::class, 'filterCollectibilityCreditsAccount'])->name('filter-collectibility');
Route::get('/edit-account-collectibility/{acct_credits_account}', [CollectibiltyCreditsAccountController::class, 'editCollectibilityCreditsAccount'])->name('edit-account-collectibility');

// collector-response 
Route::post('/collector-report/process-edit/{business_collector_report_id}', [AcctBusinessCollectorReportController::class, 'processEditCollectorReport'])->name('process-edit-collector-report');
Route::get('/collector-report', [AcctBusinessCollectorReportController::class, 'index'])->name('collector-report');
Route::post('/collector-report/process-add-collector-report', [AcctBusinessCollectorReportController::class, 'processAddCollectorReport'])->name('process-add-collector-report');
Route::post('/collector-report/filter-collector-report', [AcctBusinessCollectorReportController::class, 'filterCollectorReport'])->name('filter-collector-report');
Route::get('/collector-report/edit/{business_collector_report_edit}', [AcctBusinessCollectorReportController::class, 'editCollectorReport'])->name('edit-collector-report');
Route::post('/collector-report/process-delete/{business_collector_report_id}', [AcctBusinessCollectorReportController::class, 'processDeleteCollectorReport'])->name('process-delete-collector-report');
Route::get('/collector-report/get-from-letter-informing/{credits_account_collector_id}', [AcctBusinessCollectorReportController::class, 'getFromLetterInforming'])->name('get-from-letter-informing');
Route::post('/collector-report/mark-done/{business_collector_report_id}', [AcctBusinessCollectorReportController::class, 'processMarkDoneCollectorReport'])->name('process-mark-done-collector-report');

Route::post('/credits-account-payment/process-edit/{credits_payment_id}', [AcctCreditsAccountPaymentController::class, 'processEditCreditsAccountPayment'])->name('process-edit-credits-account-payment');
Route::get('/credits-account-payment', [AcctCreditsAccountPaymentController::class, 'index'])->name('credits-account-payment');
Route::get('/credits-account-payment/add-credits-account-payment', [AcctCreditsAccountPaymentController::class, 'addCreditsAccountPayment'])->name('add-credits-account-payment');
Route::post('/credits-account-payment/process-add-credits-account-payment', [AcctCreditsAccountPaymentController::class, 'processAddCreditsAccountPayment'])->name('process-add-credits-account-payment');
Route::post('/credits-account-payment/filter-credits-account-payment', [AcctCreditsAccountPaymentController::class, 'filterCreditsAccountPayment'])->name('filter-credits-account-payment');
Route::get('/credits-account-payment/edit/{credits_payment_edit}', [AcctCreditsAccountPaymentController::class, 'editCreditsAccountPayment'])->name('edit-credits-account-payment');
Route::post('/credits-account-payment/process-delete/{credits_payment_id}', [AcctCreditsAccountPaymentController::class, 'processDeleteCreditsAccountPayment'])->name('process-delete-credits-account-payment');

});