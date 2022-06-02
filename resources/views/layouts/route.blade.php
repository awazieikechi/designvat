@if (\Route::current()->getName() == 'customer_list')
    @if (auth()->user()->role === 'admin')
        @include('layouts.footer.footerscript')
    @else
        @include('layouts.footer.footerRoleScript')
    @endif
@endif

@if (\Route::current()->getName() == 'services_list')
    @include('layouts.footer.footerServicesScript')
@endif

@if (\Route::current()->getName() == 'branch_list')
    @include('layouts.footer.footerBranchScript')
@endif

@if (\Route::current()->getName() == 'bank_transaction')
    @include('layouts.footer.footerBankScript')
@endif

@if (\Route::current()->getName() == 'bank_credit')
    @include('layouts.dselect')
@endif

@if (\Route::current()->getName() == 'bank_debit')
    @include('layouts.dselect')
    @include('layouts.getbalance')
@endif

@if (\Route::current()->getName() == 'sale_transaction')
    @include('layouts.footer.footerSaleScript')
@endif

@if (\Route::current()->getName() == 'show_sale_credit')
    @include('layouts.dselect')
    @include('layouts.getServiceCharge')
@endif

@if (\Route::current()->getName() == 'show_sale_payment')
    @include('layouts.dselect')
    @include('layouts.getOutstandingBalance')
@endif

@if (\Route::current()->getName() == 'show_sale_loan')
    @include('layouts.dselect')
    @include('layouts.loan')
@endif

@if (\Route::current()->getName() == 'sale_edit')
    @include('layouts.dselect')
    @include('layouts.getServiceCharge')
    @include('layouts.loan')
@endif

@if (\Route::current()->getName() == 'expense_list')
    @include('layouts.footer.footerExpenseScript')
@endif

@if (\Route::current()->getName() == 'expense_create')
    @include('layouts.getTotalCost')
@endif

@if (\Route::current()->getName() == 'expense_edit')
    @include('layouts.getTotalCost')
@endif

@if (\Route::current()->getName() == 'get_report_customer')
    @include('layouts.report.reportCustomerScript')
@endif

@if (\Route::current()->getName() == 'get_report_sales')
    @include('layouts.report.reportSaleScript')
@endif
