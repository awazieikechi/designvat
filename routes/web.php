<?php

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

Route::get('/like', function () {
});

Route::middleware(['auth'])->group(function () {

    //Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index']);

    Route::get('/', [App\Http\Controllers\CustomerController::class, 'create']);

    /*Route::get('/admin', function () {
    echo 'welcome';
    });*/

    /*** Customer Services */

    Route::get('/admin/customers/listing', [App\Http\Controllers\CustomerController::class, 'getCustomers'])->name('get_customers');
    Route::get('/admin/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer_list');
    Route::get('/admin', [App\Http\Controllers\CustomerController::class, 'create'])->name('customer_create');
    Route::post('/admin', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer_store');
    Route::get('/admin/customer/{customer}/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer_edit');
    Route::get('/admin/customer/{customer}', [App\Http\Controllers\CustomerController::class, 'show'])->name('customer_show');
    Route::patch('/admin/customer/{customer}/edit', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer_update');
    Route::delete('/admin/customer/{customer}/delete', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customer_delete');

    /*** Creating Roles */
    Route::get('/admin/role/user', [App\Http\Controllers\UserController::class, 'create'])->name('role_create');
    Route::post('/admin/role/user', [App\Http\Controllers\UserController::class, 'store'])->name('role_store');

    /*** Service Listing */
    Route::get('/admin/services', [App\Http\Controllers\ServiceController::class, 'create'])->name('service_create');
    Route::post('/admin/services', [App\Http\Controllers\ServiceController::class, 'store'])->name('service_store');
    Route::get('/admin/services/listing', [App\Http\Controllers\ServiceController::class, 'getServices'])->name('get_services');
    Route::get('/admin/services/list', [App\Http\Controllers\ServiceController::class, 'index'])->name('services_list');
    Route::get('/admin/service/{service}/edit', [App\Http\Controllers\ServiceController::class, 'edit'])->name('service_edit');
    Route::patch('/admin/service/{service}/edit', [App\Http\Controllers\ServiceController::class, 'update'])->name('service_update');
    Route::get('/admin/service/{service}', [App\Http\Controllers\ServiceController::class, 'getServiceCharge'])->name('get_service');
    Route::delete('/admin/service/{service}/delete', [App\Http\Controllers\ServiceController::class, 'destroy'])->name('service_delete');

    /*** Banking */
    Route::get('/admin/bank', [App\Http\Controllers\BankController::class, 'index'])->name('bank_transaction');
    Route::get('/admin/bank/credit', [App\Http\Controllers\BankController::class, 'showCredit'])->name('bank_credit');
    Route::get('/admin/bank/debit', [App\Http\Controllers\BankController::class, 'showDebit'])->name('bank_debit');
    Route::get('/admin/bank/transactions', [App\Http\Controllers\BankController::class, 'getTransactions'])->name('get_transactions');

    Route::post('/admin/bank', [App\Http\Controllers\BankController::class, 'store'])->name('bank_store');
    Route::post('/admin/bank/balance', [App\Http\Controllers\BankController::class, 'getCustomerBalance'])->name('get_balance');
    Route::post('/admin/bank/outstandingbalance', [App\Http\Controllers\BankController::class, 'getCustomerOutstandingBalance'])->name('get_outstanding_balance');

    Route::get('/admin/bank/{bank}/edit/', [App\Http\Controllers\BankController::class, 'edit'])->name('transaction_edit');
    Route::patch('/admin/bank/{bank}', [App\Http\Controllers\BankController::class, 'update'])->name('transaction_update');
    //Route::post('/admin/bank/{bank}/delete', [App\Http\Controllers\BankController::class, 'destroy'])->name('transaction_delete');
    Route::post('/admin/bank/{bank}/delete', [App\Http\Controllers\BankController::class, 'deleteTransaction'])->name('transaction_delete');

    /*** Sales */
    Route::get('/admin/sales/list', [App\Http\Controllers\SalesController::class, 'index'])->name('sale_transaction');
    Route::get('/admin/sales/payment', [SalesController::class, 'showPayment'])->name('show_sale_payment');
    Route::get('/admin/sales/loan', [App\Http\Controllers\SalesController::class, 'showLoan'])->name('show_sale_loan');
    Route::get('/admin/sales/creditsales', [App\Http\Controllers\SalesController::class, 'showSale'])->name('show_sale_credit');
    Route::get('/admin/sales/transactions', [App\Http\Controllers\SalesController::class, 'getSales'])->name('get_sales');
    Route::get('/admin/sales/{sales}', [App\Http\Controllers\SalesController::class, 'show'])->name('get_sale');

    Route::get('/admin/sales/{sales}/edit/', [App\Http\Controllers\SalesController::class, 'edit'])->name('sale_edit');
    Route::patch('/admin/sales/{sales}/edit', [App\Http\Controllers\SalesController::class, 'update'])->name('sale_update');
    Route::post('/admin/sales', [App\Http\Controllers\SalesController::class, 'store'])->name('sale_store');

    //Route::post('/admin/bank/{bank}/delete', [App\Http\Controllers\BankController::class, 'destroy'])->name('transaction_delete');
    Route::post('/admin/sales/{sales}/delete', [App\Http\Controllers\SalesController::class, 'deleteTransaction'])->name('sale_delete');

    /*** Branch Listing */

    Route::get('/admin/branch', [App\Http\Controllers\BranchController::class, 'create'])->name('branch_create');
    Route::post('/admin/branches', [App\Http\Controllers\BranchController::class, 'store'])->name('branch_store');
    Route::get('/admin/branches/listing', [App\Http\Controllers\BranchController::class, 'getBranches'])->name('get_branches');
    Route::get('/admin/branches/list', [App\Http\Controllers\BranchController::class, 'index'])->name('branch_list');
    Route::get('/admin/branch/{branch}/edit', [App\Http\Controllers\BranchController::class, 'edit'])->name('branch_edit');
    Route::patch('/admin/branch/{branch}/edit', [App\Http\Controllers\BranchController::class, 'update'])->name('branch_update');
    Route::delete('/admin/branch/{branch}/delete', [App\Http\Controllers\BranchController::class, 'destroy'])->name('branch_delete');

    /*** Expense Listing */

    Route::get('/admin/expenses', [App\Http\Controllers\ExpenseController::class, 'show'])->name('expense_create');
    Route::get('/admin/expenses/list', [App\Http\Controllers\ExpenseController::class, 'index'])->name('expense_list');
    Route::get('/admin/expenses/listing', [App\Http\Controllers\ExpenseController::class, 'getExpenses'])->name('get_expenses');
    Route::get('/admin/expenses/{expense}/edit', [App\Http\Controllers\ExpenseController::class, 'edit'])->name('expense_edit');
    Route::post('/admin/expenses', [App\Http\Controllers\ExpenseController::class, 'store'])->name('expense_store');
    Route::patch('/admin/expenses/{expense}/edit', [App\Http\Controllers\ExpenseController::class, 'update'])->name('expense_update');
    Route::post('/admin/expenses/{expense}/delete', [App\Http\Controllers\ExpenseController::class, 'deleteTransaction'])->name('expense_delete');

/*** Report Listing */

    Route::get('/admin/report', [App\Http\Controllers\ReportController::class, 'show'])->name('get_report');
    Route::get('/admin/report/customer', [App\Http\Controllers\ExpenseController::class, 'showCustomer'])->name('get_report_customer');
    Route::get('/admin/report/income', [App\Http\Controllers\ExpenseController::class, 'showIncome'])->name('get_report_sales');

});
